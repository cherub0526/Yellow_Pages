<div id="page-wrapper">
	<div class="row">
		@if(Session::has('notice'))
		<div class="col-lg-12 col-xs-12"> {{ Session::get('notice') }}</div>
		@endif
		<div class="col-lg-6 col-xs-12">
			<h1 class="page-header">選單管理</h1>
		</div>
		<div class="col-md-3 col-xs-6" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<a href="javascript:;" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#firstLevel">新增選單</a>
		</div>
		<div class="col-md-3 col-xs-6" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
			<button class="btn btn-primary btn-lg btn-block" onclick="$('#updateForm').submit()">更新選單</button>
		</div>
		<div class="modal fade" id="firstLevel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				{{ Form::open(array('url' => URL::to(''))) }}
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">第一層選單新增</h4>
					</div>
					<div class="modal-body">
						...
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary">發布</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
					</div>
				{{ Form::close() }}
				</div>
			</div>
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
								<li><a href="javascript:;" onclick="history.go(-1)">回上一頁</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="dataTable_wrapper">
					{{ Form::open(array('url' => URL::to('backend/firstLevel'), 'method' => 'POST', 'id' => 'updateForm')) }}
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width:10%">#</th>
									<th style="width:30%">標題</th>
									<th style="width:40%">資料表名稱</th>
									<th style="width:20%">編輯</th>
								</tr>
							</thead>
							@foreach($spry1 as $tmpSpry1)
								<tr>
									<td>{{ $tmpSpry1->id }}</td>
									<td>
										<input type="hidden" name="id[]" value="{{ $tmpSpry1->id}}" />
										<input style="width:100%" type="text" name="title[]" value="{{ $tmpSpry1->title }}" required/>
									</td>
									<td>
										<input type="hidden" name="ori_table[]" value="{{ $tmpSpry1->table_name }}" />
										<input style="width:100%" type="text" name="new_table[]" value="{{ $tmpSpry1->table_name }}"/>
									</td>
									<td>
										<a href="{{ URL::to('backend/secondLevel/' . $tmpSpry1->id ) }}" title="前往第二層"><i class="fa fa-external-link fa-fw fa-2x"></i></a>
										<a href="" title="刪除" onclick="return confirm('這會連資料表一起刪除！！確定要刪除？')"><i class="fa fa-trash fa-fw fa-2x"></i></a>
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
			{{ $spry1->links() }}
		</div>
	</div>
</div>