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

                    <li class="{{  request()->is('admin/menu') ? 'active ' : ''  }}">
                        <a href="{{ route('menu') }}">
                            <span class="pcoded-micon"><i class="icofont icofont-owl-look"></i></span>
                            <span class="pcoded-mtext">Menu</span>
                        </a>
                    </li>


                    <li class="pcoded-hasmenu {{ request()->is('admin/home')
                            || request()->is('admin/contact-us')
                            || request()->is('admin/privacy-policy')
                            || request()->is('admin/terms-condition')
                            || request()->is('admin/faqs')
                            || request()->is('admin/faqs/list')
                            || request()->is('admin/faqs/edit*')
                            || request()->is('admin/faqs/meta/setting') ? 'pcoded-trigger' : ''}}">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="icofont icofont-ui-note"></i></span>
                            <span class="pcoded-mtext">CMS</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="{{ request()->is('admin/home') ? 'active' : ''}}">
                                <a href="{{ route('show.home.schema') }}">
                                    <span class="pcoded-mtext">Home</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/contact-us') ? 'active' : ''}}">
                                <a href="{{ route('show.contact.schema') }}">
                                    <span class="pcoded-mtext">Contact</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/privacy-policy') ? 'active' : ''}}">
                                <a href="{{ route('show.privacy.policy') }}">
                                    <span class="pcoded-mtext">Privacy Policy</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/terms-condition') ? 'active' : ''}}">
                                <a href="{{ route('show.terms.condition') }}">
                                    <span class="pcoded-mtext">Terms&Condition</span>
                                </a>
                            </li>

                            <li class="{{ request()->is('admin/faqs')
                                    ||  request()->is('admin/faqs/list')
                                    ||  request()->is('admin/faqs/edit*')
                                    ||  request()->is('admin/faqs/meta/setting') ? 'active' : ''}}">
                                <a href="{{ route('show.faqs') }}">
                                    <span class="pcoded-mtext">FAQs</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{  request()->is('admin/author/list') || request()->is('admin/author/create') || request()->is('admin/author/edit*') ? 'active ' : ''  }}">
                        <a href="{{ route('show.author') }}">
                            <span class="pcoded-micon"><i class="icofont icofont-businessman"></i></span>
                            <span class="pcoded-mtext">Author</span>
                        </a>
                    </li>


                    <li class="pcoded-hasmenu {{ request()->is('admin/all/category') || request()->is('admin/edit/category*') ? 'pcoded-trigger' : ''}}
                    {{ request()->is('admin/add/category') ? 'pcoded-trigger' : ''}} ">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="icofont icofont-ui-note"></i></span>
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

                    <li class="pcoded-hasmenu {{ request()->is('admin/all/post') || request()->is('admin/post/edit*') || request()->is('admin/post/draft*') || request()->is('admin/post/publish*') ? 'pcoded-trigger' : ''}}
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
                            <li class="{{ request()->is('admin/all/post')
                                || request()->is('admin/post/edit*')
                                || request()->is('admin/post/draft*')
                                || request()->is('admin/post/publish*') ? 'active' : ''}}">
                                <a href="{{ route('all.post') }}">
                                    <span class="pcoded-mtext">All Post</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="pcoded-hasmenu
                        {{ request()->is('admin/subscriber/list')
                        || request()->is('admin/subscriber/edit*')
                        || request()->is('admin/send/email') ? 'pcoded-trigger' : '' }}
                        ">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="icofont icofont-group"></i></span>
                            <span class="pcoded-mtext">Subscribers</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="
                                {{
                                request()->is('admin/send/email') ||
                                request()->is('admin/subscriber/edit*') ||
                                 request()->is('admin/send/email') ? 'active' : ''
                                }}
                                ">
                                <a href="{{ route('send.email') }}">
                                    <span class="pcoded-mtext">Send Email</span>
                                </a>
                            </li>

                            <li class="
                                {{ request()->is('admin/subscriber/list')
                                || request()->is('admin/subscriber/edit*') ? 'active' : '' }}
                                ">
                                <a href="{{ route('subscriber.list') }}">
                                    <span class="pcoded-mtext">List</span>
                                </a>
                            </li>
                        </ul>

                    <li class="{{  request()->is('admin/general/setting') ? 'active ' : ''  }}">
                        <a href="{{ route('general.setting') }}">
                            <span class="pcoded-micon"><i class="icofont icofont-settings-alt"></i></span>
                            <span class="pcoded-mtext">General Settings</span>
                        </a>
                    </li>

                    <li class="{{  request()->is('admin/internal/link') ? 'active ' : ''  }}">
                        <a href="{{ route('internal.links') }}">
                            <span class="pcoded-micon"><i class="icofont icofont-settings-alt"></i></span>
                            <span class="pcoded-mtext">Internal Links</span>
                        </a>
                    </li>
                    </li>


                </ul>

            </div>
        </nav>

