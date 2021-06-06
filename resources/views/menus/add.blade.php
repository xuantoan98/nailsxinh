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
                        <h1 class="m-0 text-uppercase">Thêm mới Menu</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="post" action="{{route('menus.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nameMenu">Tên menu</label>
                                <input type="text" class="form-control" id="nameMenu" aria-describedby="placeHelp" placeholder="Nhập tên menu" name="nameMenu">
                            </div>

                            <div class="form-group">
                                <label for="menuParent">Menu cha</label>
                                <select class="form-control" id="menuParent" name="menuParent">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionsSelect !!}}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
