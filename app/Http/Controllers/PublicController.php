<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        // $page = request()->input('page') ?? 1;
        // $posts = Post::limit(16)->offset(($page-1)*16)->get();
        // $posts = Post::paginate(12);
        $posts = Post::simplepaginate(12);
        // use order by here to arrange filter the results like in sql
        // dd($posts->toArray());
        return view('welcome', compact('posts'));
    }
}
