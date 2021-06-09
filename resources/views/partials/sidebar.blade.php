{{--<aside class="main-sidebar sidebar-dark-primary elevation-4">--}}

{{--  <a href="{{ route('home') }}" class="brand-link">--}}
{{--    <img src="{{asset('adminlte/dist/img/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--      style="opacity: .8">--}}
{{--    <span class="brand-text font-weight-light">Nailsxinh</span>--}}
{{--  </a>--}}

{{--  <div class="sidebar">--}}
{{--    <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--      <div class="image">--}}
{{--        <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--      </div>--}}
{{--      <div class="info">--}}
{{--        <a href="#" class="d-block">Alexander Pierce</a>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <div class="form-inline">--}}
{{--      <div class="input-group" data-widget="sidebar-search">--}}
{{--        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--        <div class="input-group-append">--}}
{{--          <button class="btn btn-sidebar">--}}
{{--            <i class="fas fa-search fa-fw"></i>--}}
{{--          </button>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}

{{--    <nav class="mt-2">--}}
{{--      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">--}}
{{--        <li class="nav-item">--}}
{{--          <a href="{{ route('clients.index') }}" class="nav-link">--}}
{{--            <i class="nav-icon fas fa-address-card"></i>--}}
{{--            <p>--}}
{{--              Quản lý khách hàng--}}
{{--            </p>--}}
{{--          </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--          <a href="{{ route('employees.index') }}" class="nav-link">--}}
{{--            <i class="nav-icon fas fa-user"></i>--}}
{{--            <p>--}}
{{--              Quản lý nhân viên--}}
{{--            </p>--}}
{{--          </a>--}}
{{--        </li>--}}

{{--        <li class="nav-item">--}}
{{--          <a href="{{ route('places.index') }}" class="nav-link">--}}
{{--            <i class=" nav-icon fas fa-map-marker-alt"></i>--}}
{{--            <p>--}}
{{--              Quản lý cơ sở--}}
{{--            </p>--}}
{{--          </a>--}}
{{--        </li>--}}

{{--          <li class="nav-item">--}}
{{--              <a href="{{ route('categoriesServices.index') }}" class="nav-link">--}}
{{--                  <i class="nav-icon fab fa-servicestack"></i>--}}
{{--                  <p>--}}
{{--                      Danh mục dịch vụ--}}
{{--                  </p>--}}
{{--              </a>--}}
{{--          </li>--}}

{{--        <li class="nav-item">--}}
{{--          <a href="{{ route('services.index') }}" class="nav-link">--}}
{{--            <i class="nav-icon fab fa-servicestack"></i>--}}
{{--            <p>--}}
{{--              Quản lý dịch vụ--}}
{{--            </p>--}}
{{--          </a>--}}
{{--        </li>--}}

{{--          <li class="nav-item">--}}
{{--              <a href="{{ route('tags.index') }}" class="nav-link">--}}
{{--                  <i class="nav-icon fab fa-servicestack"></i>--}}
{{--                  <p>--}}
{{--                      Quản lý Tags--}}
{{--                  </p>--}}
{{--              </a>--}}
{{--          </li>--}}

{{--        <li class="nav-item">--}}
{{--          <a href="{{ route('schedules.index') }}" class="nav-link">--}}
{{--            <i class="nav-icon fas fa-calendar-plus"></i>--}}
{{--            <p>--}}
{{--              Quản lý đặt lịch--}}
{{--            </p>--}}
{{--          </a>--}}
{{--        </li>--}}

{{--          <li class="nav-item">--}}
{{--              <a href="{{ route('menus.index') }}" class="nav-link">--}}
{{--                  <i class="nav-icon fas fa-calendar-plus"></i>--}}
{{--                  <p>--}}
{{--                      Quản lý Menus--}}
{{--                  </p>--}}
{{--              </a>--}}
{{--          </li>--}}
{{--      </ul>--}}
{{--    </nav>--}}
{{--  </div>--}}
{{--</aside>--}}


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
                        <span>Navigations</span>
                    </li>

                    <li>
                        <a href="{{ route('clients.index') }}" class="nav-link">
                            <i class="icon-users"></i>
                            <span>Quản lý khách hàng</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('employees.index') }}" class="nav-link">
                            <i class="icon-lock"></i>
                            <span>Quản lý tài khoản</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('places.index') }}" class="nav-link">
                            <i class="fa fa-map-marker"></i>
                            <span>Quản lý cơ sở</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('services.index') }}" class="nav-link">
                            <i class="fa fa-check-square-o"></i>
                            <span>Quản lý dịch vụ</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('categoriesServices.index') }}" class="nav-link">
                            <i class="fa fa-list-alt"></i>
                            <span>Danh mục dịch vụ</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('tags.index') }}" class="nav-link">
                            <i class="icon-tag"></i>
                            <span>Quản lý thẻ</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('places.index') }}" class="nav-link">
                            <i class="icon-calendar"></i>
                            <span>Quản lý đặt lịch</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('menus.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-th-list"></i>
                            <span>Quản lý menu</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('sources.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-th-list"></i>
                            <span>Quản lý nguồn</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('channels.index') }}" class="nav-link">
                            <i class="glyphicon glyphicon-th-list"></i>
                            <span>Quản lý kênh</span>
                        </a>
                    </li>

                    <li>
                        <a href class="auto">
                          <span class="pull-right text-muted">
                            <i class="fa fa-fw fa-angle-right text"></i>
                            <i class="fa fa-fw fa-angle-down text-active"></i>
                          </span>
                            {{--                            <b class="badge bg-info pull-right">3</b>--}}
                            <i class="icon-settings"></i>
                            <span>Cài đặt website</span>
                        </a>
                        <ul class="nav nav-sub dk">
                            <li class="nav-sub-header">
                                <a href>
                                    <span>Layout</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_app.html">
                                    <span>Application</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_fullwidth.html">
                                    <span>Full width</span>
                                </a>
                            </li>
                            <li>
                                <a href="layout_boxed.html">
                                    <span>Boxed layout</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>
