@extends('layout.nave')
@section('title','category_add')
@section('body')
    <div class="col-md-10 mx-md-auto col-lg-5 alert alert-primary text-center">
    <form method="post"action="{{route('category_create')}}"enctype="multipart/form-data">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="@error('name')is_invalid @enderror form-control"name="name" id="floatingInput" placeholder="name">
        <label for="floatingInput">name</label>
    </div>
    @error('name')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <input type="text" class="@error('description')is_invalid @enderror form-control"name="description" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Description</label>
    </div>
    @error('description')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <input type="file" class="@error('img')is_invalid @enderror form-control"name="img" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Image</label>
    </div>
    @error('img')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <input type="submit" class="btn btn-primary w-100 font-monospace fs-5 "value="create">
    </div>
@endsection
