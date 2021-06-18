<!DOCTYPE html>
<html lang="en" class="">
<head>
    <meta charset="utf-8" />
    <title>Html version | Angulr</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="{{ asset('html_version/libs/assets/animate.css/animate.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('html_version/libs/assets/font-awesome/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('html_version/libs/assets/simple-line-icons/css/simple-line-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('html_version/libs/jquery/bootstrap/dist/css/bootstrap.css') }}" type="text/css" />

    <link rel="stylesheet" href="{{ asset('html_version/html/css/font.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('html_version/html/css/app.css') }}" type="text/css" />

    <style>
        .app-content {
            margin-left: 0;
        }

        .collapse.pos-rlt.navbar-collapse {
            margin-left: 0;
        }

        .box {
            max-width: 360px;
            margin: 0 auto;
            padding: 30px 15px;
            border: 1px solid #dee5e7;
        }

        .box h3 {
            text-align: center;
        }

        .box-title {
            text-align: center;
        }

        .box-title span {
            text-transform: uppercase;
            font-size: 24px;
            font-weight: 700;
        }

        .box-title span.nameCrm {
            color: #c8a57e;
        }
    </style>

</head>
<body>
<div class="app app-header-fixed ">
    <!-- content -->
    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
                    app.settings.asideFolded = false;
                    app.settings.asideDock = false;
                  ">
                <!-- main -->
                <div class="col">
                    <!-- / main header -->
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box">
                                    <div class="box-title m-b">
                                        <a href="#">
                                            <span class="nameCrm">NailsXinh</span>
                                            <span class="crm">crm</span>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="panel panel-default">
                                            <div class="panel-heading font-bold">Đăng nhập</div>
                                            <div class="panel-body">
                                                <form class="bs-example form-horizontal ng-pristine ng-valid">
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <div class="input-group m-b">
                                                                <span class="input-group-addon"><i class="fa icon-user"></i></span>
                                                                <input type="text" class="form-control" name="email" placeholder="Email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <div class="checkbox">
                                                                <label class="i-checks">
                                                                    <input type="checkbox" name="remember_me" checked=""><i></i> Nhớ mật khẩu
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <button type="submit" class="btn btn-sm btn-info" style="width: 100%">Đăng nhập</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- / main -->
            </div>
        </div>
    </div>
    <!-- /content -->



</div>

<script src="{{ asset('html_version/libs/jquery/jquery/dist/jquery.js') }}"></script>
<script src="{{ asset('html_version/libs/jquery/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-load.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-jp.config.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-jp.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-nav.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-toggle.js') }}"></script>
<script src="{{ asset('html_version/html/js/ui-client.js') }}"></script>

</body>
</html>
