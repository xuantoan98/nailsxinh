<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
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
        return view('settings.index', compact('data'));
    }

    public function create()
    {
        return view('settings.add');
    }

    public function store(Request $request)
    {
        $name = $request->nameSetting;
        $identification = Str::slug($request->nameSetting);
        $value = $request->valueSetting;
        $status = $request->status;

        if(empty($name) || empty($identification) || empty($value)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('settings.store');
        }

        // check identification

        $check = $this->setting->create([
            'name' => $name,
            'identification' => $identification,
            'value' => $value,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Thêm mới giá trị thành công!"
            ];
            return redirect()->route('settings.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới giá trị thất bại!"
            ];
            return redirect()->route('settings.index');
        }
    }

    public function edit($id)
    {
        $id = _decode($id);
        $data = $this->setting->find($id);
        return view('settings.edit', compact('data'));
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
            return redirect()->route('settings.store');
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
            return redirect()->route('settings.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật giá trị thất bại!"
            ];
            return redirect()->route('settings.index');
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
            return redirect()->route('settings.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa giá trị thất bại!"
            ];
            return redirect()->route('settings.index');
        }
    }

}
