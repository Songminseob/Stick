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

    
    public function show(Post $post, Request $request)
    {

        $user = $request->session()->get('user');

        return view("posts.show", compact('post'),[
            'user' => $user
        ]);

    }

    
    public function edit(Post $post, Request $request)
    {
        $user = $request->session()->get('user');

        return view("posts.edit", compact('post'),[
           'user' => $user
        ]);
    }

   
    public function update(Request $request, Post $post)
    {
        $user = $request->session()->get('user');
        
        $post->update(request(['title', 'bun', 'gang', 'star','user_id']));

        return redirect('/posts');
    }

    
    public function destroy(Post $post)
    {

        $post->delete();

        return redirect('/posts');
    }
}
