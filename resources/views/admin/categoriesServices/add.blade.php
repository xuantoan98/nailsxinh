@extends('layouts.admin')

@section('title')
    <title>Danh mục dịch vụ</title>
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
                                <h1 class="m-0 text-uppercase">Thêm mới danh mục</h1>
                            </div>

                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('categoriesServices.index') }}" class="btn m-b-sm btn-sm btn-primary btnListCateServices pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách danh mục
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- / main header -->
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{route('categoriesServices.store')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nameCateServices">Tên danh mục</label>
                                        <input type="text" class="form-control" id="nameCateServices" aria-describedby="placeHelp" placeholder="Nhập tên danh mục" name="nameCateServices">
                                    </div>

                                    <div class="form-group">
                                        <label for="cateParent">Danh mục cha</label>
                                        <select class="form-control" id="cateParent" name="cateParent">
                                            <option value="0">Chọn danh mục cha</option>
                                            {!! $htmlOptions !!}
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
