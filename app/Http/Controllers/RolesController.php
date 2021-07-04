<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    private $roles;
    public function __construct(Roles $roles)
    {
        $this->roles = $roles;
    }

    public function index()
    {
        $data = $this->roles->latest()->paginate(5);
        return view('roles.index', compact('data'));
    }

    public function create()
    {
        return view('roles.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameRole' => 'required|max:155'
        ], [
            'nameRole.required' => 'Tên kênh là bắt buộc',
            'nameRole.max' => 'Tên kênh không quá 155 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameRole;
        $status = $request->status;

        $check = $this->roles->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('roles.index')->with('success', 'Thêm mới quyền thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo kênh!');
        }

    }

    public function edit($id)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Quyền không tồn tại!');
        }

        $id = _decode($id);
        $data = $this->roles->find($id);

        return view('roles.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Quyền không tồn tại!');
        }

        $id = _decode($id);
        $name = $request->nameRole;
        $status = $request->status;

        $check = $this->roles->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('roles.index')->with('success', 'Cập nhật thông tin quyền thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo quyền!');
        }
    }

    public function delete($id)
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Quyền không tồn tại!');
        }

        $id = _decode($id);
        $check = $this->roles->find($id)->delete();
        if($check) {
            return redirect()->route('roles.index')->with('success', 'Xóa quyền thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa quyền!');
        }
    }


}
