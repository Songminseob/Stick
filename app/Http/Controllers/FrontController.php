<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Http\Controllers\json_decode;

use Illuminate\Http\Request;

class FrontController extends BaseController
{
    public $session;
    public $isLogin = false;
    public $user;

    function __construct() {

        // 세션을 이용한 로그인 체크
        // 
    }

    function index(Request $request) 
    {
        $user = $request->session()->get('user');
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

    function logout(Request $request)
    {
        $user = $request->session()->forget('user');
        return view("front.index", ['isLogin' => Auth::logout()]);//로그인세션 로그아웃
    }
    
    function fid()
    {
        return view("front.findid",[
        ]);
    }

    function fpw()
    {
        return view("front.findpw",[
        ]);
    }

    function suid()
    {
        return view("front.successid",[     
        ]);
    }

    function supw()
    {
        return view("front.successpw",[     
        ]);
    }
    
    function modipw()
    {
        return view("front.index",[

        ]);
    }

    function profile(Request $request)
    {
        $user = $request->session()->get('user');

        return view("front.mypro",[
            'user' => $user
        ]);
    }


}
