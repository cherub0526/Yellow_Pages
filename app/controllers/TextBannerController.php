<?php

class TextBannerController extends \BaseController {

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
			'banner' => DB::table('textBanner')->orderBy('id','desc')->paginate(1),
			'view' => array('backend.navigation','textBanner.index'),
		);
		return View::make('layouts.backends',$data);
	}

	public function createBanner()
	{
		$data = array(
			'action_url' => 'backend/textBanner/new',
			'bannerSpry1' => DB::table('bannerSpry1')->orderBy('id','asc')->get(),
			'view' => array('backend.navigation','textBanner.create'),
		);
		return View::make('layouts.backends',$data);
	}

	public function insertBanner()
	{
		$error_url = 'backend/textBanner/create';
		$success_url = 'backend/textBanner';
		$rules = array(
			'title' => 'required',
			'company' => 'required',
			'countDate' => 'digits_between:1,5',
			'sort' => 'digits_between:1,5',
			'address' => 'required',
		);

		$message = array(
			'title.required' => '標題不能空白',
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
			$data = array(
				'title' => Input::get('title'),
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
			$id = DB::table('textBanner')->insertGetId($data);
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
			'action_url' => "backend/textBanner/update/$banner_id",
			'results' => DB::table('textBanner')->find($banner_id),
			'view' => array('backend.navigation','textBanner.edit'),
		);
		return View::make('layouts.backends',$data);
	}

	public function updateBanner($banner_id)
	{
		$error_url = 'backend/textBanner/edit/' . $banner_id;
		$success_url = 'backend/textBanner';
		$rules = array(
			'title' => 'required',
			'company' => 'required',
			'countDate' => 'digits_between:1,5',
			'sort' => 'digits_between:1,5',
			'address' => 'required',
		);

		$message = array(
			'title.required' => '標題不能空白',
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
			$data = array(
				'title' => Input::get('title'),
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
			DB::table('textBanner')->where('id',$banner_id)->update($data);
			Session::flash('notice','<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				您已成功更新廣告！
			</div>');

			return Redirect::to($success_url);
		}
	}

	public function destroyBanner($banner_id)
	{
		DB::table('textBanner')->where('id',$banner_id)->delete();
		Session::flash('notice','<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			您已成功刪除廣告！
		</div>');
		return Redirect::to('backend/textBanner');
	}

}