@php
    use Illuminate\Support\Facades\Auth;
    $user_id = Auth::id();
@endphp
@extends('userDashboard.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-sm mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Blog</h3>
                        <h5 class="text-center text-success">{{session('message')}}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('new-blog') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" value="{{ Auth::user()->name }}" disabled  />
                                <input class="form-control" id="inputEmail" type="hidden" name="author_id" value="{{ $user_id }}" />
                                <label for="inputEmail">Author</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" name="title" placeholder="Title" />
                                <label for="inputEmail">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" name="slug" placeholder="slug" />
                                <label for="inputEmail">Slug</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="description" id="editor1" cols="50" rows="50"></textarea>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="file" name="image"/>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input type="submit" class="form-control btn btn-success" value="submit" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
