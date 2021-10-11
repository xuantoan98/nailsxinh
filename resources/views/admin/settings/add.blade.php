<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Setting Page</title>
@endsection

@section('content')

    <div id="content" class="app-content" role="main">
        <div class="app-content-body ">
            <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
                        app.settings.asideFolded = false;
                        app.settings.asideDock = false;
                      ">
                <div class="col">
                    <div class="bg-light lter b-b wrapper-md">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-uppercase">Thêm mới cài đặt</h1>
                            </div>

                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('settings.index') }}" class="btn m-b-sm btn-sm btn-primary btnListSettings pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách cài đặt
                                </a>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="alert ng-isolate-scope alert-success alert-dismissable mb-0" ng-class="['alert-' + (type || 'warning'), closeable ? 'alert-dismissable' : null]" role="alert" ng-repeat="alert in alerts" type="success" close="closeAlert($index)">
                            <button ng-show="closeable" type="button" class="close" ng-click="close()" aria-hidden="false">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <div ng-transclude=""><span class="ng-binding ng-scope">{{ session('success') }}</span></div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert ng-isolate-scope alert-danger alert-dismissable mb-0" ng-class="['alert-' + (type || 'warning'), closeable ? 'alert-dismissable' : null]" role="alert" ng-repeat="alert in alerts" type="danger" close="closeAlert($index)">
                            <button ng-show="closeable" type="button" class="close" ng-click="close()" aria-hidden="false">
                                <span aria-hidden="true">×</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <div ng-transclude=""><span class="ng-binding ng-scope">{{ session('error') }}</span></div>
                        </div>
                    @endif

                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{ route('settings.store') }}">
                                    @csrf
                                    <div class="form-group @error('nameSetting') has-error @enderror">
                                        <label for="nameSetting">Tên giá trị</label>
                                        <input type="text"
                                               class="form-control"
                                               id="nameSetting"
                                               placeholder="Nhập tên giá trị"
                                               value="{{ old('nameSetting') }}"
                                               name="nameSetting">
                                        @error('nameSetting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group @error('valueSetting') has-error @enderror">
                                        <label for="valueSetting">Giá trị</label>
                                        <input type="text"
                                               class="form-control"
                                               id="valueSetting"
                                               placeholder="Nhập giá trị"
                                               value="{{ old('valueSetting') }}"
                                               name="valueSetting">
                                        @error('valueSetting')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="0">Hoạt động</option>
                                            <option value="1">Ngừng hoạt động</option>
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
