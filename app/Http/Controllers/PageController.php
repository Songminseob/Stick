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

        $offset = $request->query('offset', 1);
        $limit = $request->query('limit', 5);
       
        
  
        $data = [
            'posts' => Page::offset($offset == 1 ? $offset : ($offset + $limit) * $offset)->limit($limit)->get(),
            'totalCount' => Page::all()->count(),
            'pageCount' => ceil(Page::all()->count() / 5),
        ];
       
        
        return view('pagination', ['data' => $data]);
    }
}