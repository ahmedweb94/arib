<?php

namespace App\Http\Controllers;

use App\Filters\TaskFilter;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Arr;

class TasksController extends Controller
{

    protected $filter;
    public function __construct(TaskFilter $filter)
    {
        $this->middleware('manager')->only(['create','store']);
        $this->filter = $filter;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks=Task::with('manager','employee')->filter($this->filter)
            ->when(auth()->user()->user_id,function ($q){
                $q->where('employee_id',auth()->id());
            })
            ->paginate(10);
        $employees=User::employee()->where('user_id',auth()->id())->get();
        return view('tasks.index',compact('tasks','employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees=User::employee()->where('user_id',auth()->id())->get();
        return view('tasks.create',compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task=Task::create(array_merge($request->validated(),['user_id'=>auth()->id()]));
        return redirect(route('task.index'))->with('success','created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show',$task->load('manager','employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $employees=User::employee()->where('user_id',auth()->id())->get();
        return view('tasks.create',compact('employees','task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task=$task->update($request->validated());
        return redirect(route('task.index'))->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

    }
}
