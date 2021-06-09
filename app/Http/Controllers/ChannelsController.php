<?php

namespace App\Http\Controllers;

use App\Models\Channels;
use Illuminate\Http\Request;

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
        $name = $request->nameChannel;
        $status = $request->status;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('channels.store');
        }

        $check = $this->channel->create([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Thêm mới kênh thành công!"
            ];
            return redirect()->route('channels.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Thêm mới kênh thất bại!"
            ];
            return redirect()->route('channels.store');
        }
    }

    public function edit($id)
    {
        $data = $this->channel->find($id);
        return view('channels.edit', compact('data'));
    }

    public function update($id, Request $request)
    {
        $name = $request->nameChannel;
        $status = $request->status;

        if(empty($name)) {
            $msg = [
                'status' => 'error',
                'msg' => "Thông tin không hợp lệ!"
            ];
            return redirect()->route('channels.store');
        }

        $check = $this->channel->find($id)->update([
            'name' => $name,
            'status' => $status
        ]);

        if($check) {
            $msg = [
                'status' => 'success',
                'msg' => "Cập nhật thông tin thành công!"
            ];
            return redirect()->route('channels.index');
        } else {
            $msg = [
                'status' => 'error',
                'msg' => "Cập nhật thông tin thất bại!"
            ];
            return redirect()->route('channels.store');
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
