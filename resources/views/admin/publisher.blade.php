@extends('layout.nave')
@section('title','publisher')
@section('body')
    <div class="col-md-10 mx-md-auto col-lg-8 alert alert-info">
        <div class="alert alert-light">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th colspan="2"><a href="{{route('publisher_add')}}"><button class="btn btn-primary btn-sm w-100">add</button></a></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($publishers as $publisher)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$publisher->name}}</td>
                        <td>{{$publisher->email}}</td>
                        <td><a href="{{route('publisher_edit',$publisher->id)}}"><button class="btn btn-success w-100 btn-sm">edit</button></a></td>
                        <td><a href="{{route('publisher_delete',$publisher->id)}}"><button class="btn btn-danger w-100 btn-sm">delete</button></a></td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    <div>

@endsection
