<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Tags Page</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-uppercase">Thêm mới thẻ</h1>
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
                        <form method="post" action="{{ route('tags.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="namePlace">Tên thẻ</label>
                                <input type="text"
                                       class="form-control"
                                       id="nameTag"
                                       aria-describedby="tagHelp"
                                       placeholder="Nhập tên thẻ"
                                       name="nameTag">
                            </div>

                            <div class="form-group">
                                <label for="statusTag">Trạng thái</label>
                                <select class="form-control" id="statusTag" name="statusTag">
                                    <option value="0">Hoạt động</option>
                                    <option value="1">Ngừng hoạt động</option>
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
