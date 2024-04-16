<?php
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

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Setting\BasicInfoController;
use App\Http\Controllers\Admin\Setting\LogoController;
use App\Http\Controllers\Admin\Subscribe\SubscribeController;
use App\Http\Controllers\Admin\SocialMedia\SocialMediaController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\User\RoleController;
use Illuminate\Support\Facades\Route;
use Ibnujakaria\FileManager\Support\Facades\FileManager;



Route::get('/forgot-password', [LoginController::class, 'showResetForm'])->name('password.request');
Route::post('/forgot-password', [LoginController::class, 'reset'])->name('password.email');

Route::group(['prefix' => 'admin-panel', 'as' => 'admin.'], function () {
    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
        Route::post('/login', [LoginController::class, 'store'])->name('auth.login.process');
        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
        Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('auth.register');
        Route::post('/register', [LoginController::class, 'register'])->name('auth.register.process');
    });

    Route::middleware('auth:web', 'permission:admin access')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        FileManager::routes();

        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('roles/{role}/permissions', PermissionController::class);
       

        Route::name('blog.')->group(function () {
            Route::resource('blog/categories', CategoryController::class);
            Route::resource('blog/tags', TagController::class);
            Route::resource('blog/posts', PostController::class);
        });

     
        Route::resource('subscribes', SubscribeController::class);
        Route::resource('social', SocialMediaController::class);
        
        

        Route::prefix('settings')
            ->name('settings.')
            ->middleware('permission:settings')
            ->group(function () {
                Route::get('basic-info', [BasicInfoController::class, 'edit'])->name('basic-info.edit');
                Route::put('basic-info', [BasicInfoController::class, 'update']);
                Route::get('logo', [LogoController::class, 'edit'])->name('logo.edit');
                Route::put('logo', [LogoController::class, 'update'])->name('logo.update');
            });
    });
});
