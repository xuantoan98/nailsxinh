<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagsController extends Controller
{

    private $tag;

    public function __construct(Tags $tag)
    {
        $this->tag = $tag;
    }

    public function index()
    {
        $data = $this->tag->latest()->paginate(10);
        return view('tags.index', compact('data'));
    }

    public function create()
    {
        return view('tags.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameTag' => 'required|max:100'
        ], [
            'nameTag.required' => 'Tên thẻ là bắt buộc',
            'nameTag.max' => 'Tên thẻ không quá 100 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameTag;
        $status =  $request->statusTag;

        $check = $this->tag->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('tags.index')->with('success', 'Thêm mới thẻ thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo thẻ!');
        }
    }

    public function edit($id)
    {
        $data = $this->tag->find($id);

        return view('tags.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameTag' => 'required|max:100'
        ], [
            'nameTag.required' => 'Tên thẻ là bắt buộc',
            'nameTag.max' => 'Tên thẻ không quá 100 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = trim($request->nameTag);
        $status = $request->statusTag;

        $check = $this->tag->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('tags.index')->with('success', 'Cập nhật thông tin thẻ thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật thông tin thẻ!');
        }
    }

    public function delete($id)
    {
        $check = $this->tag->find($id)->delete();
        if($check){
            $msg = [
                'status' => 'success',
                'msg' => "Xóa thẻ thành công!"
            ];
            return redirect()->route('tags.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa thẻ thất bại!"
            ];
            return redirect()->route('tags.index');
        }
    }
}
