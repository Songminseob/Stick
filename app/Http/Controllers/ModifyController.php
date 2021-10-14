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
use Illuminate\Support\Facades\Hash;

class ModifyController extends BaseController
{
    use AuthenticatesUsers;
    public $session;
    public $isLogin = false;
    public $user;

    function modifypw(Request $request)
    {
        $pname = $request -> input("pname");
        
        $pw = $request -> input("password1");

        if (Hash::needsRehash($pw)) //해쉬 암호 재설정
        {
            $pw = Hash::make($pw);
        }

        DB::table('users')->where('name', $pname)->update(['password'=>$pw]);

        return view("front.index", [ 
            'isLogin' => $this->isLogin, 'user' => $this->user //홈화면
        ]);
           
    }

    function profile(Request $request)
    {
        $isLogin = $request->input("myp");
        $isid = DB::table('users')->where('user_id', $isLogin)->get(); 
        
        return view("front.mypro",[
            'user' => $isid
        ]);

    }


}