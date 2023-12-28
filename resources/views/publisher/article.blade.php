@extends('layout.nave_publisher')
@section('title','article')
@section('m')

@endsection
@section('body')
<div class="col-md-10 mx-md-auto col-lg-8 alert alert-info">
        <div class="alert alert-light">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Categore</th>
                        <th>Count like</th>
                        <th colspan="2">
                            <a href="{{route('article_add',$id)}}"><button class="btn btn-primary btn-sm w-100">add</button></a>
                        </th>
                        <th>
                            <a href="{{route('article_request',$id)}}"><button class="btn btn-dark btn-sm w-100">rquset</button></a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articals as $artical)
                    @if ($artical->type == 3)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>{{$artical->countt_count}}</td>
                        <td><a href="{{route('article_show',$artical->id)}}"><button class="btn btn-info w-100 btn-sm">showing</button></a></td>
                        <td><a href="{{route('article_edit',$artical->id)}}"><button class="btn btn-success w-100 btn-sm">edit</button></a></td>
                        <td><a href="{{route('article_delete',$artical->id)}}"><button class="btn btn-danger w-100 btn-sm">delete</button></a></td>
                    </tr>
                    @elseif ($artical->type == 2)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>{{$artical->countt_count}}</td>
                        <td colspan="3">في انتظار الموافقة من المدير للتأكيد عملية الحذف</td>
                    </tr>
                    @elseif ($artical->type == 1)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>{{$artical->countt_count}}</td>
                        <td colspan="3">في انتظار الموافقة من المدير للتأكيد عملية التعديل</td>
                    </tr>
                    @elseif ($artical->type == 4)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->name}}</td>
                        <td>{{$artical->countt_count}}</td>
                        <td colspan="3">قام المدير بأرشفة هذا المقالة</td>
                    </tr>
                    @endif
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    <div>
@endsection
