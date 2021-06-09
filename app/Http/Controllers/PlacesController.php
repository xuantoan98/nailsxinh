<?php

namespace App\Http\Controllers;

use App\Models\Places;
use Illuminate\Http\Request;

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
        return view('places.index', compact('data'));
    }

    public function create()
    {
        return view('places.add');
    }

    public function store(Request $request)
    {
        $name = $request->namePlace;
        $phone = $request->phonePlace;
        $address = trim($request->addressPlace);
        $status = $request->statusPlace;

        if(empty($name) && empty($phone) && empty($address)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('places.store');
        }

        $check = $this->places->create([
            'name' => $name,
            'phone_number' => $phone,
            'address' => $address,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Thêm mới cơ sở thành công!"
            ];
            return redirect()->route('places.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới cơ sở thất bại!"
            ];
            return redirect()->route('places.store');
        }
    }

    public function edit($id)
    {
        $data = $this->places->find($id);
        return view('places.edit', compact('data'));
    }

    public function update($id, Request  $request)
    {
        $name = $request->namePlace;
        $phone = $request->phonePlace;
        $address = trim($request->addressPlace);
        $status = $request->statusPlace;

        if(empty($name) && empty($phone) && empty($address)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('places.store');
        }

        $check = $this->places->find($id)->update([
            'name' => $name,
            'phone_number' => $phone,
            'address' => $address,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Cập nhật cơ sở thành công!"
            ];
            return redirect()->route('places.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật cơ sở thất bại!"
            ];
            return redirect()->route('places.store');
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
            return redirect()->route('places.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa cơ sở thất bại!"
            ];
            return redirect()->route('places.index');
        }
    }
}
