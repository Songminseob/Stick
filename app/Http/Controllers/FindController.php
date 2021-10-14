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
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;



class FindController extends BaseController
{
    use AuthenticatesUsers;

    function find(Request $request)
    {
        if($request->input('phone')){
            $pdata = $request->input('phone');
            $pphone = DB::table('users')->where('phone', $pdata)->get();

            if($pphone->count()<1){
                return response() -> json(null,422);
            }
            else{
                return response() -> json($pphone);
            }
        }
        else{
            $edata = $request->input('email');
            $pemail = DB::table('users')->where('email', $edata)->get();
            if($pemail->count()<1){
                return response() -> json(null,423);
            }
            else{
                return response() -> json($pemail);
            }
        }
    }

    function suid(Request $request)
    {
        if($request->input('phone')){
            $pdata = $request->input('phone');
            $pphone = DB::table('users')->where('phone', $pdata)->get(); 

            return view("front.successid",[
                'user' => $pphone
            ]);
        }
        else{
            $edata = $request->input('email');
            $pemail = DB::table('users')->where('email', $edata)->get();

            return view("front.successid",[
                'user' => $pemail
            ]);
        }
    }

    function supw(Request $request)
    {
        if($request->input('phone')){
            $pdata = $request->input('phone');
            $pphone = DB::table('users')->where('phone', $pdata)->get(); 

            return view("front.successpw",[
                'user' => $pphone
            ]);
        }
        else{
            $edata = $request->input('email');
            $pemail = DB::table('users')->where('email', $edata)->get();

            return view("front.successpw",[
                'user' => $pemail
            ]);
        }
    }


}