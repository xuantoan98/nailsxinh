<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;

    public function __construct(
        MenuRecusive $menuRecusive,
        Menu $menu
    )
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }

    public function index()
    {
        $data = $this->menu->where('status', 0)->latest()->paginate(5);
        if(empty($data)) {
            $data = [
                'name' => 'Default',
                'parent_id' => 0,
                'status' => 0
            ];
        }
        return view('admin.menus.index', compact('data'));
    }

    public function create()
    {
        $optionsSelect = $this->menuRecusive->menuRecusiveCreate();
        return view('admin.menus.add', compact('optionsSelect'));
    }

    public function store(Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'nameMenu' => 'required|max:50'
        ], [
            'nameMenu.required' => 'Tên menu là bắt buộc',
            'nameMenu.max' => 'Tên menu không quá 50 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameMenu;
        $parentID = $request->menuParent;

        $check = $this->menu->create([
            'name' => $name,
            'parent_id' => intval($parentID),
            'status' => 0,
            'slug' => Str::slug($name)
        ]);

        if($check) {
            return redirect()->route('admin.menus.index')->with('success', 'Thêm mới menu thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo menu!');
        }
    }

    public function recall($id)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Menu không tồn tại!');
        }

        $check = $this->menu->find($id)->update([
            'status' => 1
        ]);

        if($check) {
            return redirect()->route('admin.menus.index')->with('success', 'Thu hồi menu thành công!');
        } else {
            return redirect()->back()->with('error', 'Thu hồi menu thất bại!');
        }
    }

    public function listReCall()
    {
        $data = $this->menu->where('status', 1)->latest()->paginate(5);
        if(empty($data)) {
            $data = [
                'name' => 'Default',
                'parent_id' => 0,
                'status' => 0
            ];
        }
        return view('admin.menus.recall', compact('data'));
    }

    public function unRecall($id)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Menu không tồn tại!');
        }

        $check = $this->menu->find($id)->update([
            'status' => 0
        ]);

        if($check) {
            return redirect()->route('admin.menus.index')->with('success', 'Bỏ Thu hồi menu thành công!');
        } else {
            return redirect()->back()->with('error', 'Bỏ thu hồi menu thất bại!');
        }
    }

    public function edit($id)
    {
        $data = $this->menu->find($id);
        $optionsSelect = $this->menuRecusive->menuRecusiveEdit($data->parent_id);
        return view('admin.menus.edit', compact('data', 'optionsSelect'));
    }

    public function update($id, Request $request)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Menu không tồn tại!');
        }

        $validator = Validator::make($request->all(), [
            'nameMenu' => 'required|max:50'
        ], [
            'nameMenu.required' => 'Tên menu là bắt buộc',
            'nameMenu.max' => 'Tên menu không quá 50 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameMenu;
        $parentId = $request->menuParent;

        $check = $this->menu->find($id)->update([
            'name' => $name,
            'parent_id' => $parentId,
            'slug' => Str::slug($name)
        ]);

        if($check) {
            return redirect()->route('admin.menus.index')->with('success', 'Cập nhât menu thành công!');
        } else {
            return redirect()->back()->with('error', 'Cập nhật menu thất bại!');
        }
    }

    public function delete($id)
    {
        $delete = $this->menu->find($id)->delete();
        if($delete) {
            $msg = [
                'status' => 'succes',
                'msg' => "Xóa menu thành công!"
            ];
        }
        return redirect()->route('admin.menus.listReCall')->with($msg);
    }
}
