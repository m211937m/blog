@extends('layout.main')
@section('title','login')
@section('body')

    <form action="{{route('check_email')}}"method="post">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div  class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                            <h3 class="mb-5">Sign in</h3>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                                @endforeach

                            @endif
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control"name="email" id="floatingInput" placeholder="name@example.com" _mstplaceholder="299455" _msthash="232">
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control"name="password" id="floatingInput" placeholder="name@example.com" _mstplaceholder="299455" _msthash="232">
                                <label for="floatingInput">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select"name="type_user">
                                    <option value="1">user</option>
                                    <option value="2">publisher</option>
                                </select>
                                <label for="floatingInput">type user</label>
                            </div>
                            <div class="d-flex justify-content-start mb-4 ">
                                <button class="btn btn-primary btn-lg btn-block w-100" type="submit">Login</button>
                            </div>

                            <hr>
                            <a class="fs-5 font-italic"href="{{route('rejecter')}}">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
