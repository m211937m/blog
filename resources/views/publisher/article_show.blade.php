@extends('layout.nave_publisher')
@section('title','article')
@section('m')
<a class="nav-link" href="{{route('article',$article->publisher_id)}}">home</a>
@endsection
@section('body')
<div class="col-md-10 mx-md-auto col-lg-10 alert alert-dark">
    <div class="jumbotron">
        <h1 class="display-3">{{$article->title}}</h1>
        <img src="{{$article->img}}" height="500" width="100%">
        <p class="lead">{{$article->paragraph_1}}</p>
        <img src="{{$article->img_1}}" height="500" width="100%">
        <p class="lead">{{$article->paragraph_2}}</p>
        <img src="{{$article->img_2}}" height="500" width="100%">
        <p class="lead">{{$article->paragraph_3}}</p>

    </div>
</div>

@endsection
