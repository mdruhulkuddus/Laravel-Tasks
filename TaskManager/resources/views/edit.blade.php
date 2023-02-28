@extends('welcome')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid">
            <button class="btn btn-warning me-2 float-start" type="button">Edit Task</button>
            <a href="{{ route('/') }}" class="btn btn-info float-end" > All Task</a>
        </form>
    </nav>
    <div class="card mt-2 card-body bg-light">
        <form action="{{ route('task.update', $task -> id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control"  name="title" value="{{ $task -> title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control"  rows="2" name="description" >{{ $task -> description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
{{--                    <option value="{{ $status[$status->] }}">{{ $status['value'] }}</option>--}}
                    @foreach($allstatus as $status)
                    <option value="{{ $status['value'] }}" {{ $task->status === $status['value'] ? 'selected' : ''  }}>{{ $status['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-1">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('/') }}" class="btn btn-outline-success">Cancel</a>
            </div>
        </form>
    </div>

@endsection
