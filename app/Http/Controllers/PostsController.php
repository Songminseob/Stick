<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;

class PostsController extends Controller
{

    public $session;
    public $isLogin = false;
    public $user;
    
    function index(Request $request)
    {
        $user = $request->session()->get('user');
        $posts = \App\Models\Post::all();
        return view('posts.index', compact('posts'), [
            'user' => $user
        ]);

    }

    
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        return view('posts.create',[
            'user' => $user
        ]);
    }

    
    public function store(Request $request)
    {

        $user = $request->session()->get('user');
        $posts = \App\Models\Post::all();
        Post::create(request()->validate([
            'title'=>['required', 'min:2', 'max:50'],
            'star'=>['required'],
            'bun'=>['required'],
            'gang'=>['required'],
            'user_id'=>['required']
        ]));

        return redirect('posts');
    }

    
    public function show(Post $post)
    {
        
    }

    
    public function edit(Post $post)
    {
       
    }

   
    public function update(Request $request, Post $post)
    {
        
    }

    
    public function destroy(Post $post)
    {
        
    }
}
