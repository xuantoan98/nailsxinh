<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    private $setting;

    public function __construct(Settings $setting)
    {
        $this->setting = $setting;
    }

    public function index()
    {
        $data = $this->setting->latest()->paginate(5);
        return view('admin.settings.index', compact('data'));
    }

    public function create()
    {
        return view('admin.settings.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameSetting' => 'required|max:100',
            'valueSetting' => 'required|max:155'
        ], [
            'nameSetting.required' => 'Tên giá trị là bắt buộc',
            'nameSetting.max' => 'Tên giá trị không quá 100 ký tự',
            'valueSetting.required' => 'Giá trị là bắt buộc',
            'valueSetting.max' => 'Giá trị không quá 155 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameSetting;
        $identification = Str::slug($request->nameSetting);
        $value = $request->valueSetting;
        $status = $request->status;

        // check identification
        $checkDuplicate = DB::table('settings')->where('identification', $identification)->get();
        if($checkDuplicate->isEmpty() != 1) {
            return redirect()->back()->with('error', 'Cài đặt này đã tồn tại trong hệ thống!');
        }

        $check = $this->setting->create([
            'name' => $name,
            'identification' => $identification,
            'value' => $value,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('admin.settings.index')->with('success', 'Thêm mới giá trị thành công!');
        } else {
            return redirect()->back()->with('error', 'Thêm mới giá trị thất bại!');
        }
    }

    public function edit($id)
    {
        $id = _decode($id);
        $data = $this->setting->find($id);
        return view('admin.settings.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $id = _decode($id);
        $name = $request->nameSetting;
        $identification = Str::slug($request->nameSetting);
        $value = $request->valueSetting;
        $status = $request->status;

        if(empty($name) || empty($identification) || empty($value)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('admin.settings.store');
        }

        // check identification

        $check = $this->setting->find($id)->update([
            'name' => $name,
            'identification' => $identification,
            'value' => $value,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Cập nhật giá trị thành công!"
            ];
            return redirect()->route('admin.settings.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật giá trị thất bại!"
            ];
            return redirect()->route('admin.settings.index');
        }
    }

    public function delete($id)
    {
        $id = _decode($id);
        $check = $this->setting->find($id)->delete();
        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Xóa giá trị thành công!"
            ];
            return redirect()->route('admin.settings.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa giá trị thất bại!"
            ];
            return redirect()->route('admin.settings.index');
        }
    }

}
