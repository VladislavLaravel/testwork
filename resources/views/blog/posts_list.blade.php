@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                @if(session('message'))
                    <p>{{ session('message') }}</p>
                @endif

                @if(count($category->posts))
                <div class="card-body">
                    <table border="1" width="100%" cellpadding="5">
                        <thead >
                            <tr>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Text</th>
                                <th>Image</th>
                                <th>Date</th>
                                <th>Author</th>
                                <th>Categoty</th>
                                <th>Status</th>
                                <th class="last-th-table-js" style="padding:0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category->posts as $post)
                                <tr>
                                    <td><a href="{{route('blog.post', $post->id) }}" class="btn btn-secondary">{{ $post->name }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->text }}</td>
                                    <td>
                                        @if($post->image)
                                            <img src="{{asset('/storage/' . $post->image)}}">
                                        @endif
                                    </td>
                                    <td>{{ $post->updated_at }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(isset($message))
                        {{ $message }}
                    @endif
                </div>
                @else
                    <p>Register on the site to create new posts</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
