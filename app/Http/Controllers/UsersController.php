<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $user;

    public function __construct(Users $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $data = $this->user->latest()->paginate(10);
        return view('admin.users.index', compact('data'));
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function store(Request $request)
    {
        _debug("action store");
        die;
    }

    public function edit($id)
    {
        _debug("action edit");
        die;
    }

    public function update($id, Request $request)
    {
        _debug("action update");
        die;
    }
}
