<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;

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
        $name = $request->nameTag;
        $status =  $request->statusTag;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('tags.store');
        }

        $check = $this->tag->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Thêm mới thẻ thành công!"
            ];
            return redirect()->route('tags.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới thẻ thất bại!"
            ];
            return redirect()->route('tags.store');
        }
    }

    public function edit($id)
    {
        $data = $this->tag->find($id);

        return view('tags.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $name = trim($request->nameTag);
        $status = $request->statusTag;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('tags.store');
        }

        $check = $this->tag->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Cập nhật thông tin thẻ thành công!"
            ];
            return redirect()->route('tags.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật thông tin thẻ thất bại!"
            ];
            return redirect()->route('tags.store');
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
