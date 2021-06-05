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
                        <h1 class="m-0 text-uppercase">Thêm mới cơ sở</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="post" action="{{route('places.store')}}">
                            <div class="form-group">
                                <label for="namePlace">Tên cơ sở</label>
                                <input type="text" class="form-control" id="namePlace" aria-describedby="placeHelp" placeholder="Nhập tên cơ sở" name="namePlace">
                            </div>
                            <div class="form-group">
                                <label for="addressPlace">Địa chỉ cơ sở</label>
                                <textarea class="form-control" id="addressPlace" rows="3" name="addressPlace"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="statusPlace">Trạng thái</label>
                                <select class="form-control" id="statusPlace" name="statusPlace">
                                    <option value="1">Hoạt động</option>
                                    <option value="0">Ngừng hoạt động</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

@endsection
