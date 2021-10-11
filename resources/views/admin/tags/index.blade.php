@extends('layouts.admin')

@section('title')
    <title>Tags Page</title>
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
                                <h1 class="m-0 text-uppercase">Danh sách thẻ</h1>
                            </div>
                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('tags.create') }}" class="btn m-b-sm btn-sm btn-primary btnAddTags pull-right m-l btn-addon">
                                    <i class="fa fa-plus"></i> Thêm mới thẻ
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- / main header -->

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
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tên thẻ</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($data) != 0)
                                        @foreach($data as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <label class="i-switch bg-info m-t-xs m-r">
                                                        @if(intval($item->status) == 0)
                                                            <input class="publicTags" id="{{ $item->id }}" type="checkbox" checked />
                                                            <i></i>
                                                        @else
                                                            <input class="publicTags" id="{{ $item->id }}" type="checkbox" />
                                                            <i></i>
                                                        @endif
                                                    </label>
                                                </td>
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

                            <div class="col-md-12">
                                {{ $data->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
