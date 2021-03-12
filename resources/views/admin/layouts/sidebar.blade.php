<!--sidebar -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel"></div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="{{  request()->is('admin/dashboard') ? 'active ' : ''  }}">
                        <a href="{{ route('dashboard') }}">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>

                    <li class="pcoded-hasmenu {{ request()->is('admin/all/category') || request()->is('admin/edit/category*') ? 'pcoded-trigger' : ''}}
                    {{ request()->is('admin/add/category') ? 'pcoded-trigger' : ''}} ">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                            <span class="pcoded-mtext">Category</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="{{ request()->is('admin/add/category') ? 'active' : ''}}">
                                <a href="{{ route('add.category') }}">
                                    <span class="pcoded-mtext">Add Category</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/all/category') || request()->is('admin/edit/category*')? 'active' : ''}}">
                                <a href="{{ route('all.category') }}">
                                    <span class="pcoded-mtext">All Category</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="pcoded-hasmenu {{ request()->is('admin/all/post') || request()->is('admin/edit/post*') ? 'pcoded-trigger' : ''}}
                    {{ request()->is('admin/create/post') ? 'pcoded-trigger' : ''}} ">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                            <span class="pcoded-mtext">Blog</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="{{ request()->is('admin/create/post') ? 'active' : ''}}">
                                <a href="{{ route('create.post') }}">
                                    <span class="pcoded-mtext">Create Post</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/all/post') || request()->is('admin/edit/post*')? 'active' : ''}}">
                                <a href="{{ route('all.post') }}">
                                    <span class="pcoded-mtext">All Post</span>
                                </a>
                            </li>

                        </ul>
                    </li>


                </ul>

            </div>
        </nav>

