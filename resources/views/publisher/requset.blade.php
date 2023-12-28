@extends('../layout.nave_publisher')
@section('title','article')
@section('m')
<a class="nav-link" href="{{route('article',$id)}}">home</a>
@endsection
@section('body')
<div class="col-md-10 mx-md-auto col-lg-8 alert alert-info">
        <div class="alert alert-light">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Categore</th>
                        <th>Status</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articals as $artical)
                    @if($artical->type == 2)
                    <tr class="alert alert-danger">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>سبب رفض اضافة مقالة{{$artical->refuse_reason}}</td>
                        <td><a href="{{route('article_request_delete', $artical->id)}}"><button class="btn btn-success w-100 btn-sm">agree</button></a></td>
                    </tr>
                    @elseif($artical->type == 5)
                    <tr class="alert alert-danger">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>سبب رفض تعديل مقالة{{$artical->refuse_reason}}</td>
                        <td><a href="{{route('article_request_delete', $artical->id)}}"><button class="btn btn-success w-100 btn-sm">agree</button></a></td>
                    </tr>
                    @elseif($artical->type == 8)
                    <tr class="alert alert-danger">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>سبب رفض اضافة مقالة{{$artical->refuse_reason}}</td>
                        <td><a href="{{route('article_request_delete', $artical->id)}}"><button class="btn btn-success w-100 btn-sm">agree</button></a></td>
                    </tr>
                    @elseif(in_array($artical->type,[1 ,4 ,7]))
                    <tr class="alert alert-primary">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td> {{$artical->refuse_reason}}</td>
                        <td><a href="{{route('article_request_delete', $artical->id)}}"><button class="btn btn-success w-100 btn-sm">agree</button></a></td>
                    </tr>
                </tbody>
            </table>
                    @endif
                    @empty
                    <div class="alert alert-secondary fs-2 w-100">There is no request</div>
                    @endforelse
        </div>
    <div>
@endsection

