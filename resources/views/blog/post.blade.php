@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>
                    <p>{{ $post->name }}</p>
                    <p>{{ $post->description }}</p>
                    <p>{{ $post->text }}</p>
                    <p>
                        @if($post->image)
                            <img src="{{asset('/storage/' . $post->image)}}">
                        @endif
                    </p>
                    <p>{{ $post->updated_at }}</p>
                    <p>{{ $post->user->name }}</p>
                    <p>{{ $post->category->name }}</p>
                    <p>{{ $post->status }}</p>

                    <h1> User: {{$count_visitors}} View: {{$count_views}}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
