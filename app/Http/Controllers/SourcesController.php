<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nameSource' => 'required|max:155'
        ], [
            'nameSource.required' => 'Tên nguồn là bắt buộc',
            'nameSource.max' => 'Tên nguồn không quá 155 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameSource;
        $status = $request->status;

        $check = $this->source->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('sources.index')->with('success', 'Thêm mới nguồn thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm mới thông tin nguồn!');
        }
    }

    public function edit($id)
    {
        $data = $this->source->find($id);
        return view('sources.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameSource' => 'required|max:155'
        ], [
            'nameSource.required' => 'Tên nguồn là bắt buộc',
            'nameSource.max' => 'Tên nguồn không quá 155 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameSource;
        $status = $request->status;

        $check = $this->source->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('sources.index')->with('success', 'Cập nhật thông tin nguồn thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật thông tin nguồn!');
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
