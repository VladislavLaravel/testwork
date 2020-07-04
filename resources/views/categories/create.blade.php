@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <form  action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" name="name" id="name">
                        </div>
                    </div>
                    @if ($errors->has("name"))<span>{{ $errors->first("name") }}</span>@endif

                    <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input type="text" name="description" id="description">
                        </div>
                    </div>

                    @if ($errors->has("description"))<span>{{ $errors->first("description") }}</span>@endif
                    
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                           <input type="file" name="image" id="image">
                        </div>
                    </div>

                    <button type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
