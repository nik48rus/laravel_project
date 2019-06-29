<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class UInfo extends Controller
{
    public function index()
    {
    	$user = DB::table('users')->where('name', $_GET['name'])->first();
    	// $orders = DB::select('select * from `order`', [1]);
    	// $choice = DB::select('select * from `choice`', [1]);
        $comm = DB::select('select * from comments', [1]);
        return view('uinfo', ['user' => $user, 'comm' => $comm/*, 'orders' => $orders, 'choice' => $choice*/]);
    }

    public function comm()
    {
    	$user = DB::table('users');
        return view('comm', ['user' => $user]);
    }
}
