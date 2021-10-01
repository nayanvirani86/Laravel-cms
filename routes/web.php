<?php

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

Auth::routes();


Route::prefix('administrator')->group(function(){

    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('admin.login');
    Route::get('/password/reset', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/reset', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'reset'])->name('admin.password.request.submit');
    Route::get('/password/reset/{token}', [App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'showResetForm'])->name('admin.password.reset');

    Route::post('/password/email', [App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('admin.password.email');

    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class,'login'])->name('admin.login.submit');

    Route::middleware(['auth:admin'])->group(function(){

       
     	Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class,'logout'])->name('admin.logout');

        Route::get('dashboard',[App\Http\Controllers\Admin\SuperAdminController::class,'index'])->name('admin.dashboard');

        Route::get('my-profile',[App\Http\Controllers\Admin\SuperAdminController::class,'profile'])->name('admin.profile');

        Route::patch('my-profile',[App\Http\Controllers\Admin\SuperAdminController::class,'updateProfile'])->name('admin.profile.update');

        Route::resource('role','App\Http\Controllers\Admin\RoleController',['names'=>[
        	'store' => 'admin.role.store',
            'index' => 'admin.role.index',
            'create' => 'admin.role.create',
            'destroy' => 'admin.role.destroy',
            'update' => 'admin.role.update',
            'show' => 'admin.role.show',
            'edit' => 'admin.role.edit',
        ]]);

        Route::resource('admins', 'App\Http\Controllers\Admin\AdminController', ['names' => [
            'store' => 'admin.admins.store',
            'index' => 'admin.admins.index',
            'create' => 'admin.admins.create',
            'destroy' => 'admin.admins.destroy',
            'update' => 'admin.admins.update',
            'show' => 'admin.admins.show',
            'edit' => 'admin.admins.edit',
        ]]);

        Route::resource('posts', 'App\Http\Controllers\Admin\PostController', ['names' => [
            'store' => 'admin.posts.store',
            'index' => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'destroy' => 'admin.posts.destroy',
            'update' => 'admin.posts.update',
            'show' => 'admin.posts.show',
            'edit' => 'admin.posts.edit',
        ]]);
        /*Route::resource('categories/{type}/', 'App\Http\Controllers\Admin\CategoryController', ['names' => [
            'store' => 'admin.categories.store',
            'create' => 'admin.categories.create',
            'update' => 'admin.categories.update',
            'edit' => 'admin.categories.edit',
            'destroy' => 'admin.categories.destroy',
            'show' => 'admin.categories.show',
            'index' => 'admin.categories.index',
            
        ]]);*/
        Route::post('categories/{type}',[\App\Http\Controllers\Admin\CategoryController::class,'store'])->name('admin.categories.store');
        Route::get('categories/{type}',[\App\Http\Controllers\Admin\CategoryController::class,'index'])->name('admin.categories.index');
        Route::get('categories/{type}/create',[\App\Http\Controllers\Admin\CategoryController::class,'create'])->name('admin.categories.create');
        Route::delete('categories/{type}/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'destroy'])->name('admin.categories.destroy');
        Route::patch('categories/{type}/{id}',[\App\Http\Controllers\Admin\CategoryController::class,'update'])->name('admin.categories.update');               
        Route::get('categories/{type}/{id}/edit',[\App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('admin.categories.edit');   
        
        Route::delete('media/{id}',[\App\Http\Controllers\Admin\MediaController::class,'destroy'])->name('admin.media.destroy');
        Route::post('media/upload',[\App\Http\Controllers\Admin\MediaController::class,'store'])->name('admin.media.store');
    });
});
Route::get('/{post_slug}',[App\Http\Controllers\HomeController::class, 'show'])->name('home.show');
Route::get('/{type?}/{item?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');