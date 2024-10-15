<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\Passport;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'Admins.students.';
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view(self::PATH_VIEW . __FUNCTION__, compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact(['subjects', 'classrooms']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        DB::beginTransaction();
        try {
            $student = Student::create([
                'name' => $request->name,
                'email' => $request->email,
                'classroom_id' => $request->classroom_id,
            ]);

            Passport::create([
                'student_id' => $student->id,
                'passport_number' => $request->passport_number,
                'issued_date' => $request->issued_date,
                'expiry_date' => $request->expiry_date,
            ]);

            $student->subjects()->attach($request->subjects);

            DB::commit();

            return redirect(route('students.index'))->with('success', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect(route('students.index'))->with('error', 'Thêm mới không thành công');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('classroom', 'passport', 'subjects');
        return view(self::PATH_VIEW . __FUNCTION__, compact(['student']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $classrooms = Classroom::all();  
        $subjects = Subject::all();      

        return view(self::PATH_VIEW . __FUNCTION__, compact('student', 'classrooms', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        DB::beginTransaction();
        try {
            $student->update([
                'name' => $request->name,
                'email' => $request->email,
                'classroom_id' => $request->classroom_id,
            ]);

            $student->passport->update([
                'passport_number' => $request->passport_number,
                'issued_date' => $request->issued_date,
                'expiry_date' => $request->expiry_date,
            ]);

            $student->subjects()->sync($request->subjects);

            DB::commit();

            return back()->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Cập nhật không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        DB::beginTransaction();
        try {
            if ($student->passport) {
                $student->passport->delete();
            }

            $student->subjects()->detach();

            $student->delete();

            DB::commit();

            return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Đã xảy ra lỗi khi xóa sinh viên: ' . $e->getMessage());
        }
    }
}
