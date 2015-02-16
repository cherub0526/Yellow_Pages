<?php

class BannerController extends \BaseController {

	public function __construct()
	{
		$data = array(
			'spry1' => Backend_spry1::GetSpry(),
		);
		return View::share($data);
	}

	public function ajaxSpry2()
	{
		$request1_id = Input::get('spry1_position');
		$request2_id = Input::get('spry2_position');

		$spry2 = DB::table('bannerSpry2')->where('bannerSpry1_id',$request1_id)->get();
		$class = '';
		if(!empty($spry2)) {
			foreach($spry2 as $spry2) {
				if(!empty($request2_id)) {
					$class = ($spry2->position == $request2_id) ? 'selected="selected"' : '' ;
				}
				echo '<option ' . $class . ' value="' . $spry2->position . '">' . $spry2->title . '</option>';
			}
		}
		else {
			echo "<option value=''>請選擇版位</option>";
		}

	}

	public function index()
	{
		$data = array(
			'spry1Banner' => DB::table('bannerSpry1')->get(),
			'spry2Banner' => DB::table('bannerSpry2')->get(),
			'banner' => DB::table('banner')->orderBy('id','desc')->paginate(10),
			'view' => array('backend.navigation','banner.index'),
		);
		return View::make('layouts.backends',$data);
	}

	public function createBanner()
	{
		$data = array(
			'action_url' => 'backend/banner/new',
			'bannerSpry1' => DB::table('bannerSpry1')->orderBy('id','asc')->get(),
			'view' => array('backend.navigation','banner.create'),
		);
		return View::make('layouts.backends',$data);
	}

	public function insertBanner()
	{
		$error_url = 'backend/banner/create';
		$success_url = 'backend/banner';
		$rules = array(
			'title' => 'required',
			'bannerSpry1_id' => 'required',
			'bannerSpry2_id' => 'required|integer',
			'company' => 'required',
			'countDate' => 'digits_between:1,5',
			'sort' => 'digits_between:1,5',
			'address' => 'required',
		);

		$message = array(
			'title.required' => '標題不能空白',
			'bannerSpry1_id.required' => '請選擇分類',
			'bannerSpry2_id.required' => '請選擇分類',
			'company.required' => '請填寫公司行號',
			'address.required' => '請填寫內容',
			'countDate.digits_between' => '上架天數介於 :min 到 :max 位數字',
			'sort.digits_between' => '上架天數介於 :min 到 :max 位數字',
		);

		$validator = Validator::make(Input::all(), $rules, $message);
		if($validator->fails()) {
			return Redirect::to($error_url)->withErrors($validator)->withInput();
		}
		else {
			$data = [
				'title' => Input::get('title'),
				'bannerSpry1_id' => Input::get('bannerSpry1_id'),
				'bannerSpry2_id' => Input::get('bannerSpry2_id'),
				'company' => Input::get('company'),
				'startDate' => Input::get('startDate'),
				'endDate' => Input::get('endDate'),
				'countDate' => Input::get('countDate'),
				'url' => Input::get('url'),
				'address' => Input::get('address'),
				'description' => Input::get('description'),
				'sort' => Input::get('sort'),
				'tags' => Input::get('tags'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			if(isset($_FILES)) {
				$upload_path = public_path() . '/upload/banner/';
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
			$id = DB::table('banner')->insertGetId($data);
			Session::flash('notice','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				您已成功新增廣告！
			</div>');

			return Redirect::to($success_url);
		}
	}

	public function editBanner($banner_id)
	{
		$data = array(
			'action_url' => 'backend/banner/update/',
			'bannerSpry1' => DB::table('bannerSpry1')->orderBy('id','asc')->get(),
			'results' => DB::table('banner')->find($banner_id),
			'view' => array('backend.navigation','banner.edit'),
		);
		return View::make('layouts.backends',$data);
	}

	public function updateBanner($banner_id)
	{
		$error_url = "backend/banner/edit/$banner_id";
		$success_url = "backend/banner";
		$rules = [
			'title' => 'required',
			'bannerSpry1_id' => 'required',
			'bannerSpry2_id' => 'required|integer',
			'company' => 'required',
			'countDate' => 'digits_between:1,5',
			'sort' => 'digits_between:1,5',
			'address' => 'required',
		];

		$message = [
			'title.required' => '標題不能空白',
			'bannerSpry1_id.required' => '請選擇分類',
			'bannerSpry2_id.required' => '請選擇分類',
			'company.required' => '請填寫公司行號',
			'address.required' => '請填寫內容',
			'countDate.digits_between' => '上架天數介於 :min 到 :max 位數字',
			'sort.digits_between' => '上架天數介於 :min 到 :max 位數字',
		];

		$validator = Validator::make(Input::all(), $rules, $message);
		if($validator->fails()) {
			return Redirect::to($error_url)->withErrors($validator)->withInput();
		}
		else {
			$data = [
				'title' => Input::get('title'),
				'bannerSpry1_id' => Input::get('bannerSpry1_id'),
				'bannerSpry2_id' => Input::get('bannerSpry2_id'),
				'company' => Input::get('company'),
				'startDate' => Input::get('startDate'),
				'endDate' => Input::get('endDate'),
				'countDate' => Input::get('countDate'),
				'url' => Input::get('url'),
				'address' => Input::get('address'),
				'description' => Input::get('description'),
				'sort' => Input::get('sort'),
				'tags' => Input::get('tags'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			if(isset($_FILES)) {
				$upload_path = public_path() . '/upload/banner/';
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
			DB::table('banner')->where('id',$banner_id)->update($data);
			Session::flash('notice','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				您已成功更新廣告！
			</div>');

			return Redirect::to($success_url);
		}
	}

	public function destroyBanner($banner_id)
	{
		DB::table('banner')->where('id',$banner_id)->delete();
		Session::flash('notice','<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			您已成功刪除廣告！
		</div>');
		return Redirect::to('backend/banner');
	}


	public function multiBanner()
	{
		$data = [
			'action_url' => 'backend/multiBanner/create',
			'bannerSpry1' => DB::table('bannerSpry1')->orderBy('id','asc')->get(),
			'bannerSpry2' => DB::table('bannerSpry2')->get(),
			'view' => array('backend.navigation','banner.multiCreate'),
		];
		return View::make('layouts.backends',$data);
	}

	public function multiBannerCreate()
	{
		$position = Input::get('position');
		$error_url = 'backend/multiBanner/create';
		$success_url = 'backend/banner';
		if(empty($position)) {
			Session::flash('notice','<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				版位不能空白，請選擇版位！
			</div>');
			return Redirect::to($error_url);
		}

		$rules = [
			'title' => 'required',
			'company' => 'required',
			'position' => 'required',
			'countDate' => 'digits_between:1,5',
			'sort' => 'digits_between:1,5',
			'address' => 'required',
		];

		$message = [
			'title.required' => '標題不能空白',
			'company.required' => '請填寫公司行號',
			'position.required' => '請選擇版位',
			'address.required' => '請填寫內容',
			'countDate.digits_between' => '上架天數介於 :min 到 :max 位數字',
			'sort.digits_between' => '上架天數介於 :min 到 :max 位數字',
		];

		$validator = Validator::make(Input::all(), $rules, $message);
		if($validator->fails()) {
			return Redirect::to($error_url)->withErrors($validator)->withInput();
		}
		else {

			foreach($position as $position) {
				$spry = explode('_',$position);
				$data = array(
					'title' => Input::get('title'),
					'bannerSpry1_id' => $spry[0],
					'bannerSpry2_id' => $spry[1],
					'company' => Input::get('company'),
					'startDate' => Input::get('startDate'),
					'endDate' => Input::get('endDate'),
					'countDate' => Input::get('countDate'),
					'url' => Input::get('url'),
					'address' => Input::get('address'),
					'description' => Input::get('description'),
					'sort' => Input::get('sort'),
					'tags' => Input::get('tags'),
					'updated_at' => date('Y-m-d H:i:s')
				);
				if(isset($_FILES)) {
					$upload_path = public_path() . '/upload/banner/';
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
				DB::table('banner')->insert($data);
			}

			Session::flash('notice','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				您已成功新增廣告！
			</div>');

			return Redirect::to($success_url);
		}
	}

}