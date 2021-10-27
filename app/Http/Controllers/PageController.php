<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Page;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {

        // page : 1, offset =0
        // page : 2, offset =5
        // page : 3, offset =10
        // page : 4, offset =15

        $currentPage = $request->query('page'); //현재page의 값을
        $limit = 3;
        $offset = $limit * ($currentPage - 1);

        $data = [
            'posts' => Page::offset($offset)->limit($limit)->get(),
            'totalCount' => Page::all()->count(),
            'totalPage' => ceil(Page::all()->count() / 3),
        ];
       

        // for($i=0; $i<$data['pageCount']; $i++){
            
        //     $count = $i*5;

        //     $modidata = Page::offset($count)->limit($limit)->get();

        //     $page[$i]= $modidata;

        // }

        //dd($currentPage);
       
        return view('pagination', [
            'data' => $data,
            'page' => $data['posts'],
            'pageOffset' => 5,
            'totalPage' => $data['totalPage'],
            'currentPage' => $currentPage,
        ]);
    }
}