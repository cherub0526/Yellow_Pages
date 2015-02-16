<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-6 col-xs-6">
			<h1 class="page-header">廣告更新</h1>
		</div>
		<div class="col-md-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<button class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回上一頁</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					編輯廣告
				</div>
				<div class="panel-body">
					<div class="row">
						<?php $error = (Session::has('error')) ? Session::get('error') : '' ; ?>
						{{ Form::open(array('url' => URL::to($action_url),'method' => 'POST','files' => true)) }}
						<form role="form">
							<div class="col-lg-6">
								<div class="form-group @if(null != ($errors->first('title'))) has-error @endif">
									<label>廣告標題</label>
									<label class="control-label" for="inputError">{{$errors->first('title') }}</label>
									<input class="form-control" name="title" placeholder="Example：XXX股份有限公司." value="{{{ (!empty(Input::old('title'))) ? Input::old('title'): $results->title }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('company'))) has-error @endif">
									<label>所屬公司行號</label>
									<label class="control-label" for="inputError">{{$errors->first('company') }}</label>
									<input class="form-control" name="company" placeholder="Example：股份有限公司" value="{{{ (!empty(Input::old('company'))) ? Input::old('company'): $results->company }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('startDate'))) has-error @endif">
									<label>上架日期</label>
									<label class="control-label" for="inputError">{{$errors->first('startDate') }}</label>
									<input class="form-control datepicker" name="startDate" placeholder="Example：{{ date('Y-m-d') }}" value="{{{ (!empty(Input::old('startDate'))) ? Input::old('startDate'): $results->startDate }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('endDate'))) has-error @endif">
									<label>下架日期</label>
									<label class="control-label" for="inputError">{{$errors->first('endDate') }}</label>
									<input class="form-control datepicker" name="endDate" placeholder="Example：{{ date('Y-m-d') }}" value="{{{ (!empty(Input::old('endDate'))) ? Input::old('endDate'): $results->endDate }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('countDate'))) has-error @endif">
									<label>上架天數</label>
									<label class="control-label" for="inputError">{{$errors->first('countDate') }}</label>
									<input type="number" class="form-control" name="countDate" placeholder="Example：30" value="{{{ (!empty(Input::old('countDate'))) ? Input::old('countDate'): $results->countDate }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('url'))) has-error @endif">
									<label>廣告網址</label>
									<label class="control-label" for="inputError">{{$errors->first('url') }}</label>
									<input class="form-control" name="url" placeholder="Example：http://www.exa,ple.com" value="{{{ (!empty(Input::old('url'))) ? Input::old('url'): $results->url }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('address'))) has-error @endif">
									<label>廣告地址</label>
									<label class="control-label" for="inputError">{{$errors->first('address') }}</label>
									<input class="form-control" name="address" placeholder="Example：台北市復興南路一段1號."  value="{{{ (!empty(Input::old('address'))) ? Input::old('address'): $results->address }}}">
								</div>
								<div class="form-group @if(null != ($errors->first('sort'))) has-error @endif">
									<label>廣告排序</label>
									<label class="control-label" for="inputError">{{$errors->first('sort') }}</label>
									<input class="form-control" name="sort" placeholder="Default：100" value="{{{ (!empty(Input::old('sort'))) ? Input::old('sort'): $results->sort }}}">
								</div>
								<div class="form-group @if(null != ($errors->first('tags'))) has-error @endif">
									<label>廣告標籤</label>
									<label class="control-label" for="inputError">{{$errors->first('tags') }}</label>
									<input class="form-control" name="tags" placeholder="Example：股份有限公司" value="{{{ (!empty(Input::old('tags'))) ? Input::old('tags'): $results->tags }}}">
								</div>
								<div class="form-group @if(null != ($errors->first('description'))) has-error @endif">
									<label>內容</label>
									<label class="control-label" for="inputError">{{$errors->first('description') }}</label>
									<textarea class="form-control" rows="5" name="description"> {{{ (!empty(Input::old('description'))) ? Input::old('description'): $results->description }}}</textarea>
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
								<button type="submit" class="btn btn-primary">更新廣告</button>
								<button type="reset" class="btn btn-default">重新填寫</button>
							</div>

						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
