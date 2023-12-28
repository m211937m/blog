@extends('layout.nave')
@section('title','category')
@section('body')
    <div class="col mx-md-auto col-lg-4 alert alert-secondary text-center">
        @forelse ($categorys as $category)
        <div class="row w-100 alert alert-secondary">
            <div class="col"><img class="bd-placeholder-img rounded-circle"src="{{$category->img}}" width="200" height="200" role="img"/></div>
            <div class="col">
                <div class="row"><h2 >{{$category->name}}</h2></div>
                <div class="row"><p>{{$category->description}}</p></div>
                <p>
                    <a class="btn btn-success w-25" href="{{route('category_edit',$category->id)}}">edit</a>
                    <a class="btn btn-danger w-25" href="{{route('category_delete',$category->id)}}">delete</a>
                </p>
            </div>
        </div>
        <div class="row w-100"><hr></div>
        @empty
        @endforelse
        <div class="row w-100"><a class="btn btn-primary w-100"href="{{route('category_add')}}">add</a></div>

    <div>
@endsection
