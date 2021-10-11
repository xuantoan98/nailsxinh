<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesServices;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoriesServicesController extends Controller
{
    private $categoriesServices;

    public function __construct(CategoriesServices  $categoriesServices)
    {
        $this->categoriesServices = $categoriesServices;
    }

    public function index()
    {
        $categoriesServices = $this->categoriesServices->latest()->paginate(5);

        return view('admin.categoriesServices.index', compact('categoriesServices'));
    }

    public function create()
    {
        $htmlOptions = $this->getCategoriesServices($parentId = '');
        return view('admin.categoriesServices.add', compact('htmlOptions'));
    }

    public function store(Request $request)
    {
        $msg = '';
        $name = $request->nameCateServices;
        $parent_id = $request->cateParent;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('admin.categoriesServices.store');
        }
        $check = $this->categoriesServices->create([
            'name' => $name,
            'parent_id' => $parent_id,
            'slug' => Str::slug($name, '-')
        ]);

        if($check) {
            $msg = [
                'status' => 'succes',
                'msg' => "Thêm mới danh mục thành công!"
            ];

            return redirect()->route('admin.categoriesServices.index')->with($msg);

//            return redirect()->route('categoriesServices.index', compact('msg'));
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới danh mục thất bại!"
            ];
            return redirect()->route('admin.categoriesServices.index', compact('msg'));
        }
    }

    public function getCategoriesServices($parentId)
    {
        $data = $this->categoriesServices->all();
        $recusive = new Recusive($data);
        $htmlOptions = $recusive->categoriesRecusive($parentId);
        return $htmlOptions;
    }

    public function edit($id)
    {
        $categories = $this->categoriesServices->find($id);
        $htmlOptions = $this->getCategoriesServices($categories->parent_id);

        return view('admin.categoriesServices.edit', compact('categories', 'htmlOptions'));
    }

    public function update($id, Request $request)
    {
        $name = $request->nameCateServices;
        $parent_id = $request->cateParent;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('admin.categoriesServices.store');
        }

        $categoriesServices = $this->categoriesServices->find($id)->update([
            'name' => $name,
            'parent_id' => $parent_id,
            'slug' => Str::slug($name, '-')
        ]);

        if($categoriesServices) {
            $msg = [
                'status' => 'succes',
                'msg' => "Thêm mới danh mục thành công!"
            ];

            return redirect()->route('admin.categoriesServices.index')->with($msg);
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới danh mục thất bại!"
            ];

            return redirect()->route('admin.categoriesServices.index')->with($msg);
        }
    }

    public function delete($id)
    {
        $delete = $this->categoriesServices->find($id)->delete();
        if($delete) {
            $msg = [
                'status' => 'succes',
                'msg' => "Xóa danh mục thành công!"
            ];
        }
        return redirect()->route('admin.categoriesServices.index')->with($msg);
    }
}
