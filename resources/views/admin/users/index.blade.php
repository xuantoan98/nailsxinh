<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>User Page</title>
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
                                <h1 class="m-0 text-uppercase">Danh sách nhân viên</h1>
                            </div>
                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('settings.create') }}" class="btn m-b-sm btn-sm btn-primary btnAddSetting pull-right m-l btn-addon">
                                    <i class="fa fa-plus"></i> Thêm mới nhân viên
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- / main header -->
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Tên nhân viên</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số điện thoại</th>
                                        <th scope="col">Sinh nhật</th>
                                        <th scope="col">Địa chỉ</th>
                                        <th scope="col">Mật khẩu</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Quyền</th>
                                        <th scope="col">Cơ sở</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) != 0)
                                        @foreach($data as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->avatar }}</td>
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone_number }}</td>
                                                <td>{{ $item->birthday }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>{{ $item->password }}</td>
                                                <td>
                                                    <label class="i-switch bg-info m-t-xs m-r">
                                                        @if(intval($item->status) == 0)
                                                            <input class="publicUser" id="{{ $item->id }}" type="checkbox" checked />
                                                            <i></i>
                                                        @else
                                                            <input class="publicUser" id="{{ $item->id }}" type="checkbox" />
                                                            <i></i>
                                                        @endif
                                                    </label>
                                                </td>
                                                <td>{{ $item->role->name }}</td>
                                                <td>{{ $item->place->name }}</td>
                                                <td>
                                                    <a href="{{ route('tags.edit', ['id' => $item->id]) }}" class="text-primary m-t-xs update">
                                                        <i class="glyphicon glyphicon-pencil"></i> Sửa
                                                    </a>
                                                    <a href="{{ route('tags.delete', ['id' => $item->id]) }}" class="text-danger m-t-xs delete ms-3">
                                                        <i class="glyphicon glyphicon-trash"></i> Xóa
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td rowspan="4" class="empty-data">Không có bản ghi nào phù hợp.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
