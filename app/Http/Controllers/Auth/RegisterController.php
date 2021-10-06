<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME; //회원가입 후 이동하는 페이지

    
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'user_id' =>['required', 'string','max:255','unique:users'], //유효성검사 유저아이디 추가
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

 
    protected function create(array $data) //의존성 주입 protected function create(CreateUsersTable $request)
    {
        return User::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'], //유저아이디 추가
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_level' => config('ext.user.user_level.default'), //유저레벨 추가
        ]);


        //의존성 주입
        // $user = new User();
        // $user->name = $data['name'];
        // $user->user_id = $data['user_id'];
        // $user->email = $data['email'];
        // $user->password = Hash::make($data['password']);
        // $user->user_level = config('ext.user.user_level.default');
        
        
        // return $user->save();

    }


}
