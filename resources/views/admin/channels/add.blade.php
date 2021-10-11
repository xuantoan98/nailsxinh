<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Channel Page</title>
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
                                <h1 class="m-0 text-uppercase">Thêm mới kênh</h1>
                            </div>

                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('channels.index') }}" class="btn m-b-sm btn-sm btn-primary btnListChannels pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách kênh
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{ route('channels.store') }}">
                                    @csrf
                                    <div class="form-group @error('nameChannel') has-error @enderror">
                                        <label for="nameChannel">Tên nguồn</label>
                                        <input type="text"
                                               class="form-control"
                                               id="nameChannel"
                                               aria-describedby="channelsHelp"
                                               placeholder="Nhập tên kênh"
                                               name="nameChannel"
                                               value="{{ old('nameChannel') }}">
                                        @error('nameChannel')
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
