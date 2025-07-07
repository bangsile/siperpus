<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.index');
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function edit($username){
        return view('pages.user.edit', compact('username'));
    }

    public function profileSetting()
    {
        return view('pages.setting.profile');
    }

    public function passwordSetting()
    {
        return view('pages.setting.password');
    }
}
