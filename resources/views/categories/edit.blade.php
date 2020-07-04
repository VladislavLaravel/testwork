@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <form  action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="name" id="name" value="{{ $category->description }}">
                        </div>
                    </div>
                    @if ($errors->has("name"))<span>{{ $errors->first("name") }}</span>@endif
                    
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input type="text" id="description" name="description" value="{{ $category->description }}">
                        </div>
                    </div>

                    @if ($errors->has("description"))<span>{{ $errors->first("description") }}</span>@endif
                    
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        @if($category->image)
                                <img src="{{asset('/storage/' . $category->image)}}">
                        @endif
                        <div class="col-sm-4">
                           <input type="file" name="image" id="image" value="">
                        </div>
                    </div>

                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
