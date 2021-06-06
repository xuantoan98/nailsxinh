@extends('layouts.admin')

@section('title')
    <title>Menus Page</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-uppercase">Quản lý Menu</h1>
                    </div>
                    <div class="col-sm-6" style="float: right; text-align: right;">
                        <a href="{{ route('menus.create') }}" class="btn m-b-sm btn-sm btn-success btnAddMenu pull-right m-l btn-addon">
                            <i class="fa fa-plus mr-1"></i> Thêm mới Menu
                        </a>

                        <a href="{{ route('menus.listReCall') }}" class="btn m-b-sm btn-sm btn-danger btnReCallMenu pull-right m-l btn-addon">
                            <i class="fa fa-backward mr-1"></i> Menu thu hồi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <!-- Alert Notification -->
        {{--        <div class="container-fuild">--}}
        {{--            <div class="row" style="display: block">--}}
        {{--                <div class="col-lg-6">--}}
        {{--                    <div class="alert alert-success alert-dismissible">--}}
        {{--                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
        {{--                        <h5><i class="icon fas fa-check"></i> Alert!</h5>--}}
        {{--                        Success alert preview. This alert is dismissable.--}}
        {{--                    </div>--}}
        {{--                </div>--}}

        {{--                <div class="col-lg-6">--}}
        {{--                    <div class="alert alert-danger alert-dismissible">--}}
        {{--                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
        {{--                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>--}}
        {{--                        Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my--}}
        {{--                        entire--}}
        {{--                        soul, like these sweet mornings of spring which I enjoy with my whole heart.--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- /.Alert Notification -->

            <div class="container-fluid">
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

                            @foreach($data as $item)

                            <tr>
                                <th scope="row">{{ $item->id  }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('menus.edit', ['id' => $item->id]) }}" class="text-primary mr-3">Cập nhật</a>
                                    <a href="{{ route('menus.recall', ['id' => $item->id]) }}" class="text-danger">Thu hồi</a>
                                </td>
                            </tr>

                            @endforeach

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

@endsection
