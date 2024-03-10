<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Exports\CoursesExport;
use App\Http\Controllers\CourseController;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CoursesImport;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('HomePage');
});
Route::get("/userList",[UserController::class,'index']);
Route::get('/login',[UserController::class,'authLogin']);
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/register',[UserController::class,'authregister'])->name('register');
Route::post('/register',[UserController::class,'register']);
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('/courses/export', function () {
    return Excel::download(new CoursesExport, 'courses.xlsx');
})->name('courses.export');


Route::post('/courses/import', function (Request $request) {
    Excel::import(new CoursesImport, $request->file('file'));
    return redirect('/')->with('success', 'Courses imported successfully');
})->name('courses.import');

Route::get('/course',[CourseController::class,'index'])->name('course.index');

