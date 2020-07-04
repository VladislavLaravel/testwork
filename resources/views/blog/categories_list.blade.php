@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>
                @if(count($categories))

               	<div class="card-body">
                     <table border="1" width="100%" cellpadding="5">
                        <thead >
                            <tr>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            	<tr>
                            		<td><a href="{{route('blog.posts', $category->id) }}" class="btn btn-secondary">{{ $category->name }}</a> </td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                    	@if($category->image)
                            				<img src="{{asset('/storage/' . $category->image)}}">
                            			@endif
                            		</td>
                            	</tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(isset($message))
                        {{ $message }}
                    @endif
                </div>
                @else
                	<p>Register on the site to create new categories</p>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
