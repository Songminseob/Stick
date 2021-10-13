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



class FindController extends BaseController
{
    use AuthenticatesUsers;

    

    function find(Request $request)
    {
        
        $phone = $request->input('phone'); //ajax에서 넘긴 data(phone)

        $result = DB::table('users')->where('phone', $phone)->get();  //where('phone', 여기에 request 값을 안넣어줘서 값이 안넘어왔었음)

        if ($result->count() < 1) {
            return response()
                ->json(null, 400);
        }

        return response()
            ->json($result);

        
        // if($result==1){
        //     return $result=1;
        // }
        // else{
        //     return $result=0;
        // }

        // if($result==) {
        //     echo "test";
        // } else {
        //     echo "test2";
        // }

        // return $result;
    }
    



}