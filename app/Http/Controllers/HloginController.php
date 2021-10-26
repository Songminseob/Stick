<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HloginController extends Controller
{
    
    use AuthenticatesUsers;
    
    protected $redirectTo = '/';

    function hlogin()
    {
        return view("auth.hlogin",[            
        ]);
    }

    function ulogin(Request $request)
    {
    
        $user_id = $request -> user_id;
        $password = $request -> password;

        $user = DB::table('users')
            ->where('user_id', $user_id)->get();

    
        $us = $request->session()->put('user', $user);// 세션 저장


        if(Auth::attempt(['user_id'=>$user_id, 'password'=>$password])){ 
            //$user = [$user_id, $password];
            return view('front.index', ['user'=>$user]);
        }
        else{
            Alert::warning('오류','로그인 정보를 확인해주세요.');
            return view('auth.hlogin',[]);
        }
            
    }
    
}