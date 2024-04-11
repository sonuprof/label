<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CategoryController;



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






Route::get('/dashboard', function () {
    return view('pages.dashboard');
});



// Route::middleware('checkSession')->group(function () {
       



//IngredientController
Route::get('/add-ingredient', [IngredientController::class, 'index'])->name('add-ingredient');
Route::post('/save-ingredient', [IngredientController::class, 'create'])->name('save-ingredient');
Route::get('/edit-ingredient/{id}', [IngredientController::class, 'edit'])->name('edit-ingredient');
Route::any('/update-ingredient', [IngredientController::class, 'update'])->name('update-ingredient');
Route::get('/delete-ingredient/{id}', [IngredientController::class, 'destroy'])->name('delete-ingredient');


// IngredientController 

//BrandController
Route::get('/add-brand', [BrandController::class, 'index'])->name('add-brand');
Route::post('/save-brand', [BrandController::class, 'create'])->name('save-brand');
Route::get('/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit-brand');
Route::any('/update-brand', [BrandController::class, 'update'])->name('update-brand');
Route::get('/delete-brand/{id}', [BrandController::class, 'destroy'])->name('delete-brand');

//CategoryController
Route::get('/add-category', [CategoryController::class, 'index'])->name('add-category');
Route::post('/save-category', [CategoryController::class, 'create'])->name('save-category');
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit-category');
Route::any('/update-category', [CategoryController::class, 'update'])->name('update-category');
Route::get('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('delete-category');



// LoginController 
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::match(['get', 'post'],'/loginuser',[LoginController::class,'loginuser'])->name('loginuser');
// LoginController 



