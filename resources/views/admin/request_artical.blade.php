@extends('../layout.nave')
@section('title','article')
@section('body')
<div class="col-md-10 mx-md-auto col-lg-9 alert alert-info">
        <div class="alert alert-light">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Publisher</th>
                        <th>Categore</th>
                        <th>request type</th>
                        <th colspan="3">process</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articals as $artical)
                    @if ($artical->type == 0)
                    <tr class="alert alert-primary">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->publisher_name}}</td>
                        <td>{{$artical->name}}</td>
                        <td>requset add</td>
                        <td><a href="{{route('show_artical',$artical->id)}}"><button class="btn btn-info w-100 btn-sm">showing</button></a></td>
                        <td><a href="{{route('admin_approve_on_artical',$artical->id)}}"><button class="btn btn-success w-100 btn-sm">acceptance</button></a></td>
                        <td><a href="{{ route('admin_reject_artical',$artical->id) }}"class="btn btn-danger w-100 btn-sm">refuse</a></td>
                    </tr>
                    @elseif ($artical->type == 3)
                    <tr class="alert alert-success">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->publisher_name}}</td>
                        <td>{{$artical->name}}</td>
                        <td>requset edit</td>
                        <td><a href="{{route('show_artical',$artical->id)}}"><button class="btn btn-info w-100 btn-sm">showing</button></a></td>
                        <td><a href="{{route('admin_approval_of_an_amendment',$artical->id)}}"><button class="btn btn-success w-100 btn-sm">acceptance</button></a></td>
                        <td><a  href="{{route('admin_refusal_Amendment',$artical->id) }}"class="btn btn-danger w-100 btn-sm">refuse</a></td>
                    </tr>
                    @elseif ($artical->type == 6)
                    <tr class="alert alert-danger">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->publisher_name}}</td>
                        <td>{{$artical->name}}</td>
                        <td>requset delete</td>
                        <td><a href="{{route('show_artical',$artical->id)}}"><button class="btn btn-info w-100 btn-sm">showing</button></a></td>
                        <td><a href="{{route('admin_approve_deletion',$artical->id)}}"class="btn btn-primary w-100 btn-sm">acceptance</a></td>
                        <td><a  href="{{route('admin_refusal_to_delete',$artical->id) }}"class="btn btn-danger w-100 btn-sm">refuse</a></td>
                    </tr>
                    @endif
                    @empty
                    <div class="alert alert-secondary lg">There's no order</div>
                    @endforelse
                </tbody>
            </table>
        </div>
    <div>
@endsection
