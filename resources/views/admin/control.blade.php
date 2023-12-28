@extends('../layout/nave')
@section('title','contole_admin')
@section('body')
    <div class="col-md-10 mx-md-auto col-lg-8 alert alert-info text-center fs-3">
        <div class="row w-100">
            <div class="col w-50">
                <a href="{{ route('admin_article') }}"class= "btn btn-primary btn-lg w-100 m-2">المقالات</a>
            </div>
            <div class="col w-50">
                <a href="{{ route('category_view') }}"class= "btn btn-primary btn-lg w-100 m-2">الفئات</a>
            </div>
        </div>
        <div class="row w-100">
            <div class="col w-50">
                <a href="{{ route('users') }}"class= "btn btn-primary btn-lg w-100 m-2">المستخدمين</a>
            </div>
            <div class="col w-50">
                <a href="{{ route('publisher_view')  }}"class= "btn btn-primary btn-lg w-100 m-2">الناشرون</a>
            </div>
        </div>
        <div class="row w-100">
            <div class="col w-50">
                <a href="{{ route('show_request') }}"class= "btn btn-primary btn-lg w-100 m-2">طلبات</a>
            </div>
            <div class="col w-50">
                <a href="{{ route('admin_show_restrict') }}"class= "btn btn-primary btn-lg w-100 m-2">المقالات المقيدة </a>
            </div>
        </div>
    </div>
@endsection
