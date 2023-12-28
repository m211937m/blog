@extends('layout.nave')
@section('title','users')
@section('body')
    <div class="col-md-10 mx-md-auto col-lg-8 alert alert-info">
        <div class="alert alert-light">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                        <th>email</th>
                        <th colspan="2">#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    @if ($user->type == 0)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('users_credit',$user->id)}}"><button class="btn btn-primary w-100 btn-sm">accepting</button></a></td>
                        <td><a href="{{route('users_delete',$user->id)}}"><button class="btn btn-danger w-100 btn-sm">denied</button></a></td>
                    </tr>
                    @else
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td colspan="2"><a href="{{route('users_delete',$user->id)}}"><button class="btn btn-danger w-100 btn-sm">delete</button></a></td>
                    </tr>
                    @endif
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    <div>
    </div>

@endsection
