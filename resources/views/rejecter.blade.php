@extends('layout.main')
@section('title','rejecter')
@section('body')
    <form method="post"action="{{route('rejecter_account')}}">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div  class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">rejecter</h3>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"name="name" id="floatingInput" placeholder="name">
                                    <label for="floatingInput">name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control"name="email" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control"name="password" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Password</label>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block w-100 m-1" type="submit">create account</button>
                                <a class="fs-5 font-italic"href="{{route('login')}}">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

@endsection
