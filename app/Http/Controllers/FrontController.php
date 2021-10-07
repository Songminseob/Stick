<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class FrontController extends BaseController
{
    function index() 
    {
        return view("front.index", [
        ]);
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
        return view("front.step3", [ 
        ]);
    }

    function step4() 
    {
        return view("front.step4", [ 
        ]);
    }

/*
    function index() 
    {
        $user = User::all();

        $user = 'test';

        return view("front.index", [
            'test' => $user
        ]);
    }
*/
}
