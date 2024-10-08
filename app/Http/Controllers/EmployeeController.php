<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'Admins.employees.';
    public function index()
    {
        $employees = Employee::latest('id')->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $data = $request->all();
        try {
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
            }
            Employee::create($data);
            return redirect(route('employees.index'))->with('success', true);
        } catch (\Throwable $th) {
            if(!empty($data['profile_picture']) && Storage::exists($data['profile_picture'])){
                Storage::delete($data['profile_picture']);
            }
            return redirect(route('employees.index'))->with('success', false);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        // dd($employee->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $oldImage = $employee->profile_picture;
        $data = $request->all();
        $data['is_active'] ??= 0;
        try {
            if ($request->hasFile('profile_picture')) {
                $data['profile_picture'] = Storage::put('employees', $request->file('profile_picture'));
            }
            $employee->update($data);
            if ($request->hasFile('profile_picture') && !empty($oldImage) && Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            return redirect(route('employees.index'))->with('success', true);
        } catch (\Throwable $th) {
            if(!empty($data['profile_picture']) && Storage::exists($data['profile_picture'])){
                Storage::delete($data['profile_picture']);
            }
            return redirect(route('employees.index'))->with('success', false);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            return redirect(route('employees.index'))->with('success', true);
        } catch (\Throwable $th) {
            return redirect(route('employees.index'))->with('success', false);
        }

    }
    public function forceDestroy(Employee $employee)
    {
        try {
            $employee->forceDelete();
            if (!empty($employee->profile_picture) && Storage::exists($employee->profile_picture)) {
                Storage::delete($employee->profile_picture);
            }
            return redirect(route('employees.index'))->with('success', true);
        } catch (\Throwable $th) {
            return redirect(route('employees.index'))->with('success', false);
        }

    }
}
