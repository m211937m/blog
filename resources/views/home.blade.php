@extends('layout.nave_user')
@section('title','home')
@section('nave')
    <div class="dropdown mb-3">
        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Categores
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        @forelse ($categores as $categore)
            <li><a class="dropdown-item" href="{{ route('categore',['id'=> $id ,'categore_id'=> $categore->id]) }}">{{ $categore->name }}</a></li>
        @empty
        @endforelse
        </ul>
    </div>

@endsection
@section('body')
<div class="container alert alert-info">
    @forelse ($articals as $artical)

    <div class="row m-1">
        <div class="panel panel-default widget">
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="{{ $artical->img }}" class="img-circle img-responsive"style="width:80" alt=""/>
                            </div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <div class="mic-info fs-3">
                                        {{ $artical->title }}
                                    </div>
                                    <div class="mic-info fs-4">
                                        Publisher: {{ $artical->publishers_name }}
                                    </div>
                                </div>
                                <div class="comment-text fs-4">
                                    categores : {{ $artical->name }}
                                </div>
                                <div class="comment-text fs-5">
                                    Count : {{ $artical->countt_count  }} Date:{{ $artical->created_at }}
                                    <a href="{{ route('home_artical_show',['id'=>$id ,'artical_id'=>$artical->id]) }}"><button type="button" class="btn btn-info btn-sm w-25">
                                        show
                                    </button></a>
                                    @forelse ($flows as $flow)
                                        @if ($flow->article_id = $artical->id)
                                            <a href="{{ route('unflow',['id'=>$id ,'artical_id'=>$artical->id]) }}"class="btn btn-primary btn-sm w-25">LIKE</a>
                                        @else
                                        <a href="{{ route('create_flow',['id'=>$id ,'artical_id'=>$artical->id]) }}"><button class="btn btn-secondary btn-sm w-25">LIKE</button></a>
                                        @endif
                                    @empty
                                    <a href="{{ route('create_flow',['id'=>$id ,'artical_id'=>$artical->id]) }}"><button class="btn btn-secondary btn-sm w-25">LIKE</button></a>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
        </div>
    </div>
    @empty

    @endforelse
</div>

@endsection
