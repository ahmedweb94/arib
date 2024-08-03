<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\Http\Requests\EmployeeRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EmployeeController extends Controller
{

    protected $filter;
    public function __construct(UserFilter $filter)
    {
        $this->filter = $filter;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::with('manager')->employee()->filter($this->filter)->paginate(10);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments=Department::get();
//        $managers=User::manager()->get();
        $managers=User::whereNull('user_id')->get();
        return view('users.create',compact('departments','managers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        $user=User::create(Arr::except($request->validated(),$request->image));
        if ($request->image) {
            $user->addMedia($request->image)->toMediaCollection('images');
        }
        return redirect(route('employee.index'))->with('success','created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $employee)
    {
        $departments=Department::get();
        $managers=User::whereNull('user_id')->get();
        return view('users.create',compact('departments','managers','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, User $employee)
    {
        $employee->update(Arr::except($request->validated(),$request->image));
        if ($request->image) {
            $employee->clearMediaCollection('images');
            $employee->addMedia($request->image)->toMediaCollection('images');
        }
        return redirect(route('employee.index'))->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        $employee->delete();
        return response(['status'=>200,'message'=>'deleted successfully'],200);
//        return back()->with('success','deleted successfully');
    }
}
