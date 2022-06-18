<?php

use App\Http\Livewire\Pages\Tasks\Taskcreate;
use App\Http\Livewire\Pages\Tasks\Tasklist;
use App\Http\Livewire\Pages\Tasks\Taskshow;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/tasks/create/{id?}', Taskcreate::class)->name('tasks.create');
    Route::get('/tasks/{id}', Taskshow::class)->name('tasks.show');
    Route::get('/tasks', Tasklist::class)->name('tasks.index');
});

require __DIR__.'/auth.php';
