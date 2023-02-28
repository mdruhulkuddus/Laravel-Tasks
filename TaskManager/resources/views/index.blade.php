@extends('welcome')

@section('content')
    <nav class="navbar navbar-light bg-light">
        <form class="container-fluid">
            <button class="btn btn-secondary btn-lg me-2 float-start" type="button">
                All  Task
            </button>
            <a href="{{ route('task.create') }}" class="btn btn-info float-end" >
                <i class="fa fa-plus-circle"></i> Create Task
            </a>
        </form>
    </nav>
    @foreach($tasks as $task)
        <div class="card mt-2">
            <h5 class="card-header">
                @if($task -> status === "Completed")
                <del>{{ $task->title }} </del>
                @else
                    {{ $task->title }}
                @endif
                &nbsp; <span class="badge rounded-pill text-bg-secondary" style="font-size: 10px"> {{ $task->created_at->diffForHumans() }}</span>
            </h5>
            <div class="card-body">
                <div class="card-text col-md-12">
                    <div class="float-start col-md-10">
                        @if($task -> status === "Completed")
                        <del>{{ $task -> description }}</del>
                        @else
                            {{ $task -> description }}
                        @endif
                        <br>
                        @if($task -> status === "Todo")
                        <span class="badge rounded-pill text-bg-warning">Todo</span>
                        @elseif($task -> status === "In-progress")
                            <span class="badge rounded-pill text-bg-info">In-progress</span>
                        @elseif($task -> status === "On-test")
                            <span class="badge rounded-pill text-bg-info">On-test</span>
                        @else
                            <span class="badge rounded-pill text-bg-success">Completed</span>
                        @endif
                        <small>Last updated ~ {{ $task->updated_at->diffForHumans() }}</small>
                    </div>
                    <div class="float-end col-md-2">
                        <a href="{{ route('task.edit', $task -> id) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('task.destroy', $task -> id) }}" method="post" style="display: inline"  onsubmit="return confirm('Are you sure to delete this task ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger "><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @if($task -> status !== "Completed")
                        <a href="{{ route('task.status.complete', $task -> id) }}" class="btn btn-success"><i class="fas fa-check"></i></a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    @endforeach

    @if(count($tasks) === 0)
        <div class="pt-5 text-center">
            <div class="alert alert-warning" role="alert">
                No task found. Create new task
            </div>
        </div>
    @endif
@endsection
