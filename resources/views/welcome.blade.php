@extends('partials.layout')
@section('content')
    <div class="flex justify-center">
        {{-- {{$posts->links('partials.pagination')}} --}}
        {{ $posts->links() }}
    </div>

    <div class="grid-cols-4 grid grid-gap-4 gap-x-2">
        {{-- < ?php for($i=0;$i<1;$i++): ? >
            <div class="card bg-base-100 shadow-xl">
                <figure>
                    <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                        alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Shoes!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Buy Now</button>
                    </div>

                </div>
            </div>
            < ?php endfor; ? > --}}
        @foreach ($posts as $post)
            <div class="card bg-base-100 shadow-xl min-h-full">
                <figure>
                    @if ($post->image)
                        <figure>
                            <img src="{{ $post->image }}" alt="Shoes" />
                        </figure>
                    @endif
                </figure>
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    {{-- < ?=$i? > --}}
                    <p>{{ $post->snippet }}</p>
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
                        <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read More</a>
                        {{-- <a href="{{$post->id}}" class="btn btn-primary">Read More</a> --}}
                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
