<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Sources Page</title>
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
                                <h1 class="m-0 text-uppercase">Thêm mới nguồn</h1>
                            </div>

                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('sources.index') }}" class="btn m-b-sm btn-sm btn-primary btnListSources pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách nguồn
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{ route('sources.store') }}">
                                    @csrf
                                    <div class="form-group @error('nameSource') has-error @enderror">
                                        <label for="nameSource">Tên nguồn</label>
                                        <input type="text"
                                               class="form-control"
                                               id="nameSource"
                                               aria-describedby="sourcesHelp"
                                               placeholder="Nhập tên nguồn"
                                               value="{{ old('nameSource') }}"
                                               name="nameSource">

                                        @error('nameSource')
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
