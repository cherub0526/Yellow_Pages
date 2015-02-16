<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('backend') }}">更生黃頁後台管理</a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> 設定</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ URL::to('users/logout') }}"><i class="fa fa-sign-out fa-fw"></i> 登出</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="搜尋...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </li>
                <li>
                    <a href="{{ URL::to('backend') }}"><i class="fa fa-dashboard fa-fw"></i> 後台首頁</a>
                </li>
                <li>
                    <a href="javascript:;"><i class="fa fa-dashboard fa-fw"></i> 廣告管理 <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ URL::to('backend/banner') }}">一般廣告</a></li>
                        <li><a href="{{ URL::to('backend/textBanner') }}">文字廣告</a></li>
                    </ul>
                </li>
                <li @if(isset($table_id)) {{ 'class="active"' }} @endif>
                    <a href="javascript:;"><i class="fa fa-fw"></i> 分類網站商家管理 <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        @foreach($spry1 as $spry)
                        <li>
                            <a {{ (isset($table_id) && $table_id == $spry->id) ? 'class="active"' : '' }} href="{{ URL::to('backend/'. $spry->id . '/' . $spry->table_name) }}">{{ $spry->title }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>