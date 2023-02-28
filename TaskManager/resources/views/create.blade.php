@extends('welcome')

@section('content')
{{--    <div>--}}
{{--        <div class="float-start">--}}
{{--            <h4>Create New Task</h4>--}}
{{--        </div>--}}
{{--        <div class="float-end">--}}
{{--            <a href="{{ route('/') }}" class="btn btn-primary">--}}
{{--                All Task--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="clearfix"></div>--}}
{{--    </div>--}}
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid">
            <button class="btn btn-success me-2 float-start" type="button">Create New Task</button>
            <a href="{{ route('/') }}" class="btn btn-info float-end" > All Task</a>
        </form>
    </nav>
    <div class="card mt-2 card-body bg-light">
        <form action="{{ route('task.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control"  name="title" placeholder="Input Title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control"  rows="2" name="description" placeholder="Input Description"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    @foreach($allstatus as $status)
                    <option value="{{ $status['value'] }}">{{ $status['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('/') }}" class="btn btn-outline-primary">Cancel</a>
            </div>
        </form>
    </div>

@endsection
