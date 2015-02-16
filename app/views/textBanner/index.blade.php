<div id="page-wrapper">
       <div class="row">
       @if(Session::has('notice'))
            <div class="col-lg-12 col-xs-12"> {{ Session::get('notice') }}</div>
           @endif
           <div class="col-lg-6 col-xs-6">
              <h1 class="page-header">文字廣告</h1>
          </div>
          <div class="col-md-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
                <a href="{{ URL::to('backend/textBanner/create') }}" class="btn btn-primary btn-lg btn-block">新增文字廣告</a>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">廣告列表</div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>標題</th>
                                        <th>圖片</th>
                                        <th>內容</th>
                                        <th>編輯</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($banner as $tmpBanner)
                                <tr>
                                  <td style="width:5%">{{ $tmpBanner->id }}</td>
                                  <td style="width:15%">{{ $tmpBanner->title }}</td>
                                  <td style="width:10%"><img style="width:100px" src="{{ asset('upload/textBanner/' . $tmpBanner->images1 ) }}"></td>
                                  <td style="width:55%">{{ (!empty($tmpBanner->description)) ? str_limit($tmpBanner->description) : '無詳細內容'}}</td>
                                  <td style="width:15%">
                                   <a href="{{ URL::to('backend/textBanner/edit/' . $tmpBanner->id) }}" title="編輯"><i class="fa fa-edit fa-fw fa-2x"></i></a>
                                   <a href="{{ URL::to('backend/textBanner/destroy/' . $tmpBanner->id) }}" title="刪除" onclick="return confirm('確定要刪除這筆資料？')"><i class="fa fa-trash fa-fw fa-2x"></i></a>
                                 </td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
           {{ $banner->links() }}
       </div>
    </div>
</div>