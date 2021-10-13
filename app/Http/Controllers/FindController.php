<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;



class FindController extends BaseController
{
    use AuthenticatesUsers;

    

    function find(Request $request)
    {
        $phone = $request->input('phone'); //ajax에서 넘긴 data(phone)

        $result = DB::table('users')->where('phone'); //result값 json형태로 가공필요


        if($result) {
            echo "test";
        } else {
            echo "test2";
        }

        return $result;
    }
    



}