
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('backend') }}">更生黃頁後台管理</a>
    </div>
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->username }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="{{ URL::to('users/logout') }}"><i class="fa fa-fw fa-power-off"></i> 登出</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#folder"><i class="fa fa-fw fa-folder-o"></i> 選單管理 <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="folder" class="collapse">
                    <li>
                        <a href="{{ URL::to('backend/firstLevel') }}">第一層選單</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#banner"><i class="fa fa-fw fa-money"></i> 廣告管理 <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="banner" class="collapse">
                    <li>
                        <a href="{{ URL::to('backend/banner') }}">圖像廣告管理</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('backend/multiBanner/create') }}">批量上傳圖像廣告</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('backend/textBanner') }}">文字廣告管理</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#site"><i class="fa fa-fw fa-sitemap"></i> 分類網站商家管理 <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="site" class="collapse">
                 @foreach($spry1 as $spry)
                 <li>
                     <a {{ (isset($table_id) && $table_id == $spry->id) ? 'class="active"' : '' }} href="{{ URL::to('backend/'. $spry->id . '/' . $spry->table_name) }}">{{ $spry->title }}</a>
                 </li>
                 @endforeach
             </ul>
         </li>
         <li class="">
            <a href="{{ URL::to('backend') }}"><i class="fa fa-fw fa-dashboard"></i> 後台首頁</a>
        </li>
        <li>
            <a href="{{ URL::to('') }}"><i class="fa fa-fw fa-home"></i> 前台首頁</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>