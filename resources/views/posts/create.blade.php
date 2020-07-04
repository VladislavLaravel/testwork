@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <form  action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="name" id="name" required>
                        </div>
                    </div>

                    @if ($errors->has("name"))<span>{{ $errors->first("name") }}</span>@endif
                    
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input type="text" id="description" name="description">
                        </div>
                    </div>
                    @if ($errors->has("description"))<span>{{ $errors->first("description") }}</span>@endif

                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label">Text</label>
                        <div class="col-sm-10">
                          <textarea id="text" name="text"></textarea>
                        </div>
                    </div>
                    @if ($errors->has("text"))<span>{{ $errors->first("text") }}</span>@endif

                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                           <input type="file" name="image" id="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label">Category</label>
                        <select name="category" id="category" required>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"> {{$category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has("category"))<span>{{ $errors->first("category") }}</span>@endif

                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <input type="text" id="status" name="status">
                        </div>
                    </div>
                    @if ($errors->has("status"))<span>{{ $errors->first("status") }}</span>@endif

                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection