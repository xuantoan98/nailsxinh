<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChannelsController extends Controller
{
    private $channel;

    public function __construct(Channels $channel)
    {
        $this->channel = $channel;
    }

    public function index()
    {
        $data = $this->channel->latest()->paginate(5);
        return view('channels.index', compact('data'));
    }

    public function create()
    {
        return view('channels.add');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameChannel' => 'required|max:155'
        ], [
            'nameChannel.required' => 'Tên kênh là bắt buộc',
            'nameChannel.max' => 'Tên kênh không quá 155 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameChannel;
        $status = $request->status;

        $check = $this->channel->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('channels.index')->with('success', 'Thêm mới kênh thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo kênh!');
        }
    }

    public function edit($id)
    {
        $data = $this->channel->find($id);
        return view('channels.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameChannel' => 'required|max:155'
        ], [
            'nameChannel.required' => 'Tên kênh là bắt buộc',
            'nameChannel.max' => 'Tên kênh không quá 155 ký tự'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name = $request->nameChannel;
        $status = $request->status;

        $check = $this->channel->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            return redirect()->route('channels.index')->with('success', 'Cập nhật thông tin kênh thành công!');
        } else {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật thông tin kênh!');
        }
    }

    public function delete($id)
    {
        $check = $this->channel->find($id)->delete();
        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Xóa kênh thành công!"
            ];
            return redirect()->route('channels.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Xóa kênh thất bại!"
            ];
            return redirect()->route('channels.index');
        }
    }
}
