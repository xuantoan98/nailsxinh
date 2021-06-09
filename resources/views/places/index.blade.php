<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
<title>Place Page</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-uppercase">Danh sách Cở sở</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="float: right; text-align: right;">
                    <a href="{{ route('places.create') }}" class="btn m-b-sm btn-sm btn-success btnAddPlaces pull-right m-l btn-addon">
                        <i class="fa fa-plus"></i> Thêm mới cơ sở
                    </a>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên cơ sở</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
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
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="{{ route('places.edit', ['id' => $item->id]) }}" class="text-primary mr-3">Cập nhật</a>
                                        <a href="{{ route('places.delete', ['id' => $item->id]) }}" class="text-danger">Xóa</a>
                                    </td>
                                  </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="empty-data">Không có bản ghi phù hợp.</td>
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

@endsection
