<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class MOrders extends Controller
{
    public function index()
    {
    	$users = DB::table('users');
    	$orders = DB::select('select * from `order`', [1]);
    	$choice = DB::select('select * from `choice`', [1]);
        return view('morders', ['users' => $users, 'orders' => $orders, 'choice' => $choice]);
    }

    public function info()
    {
    	$users = DB::table('users');
    	$orders = DB::select('select * from `order`', [1]);
    	$choice = DB::select('select * from `choice`', [1]);
        return view('mordersinf', ['users' => $users, 'orders' => $orders, 'choice' => $choice]);
    }
}
