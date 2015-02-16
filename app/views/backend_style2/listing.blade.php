<div id="page-wrapper">
    <div class="row">
        @if(Session::has('notice'))  {{ Session::get('notice') }} @endif
        <div class="col-lg-6 col-xs-6">
            <h1 class="page-header">{{ $tabletitle }}</h1>
        </div>
        <div class="col-md-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
            <a href="{{ URL::to($action_url . '/create') }}" class="btn btn-primary btn-lg btn-block">新增商家</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">商家列表</div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>商家</th>
                                    <th>圖片</th>
                                    <th>內容</th>
                                    <th>編輯</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($results as $result)
                               <tr>
                                <td style="width:5%">{{ $result->id }}</td>
                                <td style="width:15%">{{ $result->title }}</td>
                                <td style="width:20%"><img style="width:100px" src="{{ asset('upload/images/' . $result->images1) }}"></td>
                                <td style="width:45%">{{ str_limit($result->description) }}</td>
                                <td style="width:15%">
                                   <a href="{{ URL::to($action_url . '/edit/' . $result->id ) }}" title="編輯"><i class="fa fa-edit fa-fw fa-2x"></i></a>
                                   <a href="{{ URL::to($action_url . '/destroy/' . $result->id ) }}" title="刪除" onclick="return confirm('確定要餐除此比資料？')"><i class="fa fa-trash fa-fw fa-2x"></i></a>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>

                   {{ $results->links() }}
               </div>
           </div>
       </div>
   </div>
</div>
</div>