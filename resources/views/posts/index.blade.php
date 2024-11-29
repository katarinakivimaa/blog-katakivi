@extends('partials.layout')
@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-primary">Add Post</a>
    <div class="flex justify-center">
        {{-- {{$posts->links('partials.pagination')}} --}}
        {{ $posts->links() }}
    </div>
    <div class="overflow-x-auto">
        <table class="table table-zebra">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Updated</th>
                <th>Created</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <div class="join">
                                <a href="{{route('posts.show',['post'=> $post])}}" class="btn join-item btn-info">Show</a>
                                <a href="{{route('posts.edit',['post'=> $post])}}" class="btn join-item btn-warning">Edit</a>
                                <button form="delete-form-{{$post->id}}" class="btn join-item btn-error">Delete</button>
                            </div>
                                <form id="delete-form-{{$post->id}}" method="POST" action="{{route('posts.destroy',['post'=> $post])}}">
                                    @method('DELETE')
                                    @csrf
                                    {{-- <input type="submit" class="btn join-item btn-error" value="delete" > --}}
                                </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>IDsomething1</th>
                <th>TITLEsomethin2</th>
                <th>something3</th>
                <th>something4</th>
            </tfoot>
        </table>
    </div>
@endsection
