<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignUpController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use RegistersUsers;

    protected $redirectTo = '/step4';

    function step4(Request $data){
        User::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'], 
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'tel' => $data['tel'],
            'addr1' => $data['addr1'],
            'addr2' => $data['addr2'],
            'addr3' => $data['addr3'],
            'smsre' => $data['smsre'],
            'emare' => $data['emare'],
        ]);

        return redirect($this->redirectTo);   
    }
}

