<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlacesController extends Controller
{
    private $places;

    public function __construct(Places $places)
    {
        $this->places = $places;
    }

    public function index()
    {
        $data = $this->places->latest()->paginate(5);
        return view('admin.places.index', compact('data'));
    }

    public function create()
    {
        return view('admin.places.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namePlace' => 'required|max:155',
            'phonePlace' => 'required|max:10|min:10',
            'addressPlace' => 'required'
        ], [
            'namePlace.required' => 'Tên cơ sở là bắt buộc',
            'namePlace.max' => 'Tên cơ sở không quá 155 ký tự',
            'phonePlace.required' => 'Số điện thoại là bắt buộc',
            'phonePlace.max' => 'Số điện thoại tối đa 10 ký tự',
            'phonePlace.min' => 'Số điện thoại tối thiểu 10 ký tự',
            'addressPlace.required' => 'Địa chỉ cơ sở là bắt buộc'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->namePlace;
        $phone = $request->phonePlace;
        $address = trim($request->addressPlace);
        $status = $request->statusPlace;

        $check = $this->places->create([
            'name' => $name,
            'phone_number' => $phone,
            'address' => $address,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('admin.places.index')->with('success', 'Thêm mới cơ sở thành công!');
        } else {
            return redirect()->back()->with('error', 'Thêm mới cơ sở thất bại!');
        }
    }

    public function edit($id)
    {
        $data = $this->places->find($id);
        return view('admin.places.edit', compact('data'));
    }

    public function update($id, Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'namePlace' => 'required|max:155',
            'phonePlace' => 'required|max:10|min:10',
            'addressPlace' => 'required'
        ], [
            'namePlace.required' => 'Tên cơ sở là bắt buộc',
            'namePlace.max' => 'Tên cơ sở không quá 155 ký tự',
            'phonePlace.required' => 'Số điện thoại là bắt buộc',
            'phonePlace.max' => 'Số điện thoại tối đa 10 ký tự',
            'phonePlace.min' => 'Số điện thoại tối thiểu 10 ký tự',
            'addressPlace.required' => 'Địa chỉ cơ sở là bắt buộc'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->namePlace;
        $phone = $request->phonePlace;
        $address = trim($request->addressPlace);
        $status = $request->statusPlace;

        $check = $this->places->find($id)->update([
            'name' => $name,
            'phone_number' => $phone,
            'address' => $address,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('admin.places.index')->with('success', 'Cập nhật cơ sở thành công!');
        } else {
            return redirect()->back()->with('error', 'Cập nhật cơ sở thất bại!');
        }
    }

    public function delete($id)
    {
        $check = $this->places->find($id)->delete();
        if($check){
            $msg = [
                'status' => 'success',
                'msg' => "Xóa cơ sở thành công!"
            ];
            return redirect()->route('admin.places.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa cơ sở thất bại!"
            ];
            return redirect()->route('admin.places.index');
        }
    }
}
