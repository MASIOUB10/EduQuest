<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Admin\RequestController;
use App\Models\Course; // Import the Course model


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('student.indexx');
});

// Route::get('/courses', function () {
//     $courses = Course::all(); // Fetch all courses from the database
//     return view('student.courses', ['courses' => $courses]);
// });


// Authenticated routes
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class)->except(['show']);
    Route::get('/courses', [CourseController::class, 'index'])->name('admin.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


});

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    //users route
    Route::resource('users', UserController::class)->except(['show']);
    //courses route
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/destroy/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
    //validition route
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/create', [RequestController::class, 'create'])->name('requests.create');
    Route::post('/requests/store', [RequestController::class, 'store'])->name('requests.store');
    Route::get('/requests/edit/{id}', [RequestController::class, 'edit'])->name('requests.edit');
    Route::put('/requests/update/{id}', [RequestController::class, 'update'])->name('requests.update');
    Route::delete('/requests/destroy/{id}', [RequestController::class, 'destroy'])->name('requests.destroy');
    Route::get('/requests/{id}', [RequestController::class, 'show'])->name('requests.show');
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    // Module routes
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules.index');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');
    Route::post('/modules/store', [ModuleController::class, 'store'])->name('modules.store');
    Route::get('/modules/edit/{id}', [ModuleController::class, 'edit'])->name('modules.edit');
    Route::put('/modules/update/{id}', [ModuleController::class, 'update'])->name('modules.update');
    Route::delete('/modules/destroy/{id}', [ModuleController::class, 'destroy'])->name('modules.destroy');

    // Lesson routes
    Route::get('/modules/{module}/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/modules/{module}/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/modules/{module}/lessons/store', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/lessons/edit/{id}', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/lessons/update/{id}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/lessons/destroy/{id}', [LessonController::class, 'destroy'])->name('lessons.destroy');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/courses', [StudentController::class, 'studentIndex'])->name('student.courses.index');
    Route::get('/student/courses/{id}', [StudentController::class, 'show'])->name('student.courses.show');
    Route::post('/student/courses/enroll/{id}', [StudentController::class, 'enroll'])->name('student.courses.enroll');

    Route::get('/my-courses', [StudentController::class, 'myCourses'])->name('student.myCourses');

    Route::get('/courses/{course}/modules', [ModuleController::class, 'showModules'])->name('student.modules');
    // Route::get('/modules/{module}/lessons', [LessonController::class, 'showLessons'])->name('student.lessons');
    // Route::get('/lessons/{lesson}', [LessonController::class, 'showLesson'])->name('student.lesson.show');
    Route::get('lessons/{lesson}', [LessonController::class, 'show'])->name('student.lessons.show');

    
});



require __DIR__.'/auth.php';
