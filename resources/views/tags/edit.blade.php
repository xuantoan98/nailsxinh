<!-- Stored in resources/views/child.blade.php -->

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
                <div class="col">
                    <div class="bg-light lter b-b wrapper-md">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-uppercase">Cập nhật thông tin thẻ</h1>
                            </div>

                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('tags.index') }}" class="btn m-b-sm btn-sm btn-primary btnListTags pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách thẻ
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{ route('tags.update', ['id' => $data->id]) }}">
                                    @csrf
                                    <div class="form-group @error('nameTag') has-error @enderror">
                                        <label for="namePlace">Tên thẻ</label>
                                        <input type="text"
                                               class="form-control"
                                               id="nameTag"
                                               aria-describedby="tagHelp"
                                               placeholder="Nhập tên thẻ"
                                               name="nameTag"
                                               value="{{ $data->name }}">
                                        @error('nameTag')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="statusTag">Trạng thái</label>
                                        <select class="form-control" id="statusTag" name="statusTag">
                                            <option <?php echo $data->status == 0 ? 'selected' : ''; ?> value="0">Hoạt động</option>
                                            <option <?php echo $data->status == 1 ? 'selected' : ''; ?> value="1">Ngừng hoạt động</option>
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
