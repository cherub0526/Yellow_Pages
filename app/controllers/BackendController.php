<?php

class BackendController extends \BaseController {

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
			'view' => array('backend.navigation','backend.index'),
		);
		return View::make('layouts.backends',$data);
	}

	public function site($spry1, $tablename)
	{
		$result = DB::table('backend_spry1')->where('table_name',$tablename)->get();
		if(empty($result)) {
			return Redirect::to('backend');
		}

		$data = array(
			'create_url' => URL::action('BackendController@create',array($spry1, $tablename)),
			'action_url' => "backend/$spry1/$tablename",
			'table_id' => $spry1,
			'table_name' => $tablename,
			'tabletitle' => $result[0]->title,
			'results' => DB::table($tablename)->orderBy('id','desc')->paginate(10),
			'view' => array('backend.navigation','backend.listing'),
		);

		return View::make('layouts.backends',$data);
	}

	public function create($spry1, $tablename)
	{
		$result = DB::table('backend_spry1')->where('table_name',$tablename)->get();
		if(empty($result)) {
			return Redirect::to('backend');
		}

		$data = array(
			'action_url' => "backend/$spry1/$tablename",
			'table_id' => $spry1,
			'tabletitle' => $result[0]->title,
			'spry2' => DB::table('backend_spry2')->where('backend_spry1_id',$spry1)->get(),
			'results' => DB::table($tablename)->orderBy('id','asc')->paginate(5),
			'view' => array('backend.navigation','backend.create'),
		);

		return View::make('layouts.backends',$data);
	}

	public function insertForm($spry1, $tablename)
	{
		$result = DB::table('backend_spry1')->where(array('table_name'=>$tablename,'id' => $spry1))->get();
		if(empty($result)) {
			return Redirect::to('backend');
		}

		$error_url = "backend/$spry1/$tablename/create";
		$success_url = "backend/$spry1/$tablename";
		$rules = array(
			'title' => 'required',
			'backend_spry2_id' => 'required|integer',
			'tel' => 'required|digits_between:8,10',
			// 'url' => 'required',
			'address' => 'required',
			'description' => 'required',
		);

		$message = array(
			'title.required' => '商店名稱不能空白',
			'backend_spry2_id.required' => '請選擇分類',
			'tel.required' => '請填寫聯絡電話',
			'url.required' => '請填寫網址',
			'url.active_url' => '不是一個正確的網址',
			'address.required' => '請填寫地址',
			'description.required' => '請填寫內容',
			'tel.digits_between' => '聯絡電話介於 :min 到 :max 的數字'
		);

		$validator = Validator::make(Input::all(), $rules, $message);
		if($validator->fails()) {
			return Redirect::to($error_url)->withErrors($validator)->withInput();
		}
		else {
			$data = array(
				'title' => Input::get('title'),
				'backend_spry1_id' => $spry1,
				'backend_spry2_id' => Input::get('backend_spry2_id'),
				'tel' => Input::get('tel'),
				'url' => Input::get('url'),
				'address' => Input::get('address'),
				'description' => Input::get('description'),
			);
			if(isset($_FILES)) {
				$upload_path = public_path() . '/upload/images/';
				foreach($_FILES as $key => $value) {
					if(Input::hasFile($key)) {
						$path = Input::file($key)->getRealPath();
						$name = explode('/',$path);
						$extension = Input::file($key)->getClientOriginalExtension();
						$name = end($name) . '.' . $extension;
						Input::file($key)->move($upload_path, $name);
						$data[$key] = $name;
					}
				}
			}
			$id = DB::table($tablename)->insertGetId($data);
			Session::flash('notice','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				您已成功新增店家資訊！
			</div>');

			$stories = $data;
			$stories['store_id'] = $id;

			DB::table('stories')->insert($stories);

			return Redirect::to($success_url);
		}
	}

	public function edit($spry1, $tablename, $store_id)
	{
		$result = DB::table('backend_spry1')->where('table_name',$tablename)->get();
		if(empty($result)) {
			return Redirect::to('backend');
		}

		$data = array(
			'action_url' => "backend/$spry1/$tablename/update/$store_id",
			'table_id' => $spry1,
			'tabletitle' => $result[0]->title,
			'spry2' => DB::table('backend_spry2')->where('backend_spry1_id',$spry1)->get(),
			'results' => DB::table($tablename)->find($store_id),
			'view' => array('backend.navigation','backend.edit'),
		);
		return View::make('layouts.backends',$data);
	}

	public function updateForm($spry1, $tablename, $store_id)
	{
		$result = DB::table('backend_spry1')->where(array('table_name'=>$tablename,'id' => $spry1))->get();
		if(empty($result)) {
			return Redirect::to('backend');
		}

		$error_url = "backend/$spry1/$tablename/edit/$store_id";
		$success_url = "backend/$spry1/$tablename";
		$rules = array(
			'title' => 'required',
			'backend_spry2_id' => 'required|integer',
			'tel' => 'required|digits_between:8,10',
			// 'url' => 'required|active_url',
			'address' => 'required',
			'description' => 'required',
		);

		$message = array(
			'title.required' => '商店名稱不能空白',
			'backend_spry2_id.required' => '請選擇分類',
			'tel.required' => '請填寫聯絡電話',
			'url.required' => '請填寫網址',
			'url.active_url' => '不是一個正確的網址',
			'address.required' => '請填寫地址',
			'description.required' => '請填寫內容',
			'tel.integer' => '聯絡電話為數字'
		);

		$validator = Validator::make(Input::all(), $rules, $message);
		if($validator->fails()) {
			return Redirect::to($error_url)->withErrors($validator)->withInput();
		}
		else {
			$data = array(
				'title' => Input::get('title'),
				'backend_spry1_id' => $spry1,
				'backend_spry2_id' => Input::get('backend_spry2_id'),
				'tel' => Input::get('tel'),
				'url' => Input::get('url'),
				'address' => Input::get('address'),
				'description' => Input::get('description'),
			);
			if(isset($_FILES)) {
				$upload_path = public_path() . '/upload/images/';
				foreach($_FILES as $key => $value) {
					if(Input::hasFile($key)) {
						$path = Input::file($key)->getRealPath();
						$name = explode('/',$path);
						$extension = Input::file($key)->getClientOriginalExtension();
						$name = end($name) . '.' . $extension;
						Input::file($key)->move($upload_path, $name);
						$data[$key] = $name;
					}
				}
			}
			DB::table($tablename)->where('id',$store_id)->update($data);
			DB::table('stories')->where(array('store_id' => $store_id, 'backend_spry1_id' => $spry1))->update($data);
			Session::flash('notice','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				您已成功更新店家資訊！
			</div>');
			return Redirect::to($success_url);
		}
	}

	public function destroy($spry1, $tablename, $store_id)
	{
		$result = DB::table('backend_spry1')->where('table_name',$tablename)->get();
		if(empty($result)) {
			return Redirect::to('backend');
		}
		DB::table($tablename)->where('id',$store_id)->delete();
		DB::table('stories')->where(array('store_id' => $store_id, 'backend_spry1_id' => $spry1))->delete();
		$redirect_url = "backend/$spry1/$tablename";
		return Redirect::to($redirect_url);
	}

}