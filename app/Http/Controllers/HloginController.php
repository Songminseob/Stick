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
        $email = $request -> email;
        $phone = $request -> phone;

        $user = DB::table('users')
            ->where('user_id', $user_id)->get();

        // 세션 저장$
        $us = $request->session()->put('user', $user[0]);

        if(Auth::attempt(['user_id'=>$user_id, 'password'=>$password])){ //유저아이디 , 패스워드 isLogin에 저장
            $isLogin = [$user_id, $password];
            return view('front.index', ['isLogin'=>$isLogin]);
        }
        else{
            Alert::warning('오류','로그인 정보를 확인해주세요.');
            return view('auth.hlogin',[]);
        }
        
        
    }
    
}