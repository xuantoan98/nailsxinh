<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Http\Request;
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
        return view('menus.index', compact('data'));
    }

    public function create()
    {
        $optionsSelect = $this->menuRecusive->menuRecusiveCreate();
        return view('menus.add', compact('optionsSelect'));
    }

    public function store(Request  $request)
    {
        $name = $request->nameMenu;
        $parentID = $request->menuParent;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('menus.store');
        }

        $check = $this->menu->create([
            'name' => $name,
            'parent_id' => intval($parentID),
            'status' => 0,
            'slug' => Str::slug($name)
        ]);

        if($check) {
            $msg = [
                'status' => 'succes',
                'msg' => "Thêm mới menu thành công!"
            ];

            return redirect()->route('menus.index')->with($msg);
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới menu thất bại!"
            ];

            return redirect()->route('menus.index')->with($msg);
        }
    }

    public function recall($id)
    {
        $check = $this->menu->find($id)->update([
            'status' => 1
        ]);

        if($check) {
            $msg = [
                'status' => 'succes',
                'msg' => "Thu hồi menu thành công!"
            ];

            return redirect()->route('menus.index')->with($msg);
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thu hồi menu thất bại!"
            ];

            return redirect()->route('menus.index')->with($msg);
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
        return view('menus.recall', compact('data'));
    }

    public function unRecall($id)
    {
        $check = $this->menu->find($id)->update([
            'status' => 0
        ]);

        if($check) {
            $msg = [
                'status' => 'succes',
                'msg' => "Bỏ Thu hồi menu thành công!"
            ];

            return redirect()->route('menus.index')->with($msg);
        } else {
            $msg = [
                'status' => 'error',
                'msg' => " Bỏ thu hồi menu thất bại!"
            ];

            return redirect()->route('menus.index')->with($msg);
        }
    }

    public function edit($id)
    {
        $data = $this->menu->find($id);
        $optionsSelect = $this->menuRecusive->menuRecusiveEdit($data->parent_id);
        return view('menus.edit', compact('data', 'optionsSelect'));
    }

    public function update($id, Request $request)
    {
        $name = $request->nameMenu;
        $parentId = $request->menuParent;

        $check = $this->menu->find($id)->update([
            'name' => $name,
            'parent_id' => $parentId,
            'slug' => Str::slug($name)
        ]);

        if($check) {
            $msg = [
                'status' => 'succes',
                'msg' => "Cập nhât menu thành công!"
            ];

            return redirect()->route('menus.index')->with($msg);
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật menu thất bại!"
            ];

            return redirect()->route('menus.index')->with($msg);
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
        return redirect()->route('menus.listReCall')->with($msg);
    }
}
