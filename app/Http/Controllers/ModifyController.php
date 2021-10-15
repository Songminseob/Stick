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
use RealRashid\SweetAlert\Facades\Alert;

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

    function modipro(Request $request)
    {
        $name = $request->input("name");
        $mem = $request->input("email");
        $mtel = $request->input("tel");
        $maddr1 = $request->input("addr1");
        $maddr2 = $request->input("addr2");
        $maddr3 = $request->input("addr3");
        $memare = $request->input("emare");
        $msmsre = $request->input("smsre");
        $mpw = $request->input("password1");

        $et = DB::table('users')->where('email',$mem)->exists();
        
        if (Hash::needsRehash($mpw))
        {
            $mpw = Hash::make($mpw);
        }
        
        if($et==true)
        {
            Alert::warning('오류','이미 존재하는 이메일입니다.');        
            
            //return redirect('mypro')->with('status');
            return redirect()->action([FrontController::class, 'profile']);
        }
        if($et==false){

            DB::table('users')->updateOrInsert(
                ['name' => $name], 
                [
                'email' => $mem,
                'tel' => $mtel,
                'addr1' => $maddr1,
                'addr2' => $maddr2,
                'addr3' => $maddr3,
                'emare' => $memare,
                'smsre' => $msmsre,
                'password' => $mpw
            ]);     
    
            Alert::success('수정완료','정보가 수정 되었습니다. 다시 로그인 해주세요.');
            
            return view("front.index", [ 
                'isLogin' => Auth::logout()
            ]);

        }
        
        

    }



}