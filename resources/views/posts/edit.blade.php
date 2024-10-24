@extends('partials.layout')
@section('content')
    @extends('partials.layout')
@section('content')
    <div class="card bg-base-200 shadow-xl mx-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('posts.update'),['post' => $post] }}">
                @method('PUT')
                @csrf
                
                {{-- turvalisuse jaoks laraveli kõikidel post formide puhul vaja see @ csrf panna, muidu error 419 --}}
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Title</span>
                    </div>
                    <input type="text" name="title" placeholder="Title" value="{{ old('title') ?? $post->title }}"
                        class="input input-bordered w-full @error('password') input-error @enderror" />
                    <div class="label">
                        @error('title')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text">Content</span>
                    </div>
                    <textarea name="body" placeholder="Body"
                                rows="12"
                            class="textarea textarea-bordered w-full @error('password') textarea-error @enderror"> </textarea>
                    <div class="label">
                        @error('body')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </div>
                </label>

                <input type="submit" class="btn btn-primary" value="Update">

            </form>
        </div>

    </div>
@endsection

@endsection
