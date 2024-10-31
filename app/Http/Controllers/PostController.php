<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\UnauthorizedException;

class PostController extends Controller
{

    public function __construct()
    {
        if(request()->route('post') && request()->route('post')->user->id !== auth()->user()->id) {
            abort(404); //tegelt 403 aga info mitte väljastamiseks ära anna midagi
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->paginate();
        // $posts = Post::where('user_id',auth()->user()->id)->latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post($request->validated());
        if($request->has('image') && $request->file('image') !== null ){
            $file = $request->file('image')->store('', ['disk' => 'public']);
            $post->image = $file;
        }
        
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        $post->user()->associate(auth()->user());
        $post->save();
        foreach($request->input('tags') as $id){
            $post->tags()->attach($id);
        }
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $tags = Tag::all();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post = new Post($request->validated());
        if($request->has('image') && $request->file('image') !== null ){
            Storage::disk('public')->delete($post->imageFile);
            $file = $request->file('image')->store('', ['disk' => 'public']);
            $post->image = $file;
        }
        $post->save();
        $post->tags()->sync($request->input('tags'));
        // foreach($post->tags as $tag){
        //     $post->tags()->detach($tag);
        // }
        // foreach($request->input('tags') as $id){
        //     $post->tags()->attach($id);
        // }
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back();
    }
}