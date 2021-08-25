<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
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
Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'can:view,folder'],function(){
        Route::get('/folders/{folder}/tasks',[TaskController::class,'index'])->name('tasks.index');
        Route::get('/folders/{folder}/tasks/create',[TaskController::class,'showCreateForm'])->name('tasks.create');
        Route::post('/folders/{folder}/tasks/create',[TaskController::class,'create']);
        Route::get('/folders/{folder}/tasks/{task_id}/edit',[TaskController::class,'showEditForm'])->name('tasks.edit');
        Route::post('/folders/{folder}/tasks/{task_id}/edit',[TaskController::class,'edit']);
    });
    Route::get('/folders/create',[FolderController::class,'showCreateForm'])->name('folders.create');
    Route::post('/folders/create',[FolderController::class,'create']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[App\Http\Controllers\Auth\RegisterController::class,'register']);

Auth::routes();
