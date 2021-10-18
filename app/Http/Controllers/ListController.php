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

class ListController extends Controller
{
    
    use AuthenticatesUsers;

    public $session;
    public $isLogin = false;
    public $user;

    function write(Request $request)
    {
        $user = $request->session()->get('user');
        return view("front.write",[
            'isLogin' => $this->isLogin, 'user' => $user
        ]);
    }

    function writecom(Request $request)
    {
        $user = $request->session()->get('user');
        $title = $request->input('title');
        $bun = $request->input('bun');
        $gang = $request->input('gang');

        dd($bun);

        return view("front.write",[

            'isLogin' => $this->isLogin, 'user' => $user

        ]);
        
    }

}