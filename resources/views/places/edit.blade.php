<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Place Page</title>
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
                                <h1 class="m-0 text-uppercase">Cập nhật thông tin cở sở</h1>
                            </div>

                            <div class="col-sm-6" style="float: right; text-align: right;">
                                <a href="{{ route('places.index') }}" class="btn m-b-sm btn-sm btn-primary btnListPlaces pull-right m-l btn-addon">
                                    <i class="fa fa-list"></i> Danh sách cơ sở
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                        <div class="row">
                            <div class="col-lg-6">
                                <form method="post" action="{{ route('places.update', ['id' => $data->id]) }}">
                                    @csrf
                                    <div class="form-group @error('namePlace') has-error @enderror">
                                        <label for="namePlace">Tên cơ sở</label>
                                        <input type="text"
                                               class="form-control"
                                               id="namePlace"
                                               aria-describedby="placeHelp"
                                               placeholder="Nhập tên cơ sở"
                                               name="namePlace"
                                               value="{{ $data->name }}"
                                        >
                                        @error('namePlace')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group @error('phonePlace') has-error @enderror">
                                        <label for="phonePlace">Số điện thoại cơ sở</label>
                                        <input type="text"
                                               class="form-control"
                                               id="phonePlace"
                                               aria-describedby="phonePlace"
                                               placeholder="Nhập số điện thoại cơ sở"
                                               name="phonePlace"
                                               value="{{ $data->phone_number }}"
                                        >
                                        @error('phonePlace')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group @error('addressPlace') has-error @enderror">
                                        <label for="addressPlace">Địa chỉ cơ sở</label>
                                        <textarea class="form-control"
                                                  id="addressPlace"
                                                  rows="3"
                                                  name="addressPlace">
                                    {{ $data->address }}</textarea>
                                        @error('addressPlace')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="statusPlace">Trạng thái</label>
                                        <select class="form-control" id="statusPlace" name="statusPlace">
                                            <option <?php echo $data->status == 1 ? 'selected' : ''; ?> value="1">Hoạt động</option>
                                            <option <?php echo $data->status == 0 ? 'selected' : ''; ?> value="0">Ngừng hoạt động</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                </form>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
