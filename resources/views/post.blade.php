@extends('partials.layout')
@section('content')
    <div class="card bg-base-100 shadow-xl min-h-full">
        <figure>
            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <div class="flex flex-row">
                <div class="basis-1/2">
                    <div class="tooltip w-fit" data-tip="{{ $post->created_at }}">
                        <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @if($post->created_at->notEqualTo($post->updated_at))
                    <div class="basis-1/2 text-right">
                        <div class="tooltip w-fit" data-tip="{{ $post->updated_at }}">
                            <p class="text-neutral-content">Edited</p>
                        </div>
                    </div>
                @endif
            </div>
            <p class="text-neutral-content">{{ $post->user->name }}</p>
            <div class="card-actions justify-end">

            </div>
        </div>
    </div>
@endsection
