<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-6 col-xs-6">
			<h1 class="page-header">{{ $tabletitle }}</h1>
		</div>
		<div class="col-md-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<button class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回上一頁</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					編輯商店
				</div>
				<div class="panel-body">
					<div class="row">
						<?php $error = (Session::has('error')) ? Session::get('error') : '' ; ?>
						{{ Form::open(array('url' => URL::to($action_url),'method' => 'POST','files' => true)) }}
						<form role="form">
							<div class="col-lg-6">
								<div class="form-group @if(null != ($errors->first('title'))) has-error @endif">
									<label>商店名稱</label>
									<label class="control-label" for="inputError">{{$errors->first('title') }}</label>
									<input class="form-control" name="title" placeholder="Example：XXX股份有限公司." value="{{{ (!empty(Input::old('title'))) ? Input::old('title'): $results->title }}}">
								</div>
								<div class="form-group @if(null != ($errors->first('backend_spry1_id'))) has-error @endif">
									<label for="disabledSelect">所屬網站</label>
									<label class="control-label" for="inputError">{{$errors->first('backend_spry1_id') }}</label>
									<select class="form-control" name="backend_spry1_id" disabled>
										<option value="{{ $table_id }}">{{ $tabletitle }}</option>
									</select>
								</div>

								<div class="form-group @if(null != ($errors->first('backend_spry2_id'))) has-error @endif">
									<label>分類</label>
									<?php $spry2_id = (!empty(Input::old('backend_spry2_id'))) ? Input::old('backend_spry2_id'): $results->backend_spry2_id ; ?>
									<label class="control-label" for="inputError">{{$errors->first('backend_spry2_id') }}</label>
									<select class="form-control" name="backend_spry2_id" >
										<option value="">請選擇分類</option>
										@foreach($spry2 as $tmpSpry2)
										<option value="{{ $tmpSpry2->id }}" @if($spry2_id == $tmpSpry2->id) selected="selected" @endif>{{ $tmpSpry2->title }}</option>
										@endforeach
									</select>
								</div>

								<div class="form-group @if(null != ($errors->first('tel'))) has-error @endif">
									<label>聯絡電話</label>
									<label class="control-label" for="inputError">{{$errors->first('tel') }}</label>
									<input class="form-control" name="tel" placeholder="Example：028571437" value="{{{ (!empty(Input::old('tel'))) ? Input::old('tel'): $results->tel }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('url'))) has-error @endif">
									<label>商店網站</label>
									<label class="control-label" for="inputError">{{$errors->first('url') }}</label>
									<input class="form-control" name="url" placeholder="Example：台北市復興南路一段1號." value="{{{ (!empty(Input::old('url'))) ? Input::old('url'): $results->url }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('address'))) has-error @endif">
									<label>商店地址</label>
									<label class="control-label" for="inputError">{{$errors->first('address') }}</label>
									<input class="form-control" name="address" placeholder="Example：台北市復興南路一段1號." value="{{{ (!empty(Input::old('address'))) ? Input::old('address'): $results->address }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('description'))) has-error @endif">
									<label>內容</label>
									<label class="control-label" for="inputError">{{$errors->first('description') }}</label>
									<textarea class="form-control" rows="5" name="description">{{{ (!empty(Input::old('description'))) ? Input::old('description'): $results->description }}}</textarea>
								</div>
							</div>

							<div class="col-lg-6">
								<h4>圖片上傳</h4>
								<div class="form-group col-md-6 col-xs-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img data-src="{{ ( !empty($results->images1) ? asset('upload/images/'.$results->images1) : 'holder.js/100%x100%' ) }}" alt="..." src="{{ ( !empty($results->images1) ? asset('upload/images/'.$results->images1) : 'holder.js/100%x100%' ) }}">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-default btn-file"><span class="fileinput-new">選擇圖片</span><span class="fileinput-exists">更換圖片</span><input type="file" name="images1"></span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">移除圖片</a>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6 col-xs-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img data-src="{{ ( !empty($results->images2) ? asset('upload/images/'.$results->images2) : 'holder.js/100%x100%' ) }}" alt="..." src="{{ ( !empty($results->images2) ? asset('upload/images/'.$results->images2) : 'holder.js/100%x100%' ) }}">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-default btn-file"><span class="fileinput-new">選擇圖片</span><span class="fileinput-exists">更換圖片</span><input type="file" name="images2"></span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">移除圖片</a>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6 col-xs-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img data-src="{{ ( !empty($results->images3) ? asset('upload/images/'.$results->images3) : 'holder.js/100%x100%' ) }}" alt="..." src="{{ ( !empty($results->images3) ? asset('upload/images/'.$results->images3) : 'holder.js/100%x100%' ) }}">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-default btn-file"><span class="fileinput-new">選擇圖片</span><span class="fileinput-exists">更換圖片</span><input type="file" name="images3"></span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">移除圖片</a>
										</div>
									</div>
								</div>
								<div class="form-group col-md-6 col-xs-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img data-src="{{ ( !empty($results->images4) ? asset('upload/images/'.$results->images4) : 'holder.js/100%x100%' ) }}" alt="..." src="{{ ( !empty($results->images4) ? asset('upload/images/'.$results->images4) : 'holder.js/100%x100%' ) }}">
										</div>
										<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
										<div>
											<span class="btn btn-default btn-file"><span class="fileinput-new">選擇圖片</span><span class="fileinput-exists">更換圖片</span><input type="file" name="images4"></span>
											<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">移除圖片</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-6">
								<button type="submit" class="btn btn-primary">更新店家</button>
								<button type="reset" class="btn btn-default">重新填寫</button>
							</div>

						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
