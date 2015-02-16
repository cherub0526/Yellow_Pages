<div id="page-wrapper">
       <div class="row">
            @if(Session::has('notice'))
            <div class="col-lg-12 col-xs-12"> {{ Session::get('notice') }}</div>
           @endif
           <div class="col-lg-6 col-xs-6">
              <h1 class="page-header">圖像廣告</h1>
          </div>
          <div class="col-md-3 col-xs-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
                <a href="{{ URL::to('backend/banner/create') }}" class="btn btn-primary btn-lg btn-block">單筆新增</a>
          </div>

          <div class="col-md-3 col-xs-3" style="padding-bottom:9px;margin-top: 40px;margin-bottom: 20px;float:right;">
                <a href="{{ URL::to('backend/multiBanner/create') }}" class="btn btn-primary btn-lg btn-block">批量新增</a>
          </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">廣告列表
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
                        <div class="dataTable_wrapper">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>標題</th>
                                        <th>顯示位置</th>
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
                                  <td style="width:15%">{{ bannerSpry($spry1Banner,$spry2Banner,$tmpBanner->bannerSpry1_id,$tmpBanner->bannerSpry2_id) }}</td>
                                  <td style="width:20%"><img style="width:100px" src="{{ asset('upload/banner/' . $tmpBanner->images1 ) }}"></td>
                                  <td style="width:30%">{{ (!empty($tmpBanner->description)) ? str_limit($tmpBanner->description) : '無詳細內容'}}</td>
                                  <td style="width:15%">
                                   <a href="{{ URL::to('backend/banner/edit/' . $tmpBanner->id) }}" title="編輯"><i class="fa fa-edit fa-fw fa-2x"></i></a>
                                   <a href="{{ URL::to( 'backend/banner/destroy/' . $tmpBanner->id) }}" title="刪除" onclick="return confirm('確定要刪除這筆資料？')"><i class="fa fa-trash fa-fw fa-2x"></i></a>
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