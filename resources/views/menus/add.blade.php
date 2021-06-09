@extends('layouts.admin')

@section('title')
    <title>Menus Page</title>
@endsection

@section('content')

    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
                        app.settings.asideFolded = false;
                        app.settings.asideDock = false;
                      ">
                <!-- main -->
                <div class="col">
                    <!-- main header -->
                    <div class="bg-light lter b-b wrapper-md">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h2 class="m-0 text-uppercase">Thêm mới Menu</h2>
                            </div>
                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('menus.index') }}" class="btn m-b-sm btn-sm btn-primary btnListMenu pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách Menu
                                </a>

                                <a href="{{ route('menus.listReCall') }}" class="btn m-b-sm btn-sm btn-danger btnReCallMenu pull-right m-l btn-addon">
                                    <i class="fa fa-backward mr-1"></i> Menu thu hồi
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- / main header -->
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{route('menus.store')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nameMenu">Tên menu</label>
                                        <input type="text" class="form-control" id="nameMenu" aria-describedby="placeHelp" placeholder="Nhập tên menu" name="nameMenu">
                                    </div>

                                    <div class="form-group">
                                        <label for="menuParent">Menu cha</label>
                                        <select class="form-control" id="menuParent" name="menuParent">
                                            <option value="0">Chọn menu cha</option>
                                            {!! $optionsSelect !!}}
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / main -->
            </div>
        </div>
    </div>

@endsection
