<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index(){
        // $page = request()->input('page') ?? 1;
        // $posts = Post::limit(16)->offset(($page-1)*16)->get();
        // $posts = Post::paginate(12);
        $posts = Post::withCount('comments')->latest()->simplepaginate(16);
        // use order by here to arrange filter the results like in sql
        // dd($posts->toArray());
        return view('welcome', compact('posts'));
    }

    public function post(Post $post){
        
        // $id = request()->input('id');
        // $post = Post::findOrFail($id);
        // $post = $id;
        // $post = Post::find($id);
        // if(!$post){
        //     throw new NotFoundHttpException();
        // }
        // ! on loogiline ümberpöörd
        return view('post', compact('post'));
    }
}
