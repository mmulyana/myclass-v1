<?php

namespace App\Http\Controllers;

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
}
