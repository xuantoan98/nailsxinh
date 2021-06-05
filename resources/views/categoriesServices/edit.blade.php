@extends('layouts.admin')

@section('title')
    <title>Danh mục dịch vụ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-uppercase">Cập nhật danh mục</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="post" action="{{route('categoriesServices.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="nameCateServices">Tên danh mục</label>
                                <input type="text" class="form-control" value="{{ $categories->name }}" id="nameCateServices" aria-describedby="placeHelp" placeholder="Nhập tên danh mục" name="nameCateServices">
                            </div>

                            <div class="form-group">
                                <label for="cateParent">Danh mục cha</label>
                                <select class="form-control" id="cateParent" name="cateParent">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOptions !!}
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
