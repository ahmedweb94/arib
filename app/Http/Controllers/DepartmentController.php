<?php

namespace App\Http\Controllers;

use App\Filters\DepartmentFilter;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DepartmentController extends Controller
{

    protected $filter;

    public function __construct(DepartmentFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::withCount('employees')->withSum('employees', 'salary')->filter($this->filter)->paginate(10);
        return view('departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $department = Department::create($request->validated());
        return redirect(route('department.index'))->with('success', 'created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.create', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        $department = $department->update($request->validated());
        return redirect(route('department.index'))->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if ($department->employees()->count()) {
            return response(['status' => 400, 'message' => " Can't Delete This Item It Have Related Items In The System"], 200);
        }
        $department->delete();
        return response(['status' => 200, 'message' => 'deleted successfully'], 200);
    }
}
