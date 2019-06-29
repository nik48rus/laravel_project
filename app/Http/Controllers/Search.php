<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class Search extends Controller
{
    public function order()
    {
    	$users = DB::table('users');
    	$orders = DB::select('select * from `order`', [1]);
        return view('order', ['users' => $users, 'orders' => $orders]);
        /*
        $users = DB::select('select * from users', [1]);
        $comm = DB::select('select * from comments', [1]);
        return view('home', ['users' => $users, 'comm' => $comm]);
        */
    }

    public function orderdel()
    {
        $users = DB::table('users');
        return view('deliver', ['users' => $users]);
        /*
        $users = DB::select('select * from users', [1]);
        $comm = DB::select('select * from comments', [1]);
        return view('home', ['users' => $users, 'comm' => $comm]);
        */
    }
}
