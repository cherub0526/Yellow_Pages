<?php

class BackendMenuController extends \BaseController {

	public function __construct()
	{
		$data = array(
			'spry1' => Backend_spry1::GetSpry(),
		);
		return View::share($data);
	}

	public function index()
	{
		$data = array(
			'spry1' => Backend_spry1::paginate(10),
			'view' => array('backend.navigation','menu.index'),
		);
		return View::make('layouts.backends',$data);
	}

	public function update()
	{
		$spry1_id = Input::get('id');
		$title = Input::get('title');
		$oritablename = Input::get('ori_table');
		$tablename = Input::get('new_table');

		for($i=0; $i < count($spry1_id); $i++) {
			$data = [
				'title' => $title[$i],
				'table_name' => $tablename[$i],
			];
			if(!empty($title[$i])) {
				$data['title'] = $title[$i];
			}
			if(!empty($tablename[$i])) {
				if(!Schema::hasTable($tablename[$i])) {
					$data['table_name'] = $tablename[$i];
					Schema::rename($oritablename[$i],$tablename[$i]);
				}
			}
			Backend_spry1::where('id',$spry1_id[$i])->update($data);
		}
		return Redirect::to('backend/firstLevel');
	}

	public function destroy($spry1_id)
	{

	}

	public function secondLevel($spry1_id)
	{
		if(!Backend_spry1::find($spry1_id)) {
			return Redirect::to('backend/firstLevel');
		}
		$data = array(
			'spry1_id' => $spry1_id,
			'spry2' => Backend_spry2::where('backend_spry1_id',$spry1_id)->paginate(10),
			'view' => array('backend.navigation','menu.secondIndex'),
		);
		return View::make('layouts.backends',$data);
	}

	public function updateSecond($spry1_id)
	{
		$spry2_id = Input::get('id');
		$spry2_title = Input::get('title');

		for($i=0; $i < count($spry2_id); $i++) {
			$data = [
				'title' => $spry2_title[$i],
			];
			Backend_spry2::where('id',$spry2_id[$i])->update($data);
		}
		return Redirect::to('backend/secondLevel/' . $spry1_id);
	}

	public function destroySecond($spry2_id)
	{

	}

}