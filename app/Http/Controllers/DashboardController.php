<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Module;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('student')){
            return view('student.indexx');
        } elseif(Auth::user()->hasRole('teacher')){
            // Fetch courses and modules associated with the teacher
            $teacherId = Auth::user()->id;
            $courses = Course::where('teacher_id', $teacherId)->get();
            $modules = Module::whereIn('course_id', $courses->pluck('id'))->get();

            return view('teacher.modules.index', compact('courses', 'modules'));
        } elseif(Auth::user()->hasRole('admin')){
            $courses = Course::all(); 
            return view('admin.index', compact('courses'));
        }
    }
}
