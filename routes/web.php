<?php


use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return view('about');
// });
Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', [contactController::class, 'index'])->name('contact'); 
Route::get('/services', [serviceController::class, 'index']); 

// Route::get('/about', function(){
//     return view('about');
// })->middleware('checkage'); 

Route::get('home', function () {
    echo "welcome to home page"; 
});

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    // $users = User::all(); 
    // return view('dashboard', compact('users'));
    // $users = DB::table('users')->get();
    // $students = Student::all(); 
    // return view('student.list', compact('students'));

    return view('student.list')->with('students', Student::orderBy('created_at', 'DESC')->get()); 
})->name('dashboard');

// Route::get('student/add', function () {
//     return view('student.add');
// })->name('student.add');


// Route::get('student/view', function () {
//     return view('student.view');
// })->name('student.view');
Route::get('student/add', [StudentController::class, 'showpage'])->name('student.add'); 
Route::post('student/add', [StudentController::class, 'add'])->name('student.add'); 
Route::get('student/list', [StudentController::class, 'list'])->name('student.list'); 
Route::get('student/{id}/profile', [StudentController::class, 'profile'])->name('student.profile'); 
Route::get('student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit'); 
Route::put('student/update', [StudentController::class, 'update'])->name('student.update'); 
Route::delete('student/delete', [StudentController::class, 'delete'])->name('student.delete'); 


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
