<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class Confirm extends Controller
{
    public function index()
    {
        $users = DB::table('users');
        return view('confirm', ['users' => $users]);
        /*
        $users = DB::select('select * from users', [1]);
        $comm = DB::select('select * from comments', [1]);
        return view('home', ['users' => $users, 'comm' => $comm]);
        */
    }
}
