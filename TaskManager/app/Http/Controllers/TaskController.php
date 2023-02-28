<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        //$task = Task::all();
       // dd($task);
        return view('index', [
            'tasks' => Task::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create()
    {
        $allstatus = [
          [
              'label' => 'Todo',
              'value' => 'Todo'
          ],
            [
                'label' => 'Completed',
                'value' => 'Completed'
            ],
            [
                'label' => 'In-progress',
                'value' => 'In-progress'
            ],
            [
                'label' => 'On-test',
                'value' => 'On-test'
            ],
        ];
        return view('create', compact('allstatus'));
    }

    public function store(Request $request)
    {
        $request -> validate([
            'title' => 'required'
        ]);
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('/');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $task = Task::find($id);
        $allstatus = [
            [
                'label' => 'Todo',
                'value' => 'Todo'
            ],
            [
                'label' => 'Completed',
                'value' => 'Completed'
            ],
            [
                'label' => 'In-progress',
                'value' => 'In-progress'
            ],
            [
                'label' => 'On-test',
                'value' => 'On-test'
            ],
        ];
        return view('edit', compact('task', 'allstatus'));
    }

    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $request -> validate([
            'title' => 'required'
        ]);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->save();
        return redirect()->route('/');
    }

    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task -> delete();
        return redirect()->route('/');
    }
    public function statusComplete($id)
    {
        $task = Task::find($id);
        if($task['status'] !== "Completed")
        {
            $task['status'] = "Completed";
        }
        $task->save();
        return back();
    }
}
