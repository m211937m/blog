@extends('layout.nave')
@section('title','publisher_edit')
@section('body')
<div class="col-md-10 mx-md-auto col-lg-5 alert alert-info">
    <form method="post"action="{{route('publisher_update')}}">
    @csrf
    <input type="hidden"name="id" value="{{$publisher->id}}">
    <div class="form-floating mb-3">
        <input type="text" class="@error('name')is_invalid @enderror form-control"name="name" id="floatingInput"value="{{$publisher->name}}" placeholder="name">
        <label for="floatingInput">name</label>
    </div>
    @error('name')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <input type="email" class="@error('email')is_invalid @enderror form-control"name="email" id="floatingInput"value="{{$publisher->email}}" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
    </div>
    @error('email')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <div class="form-floating mb-3">
        <input type="password" class="@error('password')is_invalid @enderror form-control"name="password" id="floatingInput"value="{{$publisher->password}}" placeholder="name@example.com">
        <label for="floatingInput">Password</label>
    </div>
    @error('password')
        <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <button class="btn btn-success btn-lg btn-block w-100 m-1" type="submit">update</button>
    </div>
@endsection
