<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class Lists extends Controller
{
    public function cust()
    {
    	$user = DB::table('users');
        $comm = DB::select('SELECT `id`,`to_u`,`rate` FROM `comments` ORDER BY `to_u`,`rate` DESC', [1]);
        return view('listcust', ['user' => $user, 'comm' => $comm]);
    }

    public function exec()
    {
    	$user = DB::table('users');
        $comm = DB::select('select * from comments', [1]);
        return view('listexec', ['user' => $user, 'comm' => $comm]);
    }
}
