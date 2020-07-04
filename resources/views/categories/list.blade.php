@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>
                @if(count($categories))

                <h1><a href="{{ route('post.index') }}" class="btn btn-secondary">Posts</a></h1>

               	<div class="card-body">
                    

                     <table border="1" width="100%" cellpadding="5">
                        <thead >
                            <tr>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th class="last-th-table-js" style="padding:0"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            	<tr>
                            		<td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                    	@if($category->image)
                            				<img src="{{asset('/storage/' . $category->image)}}">
                            			@endif
                            		</td>
                                    <td><a href="{{ route('category.edit', $category->id) }}" class="btn btn-secondary">Update</a></td>
                            	</tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    
                    <a href="{{ route('category.create') }}" class="btn btn-secondary">Add category</a>

                    @if(isset($message))
                        {{ $message }}
                    @endif
                </div>
                @else
                	<a href="{{ route('category.create') }}" class="btn btn-secondary">Create your first category</a>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection
