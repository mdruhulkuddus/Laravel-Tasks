@extends('userDashboard.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-sm mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Edit Blog</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-blog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" value="{{ Auth::user()->name }}" disabled  />
                                <input class="form-control" id="inputEmail" type="hidden" name="author" value="{{ Auth::user()->name }}" />
                                <input class="form-control" id="inputEmail" type="hidden" name="id" value="{{ $blog -> id }}" />
                                <label for="inputEmail">Author</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" value="{{ $blog -> title }}" name="title" placeholder="Title" />
                                <label for="inputEmail">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" value="{{ $blog -> slug }}" name="slug" placeholder="slug" />
                                <label for="inputEmail">Slug</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="description" id="editor1" cols="50" rows="50">{{ $blog -> description }}</textarea>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="file" name="image"/>
                                <img src="{{ asset($blog->image) }}" height="80" width="80">
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <input type="submit" class="form-control btn btn-success" value="Update" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
