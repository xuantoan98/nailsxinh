<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">
            <!-- user -->
            <div class="clearfix hidden-xs text-center hide" id="aside-user">
                <div class="dropdown wrapper">
                    <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="img/a0.jpg" class="img-full" alt="...">
                </span>
                    </a>
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt">John.Smith</strong>
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block">Art Director</span>
                </span>
                    </a>
                    <!-- dropdown -->
                    <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                        <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                            <span class="arrow top hidden-folded arrow-info"></span>
                            <div>
                                <p>300mb of 500mb used</p>
                            </div>
                            <div class="progress progress-xs m-b-none dker">
                                <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%"
                                     style="width: 50%"></div>
                            </div>
                        </li>
                        <li>
                            <a href>Settings</a>
                        </li>
                        <li>
                            <a href="page_profile.html">Profile</a>
                        </li>
                        <li>
                            <a href>
                                <span class="badge bg-danger pull-right">3</span>
                                Notifications
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="page_signin.html">Logout</a>
                        </li>
                    </ul>
                    <!-- / dropdown -->
                </div>
                <div class="line dk hidden-folded"></div>
            </div>
            <!-- / user -->

            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Kh??ch h??ng</span>
                    </li>

                    <li>
                        <a href="{{ route('clients.index') }}" class="nav-link">
                            <i class="icon-users"></i>
                            <span>Qu???n l?? kh??ch h??ng</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('schedules.index') }}" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span>Qu???n l?? ?????t l???ch</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('sources.index') }}" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span>Qu???n l?? ngu???n</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('channels.index') }}" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span>Qu???n l?? k??nh</span>
                        </a>
                    </li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Nh??n s???</span>
                    </li>

                    <li>
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="icon-lock"></i>
                            <span>Qu???n l?? t??i kho???n</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="icon-lock"></i>
                            <span>Ph??n quy???n</span>
                        </a>
                    </li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>D???ch v???</span>
                    </li>

                    <li>
                        <a href="{{ route('services.index') }}" class="nav-link">
                            <i class="fa fa-check-square-o"></i>
                            <span>Qu???n l?? d???ch v???</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categoriesServices.index') }}" class="nav-link">
                            <i class="fa fa-list-alt"></i>
                            <span>Danh m???c d???ch v???</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tags.index') }}" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span>Qu???n l?? th???</span>
                        </a>
                    </li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>C?? s???</span>
                    </li>

                    <li>
                        <a href="{{ route('places.index') }}" class="nav-link">
                            <i class="fa fa-map-marker"></i>
                            <span>Qu???n l?? c?? s???</span>
                        </a>
                    </li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>C??i ?????t website</span>
                    </li>

                    <li>
                        <a href="{{ route('settings.index') }}" class="nav-link">
                            <i class="icon-settings"></i>
                            <span>C??i ?????t website</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('menus.index') }}" class="nav-link">
                            <i class="icon-list"></i>
                            <span>Qu???n l?? menu</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>
