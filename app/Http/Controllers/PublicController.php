<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PublicController extends Controller
{
    public function index(){
        $posts = Post::withCount('comments', 'likes')->latest()->simplePaginate(16);
        return view('welcome', compact('posts'));
    }

    public function post(Post $post){
        return view('post', compact('post'));
    }

    public function like(Post $post){
       $like = auth()->user()->likes()->where('post_id', $post->id)->first();
       if($like){
        $like->delete();
       } else {
        $like = new Like();
        $like->user()->associate(auth()->user());
        $like->post()->associate($post);
        $like->save();
       }
       return redirect()->back();
    }
}
