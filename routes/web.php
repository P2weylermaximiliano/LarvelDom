<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssistController;
use app\Http\Controllers\ProductController;
use App\Http\Controllers\ParameterController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Route::resource('products', ProductController::class);
Route::resource('students', StudentController::class);
//route::get('details',[ProductController::class,'details']);
//route::post('insertProducts',[ProductController::class,'insertProducts']);
//route::get('producjson',[ProductController::class,'producjson']);
//route::get('assists/{id}',[AssistController::class,'getassist']);
route::get('Log',[Login::class])->middleware('Login');
route::post('assit',[AssistController::class,'assiten'])->name('assit');

Route::get('/assistencia', function () {
    return view('Asistencia');
})->name('assiste');

Route::get('/dias', function () {
    return view('dias');
})->name('dias');

route::get('PonerAssist',[AssistController::class,'PonerAssistencia'])->name('PonerAssist');
route::post('Ponerdias',[ParameterController::class,'Ponerdias'])->name('Ponerdias');

route::get('PDF',[StudentController::class,'crearPDF'])->name('PDF');

route::post('Filtrardato',[StudentController::class,'filtrar'])->name('filtrardato');

route::get('logueo',[StudentController::class,'logueo'])->name('logueo');


require __DIR__.'/auth.php';
