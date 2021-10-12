<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class FrontController extends BaseController
{
    public $session;
    public $isLogin = false;
    public $user;

    function __construct() {

        // 세션을 이용한 로그인 체크
        // $isLogin = true;
        if(Auth::check()){
            
        }

    }

    function index() 
    {
        return view("front.index", ['isLogin' => $this->isLogin, 'user' => $this->user]);
    }

    function step1() 
    {
        return view("front.step1", [
        ]);
    }

    function step2() 
    {
        return view("front.step2", [ 
        ]);
    }

    function step3() 
    {
        //세션체크 후 진행필요
        return view("front.step3", [ 
        ]);
        
    }

    function step4() 
    {
        return view("front.step4", [ 
        ]);
    }

    function hlogin() 
    {
        return view("front.hlogin", [ 
        ]);
    }

    function logout()
    {
        return view("front.index", ['isLogin' => Auth::logout()]);//로그인세션 로그아웃
    }
    
}
