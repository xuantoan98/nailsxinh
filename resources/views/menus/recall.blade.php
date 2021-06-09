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
                                <h2 class="m-0 text-uppercase">Menu thu hồi</h2>
                            </div>
                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('menus.create') }}" class="btn m-b-sm btn-sm btn-success btnAddMenu pull-right m-l btn-addon">
                                    <i class="fa fa-plus mr-1"></i> Thêm mới Menu
                                </a>

                                <a href="{{ route('menus.listReCall') }}" class="btn m-b-sm btn-sm btn-danger btnReCallMenu pull-right m-l btn-addon">
                                    <i class="fa fa-backward mr-1"></i> Menu thu hồi
                                </a>

                                <a href="{{ route('menus.index') }}" class="btn m-b-sm btn-sm btn-primary btnListMenu pull-right m-l btn-addon">
                                    <i class="fa fa-plus mr-1"></i> Danh sách Menu
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
                                        <th scope="col">Tên menu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(count($data) != 0)
                                        @foreach($data as $item)

                                            <tr>
                                                <th scope="row">{{ $item->id  }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <a href="{{ route('menus.unRecall', ['id' => $item->id]) }}" class="text-primary m-t-xs unReCall">
                                                        <i class="glyphicon glyphicon-pencil"></i> Bỏ thu hồi
                                                    </a>

                                                    <a href="{{ route('menus.delete', ['id' => $item->id]) }}" class="text-danger m-t-xs delete ms-3">
                                                        <i class="glyphicon glyphicon-trash"></i> Xóa
                                                    </a>
                                                </td>
                                            </tr>

                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" class="empty-data">Không có bản ghi nào phù hợp.</td>
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
                <!-- / main -->
            </div>
        </div>
    </div>

@endsection
