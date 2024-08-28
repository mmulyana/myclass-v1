<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\ClassResource;
use App\Http\Resources\StudentResource;
use App\Models\Classes;
use App\Models\Student;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index() {
        $students = Student::paginate(10);

        return Inertia::render('Students/Index', [
            'students' => StudentResource::collection($students)
        ]);
    }

    public function create() {
        $classes = ClassResource::collection(Classes::all());

        return Inertia::render('Students/Create', [
            'classes' => $classes
        ]);
    }

    public function store(StoreStudentRequest $request) {
        Student::create($request->validated());

        return redirect()->route('students.index');
    }

    public function edit(Student $student) {
        $classes = ClassResource::collection(Classes::all());

        return Inertia::render('Students/Edit', [
            'classes' => $classes,
            'student' => StudentResource::make($student)
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student) {
        $student->update($request->validated());

        return redirect()->route('students.index');
    }

    public function destroy(Student $student) {
        $student->delete();

        return redirect()->route('students.index');
    }
}
