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
use Illuminate\Support\Facades\Validator;

class SignUpController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use RegistersUsers;

    protected $redirectTo = '/step4';

    function validator(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => ['required', 'string','min:2', 'max:10'],
        //     'user_id' =>['bail','required', 'string', 'min:4','max:15','unique:users'],
        //     'email' => ['bail','required', 'string', 'email','min:4', 'max:50', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'max:15', 'confirmed'],
        //     'phone' =>['bail','required','string','min:8','max:15','unique:users'],
        // ]);

        // if($validatedData->validate()->fails()){
        //     return redirect()
        //     ->back()
        //     ->withErrors($validator->errors())
        //     ->withInput();
        // }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string','min:2', 'max:10'],
            'user_id' =>['bail','required', 'string', 'min:4','max:15','unique:users'],
            'email' => ['bail','required', 'string', 'email','min:4', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:15', 'confirmed'],
            'phone' =>['bail','required','string','min:8','max:15','unique:users'],
        ]);
        
        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator->errors())
            ->withInput();
        }

        return redirect('/step4');
        
    }

    function messages(){//?????? ????????? ??????
        return[
            'user_id.unique:users' => '???????????? ?????? ???????????????.',
            'password.required' => '??????????????? ???????????????.',
            'password.min:8' => '??????????????? ?????? 4??? ?????? ??????????????????.',
            'phone.unique' => '?????? ???????????? ??????????????????.'
        ];
    }


    function step4(Request $data){

        $this->validator($data);

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

