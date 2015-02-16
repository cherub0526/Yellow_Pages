<div id="page-wrapper">
	<div class="row">
		@if(Session::has('notice'))
		<div class="col-lg-12 col-xs-12"> {{ Session::get('notice') }}</div>
		@endif
		<div class="col-lg-6 col-xs-12">
			<h1 class="page-header">選單管理</h1>
		</div>
		<div class="col-md-3 col-xs-6" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<a href="" class="btn btn-primary btn-lg btn-block">新增選單</a>
		</div>
		<div class="col-md-3 col-xs-6" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<button class="btn btn-primary btn-lg btn-block" onclick="$('#updateForm').submit()">更新選單</button>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">選單列表
					<div class="pull-right">
						<div class="btn-group">
							<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								執行動作
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right" role="menu">
								<li><a href="#">新增選單</a>
								</li>
								<li><a href="javascript:;"  onclick="$('#updateForm').submit()">更新選單</a>
								</li>
								<li class="divider"></li>
								<li><a href="{{ URL::to('backend/firstLevel') }} ">回上一層</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="dataTable_wrapper">
					{{ Form::open(array('url' => URL::to('backend/secondLevel/' . $spry1_id), 'method' => 'POST', 'id' => 'updateForm')) }}
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width:10%">#</th>
									<th style="width:70%">標題</th>
									<th style="width:20%">編輯</th>
								</tr>
							</thead>
							@foreach($spry2 as $tmpSpry2)
								<tr>
									<td>{{ $tmpSpry2->id }}</td>
									<td>
										<input type="hidden" name="id[]" value="{{ $tmpSpry2->id}}" />
										<input style="width:100%" type="text" name="title[]" value="{{ $tmpSpry2->title }}" />
									</td>
									<td>
										<a href="" title="刪除" onclick="return confirm('確定要刪除這筆選單？')"><i class="fa fa-trash fa-fw fa-2x"></i></a>
									</td>
								</tr>
							@endforeach
							<tbody>
							</tbody>
						</table>
					{{ Form::close() }}
					</div>
				</div>
			</div>
			{{ $spry2->links() }}
		</div>
	</div>
</div>