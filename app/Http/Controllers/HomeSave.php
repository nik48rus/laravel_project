<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class HomeSave extends Controller
{
    public function index()
    {
        /*$users = DB::select('select * from users', [1]);
        $comm = DB::select('select * from comments', [1]);
        return view('home', ['users' => $users, 'comm' => $comm]);*/
        //return $_GET['id'] . $_GET['age'] . $_GET['addr_co'] . $_GET['addr_ar'] . $_GET['addr_ci'];
        DB::update('update users set user_age = ' . $_GET['age'] . ', addr_country = "' . $_GET['addr_co'] . '", payeer = "' . $_GET['payeer'] . '", addr_city = "' . $_GET['addr_ci'] . '"  where `id` = ' . $_GET['id']);

        //return 'update users set user_age = ' . $_GET['age'] . ', addr_country = "' . $_GET['addr_co'] . '", addr_area = "' . $_GET['addr_ar'] . '", addr_city = "' . $_GET['addr_ci'] . '"  where `id` = ' . $_GET['id'];

        //$url = URL::to_action('HomeController@index');

        return redirect('home');

    }
}
