<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourcesController extends Controller
{
    private $source;

    public function __construct(Source $source)
    {
        $this->source = $source;
    }

    public function index()
    {
        $data = $this->source->latest()->paginate(5);
        return view('sources.index', compact('data'));
    }

    public function create()
    {
        return view('sources.add');
    }

    public function store(Request $request)
    {
        $name = $request->nameSource;
        $status = $request->status;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('sources.store');
        }

        $check = $this->source->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Thêm mới nguồn thành công!"
            ];
            return redirect()->route('sources.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới nguồn thất bại!"
            ];
            return redirect()->route('sources.store');
        }
    }

    public function edit($id)
    {
        $data = $this->source->find($id);
        return view('sources.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $name = $request->nameSource;
        $status = $request->status;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('sources.store');
        }

        $check = $this->source->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Cập nhật thông tin thành công!"
            ];
            return redirect()->route('sources.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật thông tin thất bại!"
            ];
            return redirect()->route('sources.store');
        }
    }

    public function delete($id)
    {
        $check = $this->source->find($id)->delete();
        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Xóa nguồn thành công!"
            ];
            return redirect()->route('sources.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa nguồn thất bại!"
            ];
            return redirect()->route('sources.index');
        }
    }


}
