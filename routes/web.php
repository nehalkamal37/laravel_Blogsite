<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

Route::get('/', [HomeController::class,'index']);

});

Route::prefix('dashboard')
->middleware(['auth','verified','dashaccess'])
->as('dashboard.')
->group(function(){
    Route::get('/',function(){
        return view('dashboard');
    })->name('main');

    Route::resources([
        'settings'=>SettingsController::class,
        'users'=>UserController::class,
        'categories'=>CategoryController::class,
        'posts'=>PostsController::class,
    ]);

    Route::get('users/restore/{user}',[UserController::class,'restore'])->name('users.restore');
    Route::get('users/erase/{user}',[UserController::class,'erase'])->name('users.erase');

    Route::get('categories/restore/{cat}',[CategoryController::class,'restore'])->name('categories.restore');
    Route::get('categories/erase/{cat}',[CategoryController::class,'erase'])->name('categories.erase');


    Route::get('posts/restore/{post}',[PostsController::class,'restore'])->name('posts.restore');
    Route::get('posts/erase/{post}',[PostsController::class,'erase'])->name('posts.erase');

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
