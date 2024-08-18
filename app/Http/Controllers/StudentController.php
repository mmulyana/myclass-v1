<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();

        return Inertia::render('Students/Index', [
            'students' => StudentResource::collection($students)
        ]);
    }
}
