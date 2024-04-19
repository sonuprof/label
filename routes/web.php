<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PrintController;



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
Route::get('/dashboard', [BrandController::class, 'dashboard'])->name('dashboard');
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


// UserController

//ProductController
Route::get('/add-product', [ProductController::class, 'index'])->name('add-product');
Route::post('/save-product', [ProductController::class, 'create'])->name('save-product');
Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
Route::any('/update-product', [ProductController::class, 'update'])->name('update-product');
Route::get('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete-product');
Route::get('/get-categories', [ProductController::class, 'getCategories'])->name('get.categories');





//PrintController
Route::get('/add-print', [PrintController::class, 'index'])->name('add-print');
Route::post('/save-print', [PrintController::class, 'create'])->name('save-print');
// Route::get('/edit-print/{id}', [PrintController::class, 'edit'])->name('edit-print');
// Route::any('/update-print', [PrintController::class, 'update'])->name('update-print');
// Route::get('/delete-print/{id}', [PrintController::class, 'destroy'])->name('delete-print');
Route::get('/get-categories1', [PrintController::class, 'getCategories'])->name('get.categories1');
Route::get('/get-product', [PrintController::class, 'getProduct'])->name('get.product_name');



// LoginController 
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::match(['get', 'post'],'/loginuser',[LoginController::class,'loginuser'])->name('loginuser');
// LoginController 


Route::get('/index', function () {
    return view('index');
});
Route::get('/index2', function () {
    return view('index2');
});
Route::get('/index3', function () {
    return view('index3');
});
Route::get('/index4', function () {
    return view('index4');
});
Route::get('/index5', function () {
    return view('index5');
});
Route::get('/index6', function () {
    return view('index6');
});

Route::get('/generate-pdf', [PrintController::class, 'generatePdf'])->name('generate.pdf');
