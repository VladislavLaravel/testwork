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

                @if(count($posts))
               	<div class="card-body">
                    
                    статус
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
                            @foreach($posts as $post)
                            	<tr>
                                    <td>{{ $post->name }}</td>
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
                                    
                                    <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-secondary">Update</a></td>
                            	</tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    <a href="{{ route('post.create') }}" class="btn btn-secondary">Add category</a>

                    @if(isset($message))
                        {{ $message }}
                    @endif
                </div>
                @else
                	<a href="{{ route('post.create') }}" class="btn btn-secondary">Create your first category</a>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
