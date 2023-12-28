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
                        <th>Count like</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articals as $artical)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$artical->title}}</td>
                        <td>{{$artical->publishers_name}}</td>
                        <td>{{$artical->name}}</td>
                        <td>{{ $artical->countt_count}}</td>
                        <td><a href="{{route('admin_article_show',$artical->id)}}"><button class="btn btn-info w-100 btn-sm">showing</button></a></td>
                        <td><a href="{{route('admin_restrict',$artical->id)}}"><button class="btn btn-success w-100 btn-sm">restrict</button></a></td>
                        <td><a href="{{route('admin_article_delete',$artical->id)}}"><button class="btn btn-danger w-100 btn-sm">delete</button></a></td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    <div>
@endsection

