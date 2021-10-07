<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use RegistersUsers;

    protected $redirectTo = '/step4';

    function step4(array $data){
        return User::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'], //유저아이디 추가
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            //'user_level' => config('ext.user.user_level.default'), //유저레벨 추가
            'phone' => $data['phone'],
            'tel' => $data['tel'],
            'addr1' => $data['addr1'],
            'addr2' => $data['addr2'],
            'addr3' => $data['addr3'],
            'smsre' => $data['smsre'],
            'emare' => $data['emare'],
        ]);
    }
}

