<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        //dbに登録する処理
        return view('login');
    }

    public function register(Request $request)
    {
        //dbに登録する処理
        $auth = $request->all();
        User::create($auth);
        return view('login');
    }
}
