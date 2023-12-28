@extends('layout.nave_publisher')
@section('title','Article_edit')
@section('m')
<a class="nav-link" href="{{route('article',$id)}}">home</a>
@endsection
@section('body')
    <form method="post"action="{{route('article_update')}}"enctype="multipart/form-data">
    @csrf
    <div class="col-md-10 mx-md-auto col-lg-10 alert alert-primary">
        <div class="container">
            <table class="table">
                <tr>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="@error('title')is_invalid @enderror form-control w-100" value="{{$article->title}}"name="title" id="floatingInput" placeholder="name">
                            <label for="floatingInput">Title</label>
                        </div>
                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="file" class="@error('img_main')is_invalid @enderror form-control w-100"name="img_main" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Image main</label>
                        </div>
                        @error('img_main')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-floating">
                            <input type="file" class="@error('Image_secondary_1')is_invalid @enderror form-control w-100"name="Image_secondary_1" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Image secondary 1</label>
                        </div>
                        @error('Image_secondary_1')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="file" class="@error('Image_secondary_2')is_invalid @enderror form-control w-100"name="Image_secondary_2" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Image secondary 2</label>
                        </div>
                        @error('Image_secondary_2')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-floating">
                            <textarea class="@error('paragraph_1')is_invalid @enderror form-control h-100"name="paragraph_1"id="floatingInput" placeholder="name@example.com">{{$article->paragraph_1}}</textarea>
                            <label for="floatingInput">paragraph 1</label>
                        </div>
                        @error('paragraph_1')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        </td>
                        <td>
                        <div class="form-floating">
                            <textarea class="@error('paragraph_2')is_invalid @enderror form-control h-100"name="paragraph_2" id="floatingInput" placeholder="name@example.com">{{$article->paragraph_2}}</textarea>
                            <label for="floatingInput">paragraph 2</label>
                        </div>
                        @error('paragraph_2')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-floating">
                            <textarea class="@error('paragraph_3')is_invalid @enderror form-control h-100"name="paragraph_3" id="floatingInput"  placeholder="name@example.com">{{$article->paragraph_3}}</textarea>
                            <label for="floatingInput">paragraph 3</label>
                        </div>
                        @error('paragraph_3')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </td>
                    <td>
                        <div class="form-floating mb-1">
                            <select class="form-select" id="floatingSelect1"name="categore_id" aria-label="Floating label select example">
                                @forelse ($categores as $categore)
                                @if($categore->id == $article->categore_id)
                                    <option selected value="{{$categore->id}}">{{$categore->name}}</option>
                                @else
                                    <option  value="{{$categore->id}}">{{$categore->name}}</option>
                                @endif
                                @empty
                                @endforelse
                            </select>
                            <label for="floatingSelect1">Categore</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="btn btn-success w-100 btn-lg"value ="UPDATE">
                    </td>
                    <td>
                        <a href="{{route('article')}}"class="btn btn-dark btn-lg w-100">BARK</a>
                    </td>

                </tr>
            </table>
        </div>
    </div>
    </form>
@endsection
