<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Database\Query\Builder;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Pagination\LengthAwarePaginator;
use RealRashid\SweetAlert\Facades\Alert;

class PostsController extends Controller
{
    use AuthenticatesUsers;

    public $session;
    public $isLogin = false;
    public $user;
    
    function index(Request $request)
    {
        $user = $request->session()->get('user');
        $posts = \App\Models\Post::paginate(5);
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

    function findtitle(Request $request)
    {
        
        $find = $request->input('findtitle');
        $ftitle = DB::table('posts')->where('title', 'like', '%'.$find.'%')->get();

        dump($find);

        if($ftitle->count()<1){

            Alert::warning('오류','찾는 항목이 없습니다.');        
            
            return redirect()->action([PostsController::class, 'index']);
        }
        else{

            Alert::success('성공','성공');
            return view("posts.index",[
                
            ]);
        }  
    }

}
