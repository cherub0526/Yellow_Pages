<div id="page-wrapper">
	<div class="row">
		@if(Session::has('notice'))
		<div class="col-lg-12 col-xs-12"> {{ Session::get('notice') }}</div>
		@endif
		<div class="col-lg-6 col-xs-6">
			<h1 class="page-header">新增廣告</h1>
		</div>
		<div class="col-md-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<button class="btn btn-primary btn-lg btn-block" onclick="history.go(-1)">返回上一頁</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					新增廣告
					<div class="pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								執行動作
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="{{ URL::to('backend/banner/create') }}">單筆新增</a>
								</li>
								<li><a href="{{ URL::to('backend/multiBanner/create') }}">批量新增</a>
								</li>
								<li class="divider"></li>
								<li><a href="javascript:;">回上一頁</a>
								</li>
							</ul>
						</div>
					</div>
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
									<input class="form-control" name="title" placeholder="Example：XXX股份有限公司." value="{{{ Input::old('title') }}}">
								</div>
								<div class="col-md-12" style="margin-bottom: 10%">
									<?php $count = 1;?>
									@foreach($bannerSpry1 as $tmpSpry1)
									<div class="form-group col-md-6 col-xs-6" style="height:100px">
										<label style="margin-left: -30px">{{ ($count == 1) ? '請選擇版位' : ' '}}</label>
										<div class="checkbox">
										@foreach($bannerSpry2 as $tmpSpry2)
											@if($tmpSpry1->position == $tmpSpry2->bannerSpry1_id)
											<label>
												<input name="position[]" type="checkbox" value="{{ $tmpSpry2->bannerSpry1_id}}_{{$tmpSpry2->position}}">{{ $tmpSpry1->title }} / {{ $tmpSpry2->title }}
											</label>
											@endif
										@endforeach
										</div>
									</div>
									<?php $count++;?>
									@endforeach
								</div>

								<div class="form-group @if(null != ($errors->first('company'))) has-error @endif">
									<label>所屬公司行號</label>
									<label class="control-label" for="inputError">{{$errors->first('company') }}</label>
									<input class="form-control" name="company" placeholder="Example：股份有限公司" value="{{{ Input::old('company') }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('startDate'))) has-error @endif">
									<label>上架日期</label>
									<label class="control-label" for="inputError">{{$errors->first('startDate') }}</label>
									<input class="form-control datepicker" name="startDate" placeholder="Example：{{ date('Y-m-d') }}" value="{{{ Input::old('startDate') }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('endDate'))) has-error @endif">
									<label>下架日期</label>
									<label class="control-label" for="inputError">{{$errors->first('endDate') }}</label>
									<input class="form-control datepicker" name="endDate" placeholder="Example：{{ date('Y-m-d') }}" value="{{{ Input::old('endDate') }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('countDate'))) has-error @endif">
									<label>上架天數</label>
									<label class="control-label" for="inputError">{{$errors->first('countDate') }}</label>
									<input type="number" class="form-control" name="countDate" placeholder="Example：30" value="{{{ Input::old('countDate') }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('url'))) has-error @endif">
									<label>廣告網址</label>
									<label class="control-label" for="inputError">{{$errors->first('url') }}</label>
									<input class="form-control" name="url" placeholder="Example：http://www.example.com" value="{{{ Input::old('url') }}}">
								</div>

								<div class="form-group @if(null != ($errors->first('address'))) has-error @endif">
									<label>廣告地址</label>
									<label class="control-label" for="inputError">{{$errors->first('address') }}</label>
									<input class="form-control" name="address" placeholder="Example：台北市復興南路一段1號." value="{{{ Input::old('address') }}}">
								</div>
							</div>

							<div class="col-md-6 col-xs-6">
								<div class="form-group @if(null != ($errors->first('sort'))) has-error @endif">
									<label>廣告排序</label>
									<label class="control-label" for="inputError">{{$errors->first('sort') }}</label>
									<input class="form-control" name="sort" placeholder="Default：100" value="{{{ Input::old('sort') }}}">
								</div>
								<div class="form-group @if(null != ($errors->first('tags'))) has-error @endif">
									<label>廣告標籤</label>
									<label class="control-label" for="inputError">{{$errors->first('tags') }}</label>
									<input class="form-control" name="tags" placeholder="Example：股份有限公司" value="{{{ Input::old('tags') }}}">
								</div>
								<div class="form-group @if(null != ($errors->first('description'))) has-error @endif">
									<label>內容</label>
									<label class="control-label" for="inputError">{{$errors->first('description') }}</label>
									<textarea class="form-control" rows="5" name="description">{{{ Input::old('description') }}}</textarea>
								</div>
							</div>

							<div class="col-lg-6">
								<h4>圖片上傳</h4>
								<div class="form-group col-md-6 col-xs-6">
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
											<img data-src="holder.js/100%x100%" alt="...">
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
											<img data-src="holder.js/100%x100%" alt="...">
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
											<img data-src="holder.js/100%x100%" alt="...">
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
											<img data-src="holder.js/100%x100%" alt="...">
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
								<button type="submit" class="btn btn-primary">新增廣告</button>
								<button type="reset" class="btn btn-default">重新填寫</button>
							</div>
						{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
