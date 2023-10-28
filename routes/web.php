<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;

use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\BlogController;

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


/**
 * Admin routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [LoginController::class, 'showAdminLoginForm'])->name('login_page');
    Route::post('/login', [LoginController::class, 'adminLogin'])->name('login')->middleware('admin');

    Route::group(["middleware" => ["auth:admin", "admin"]], function () {
        Route::post('/logout', [LoginController::class, 'adminLogout'])->name('logout');
        Route::get("/dashboard", [AdminDashboardController::class, "index"])->name("dashboard");
        Route::get("users/index", [AdminUserController::class, "usersList"])->name("users.list");
        Route::get("changestatus/{id}", [AdminUserController::class, "changeStatus"])->name("users.changeStatus");
        Route::get("blog/list", [AdminBlogController::class, "blog"])->name("blogs.list");
    });
});

/**
 * User routes
 */

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('register', [UserRegisterController::class,'register'])->name('register');
    Route::post('register', [UserRegisterController::class,'store'])->name('register.store');
    Route::get('/login', [UserLoginController::class, 'showUserLoginForm'])->name('login_page');
    Route::post('/login', [UserLoginController::class, 'userLogin'])->name('login')->middleware('user');

    Route::group(["middleware" => ["auth:web", "user"]], function () {
        Route::post('/logout', [UserLoginController::class, 'userLogout'])->name('logout');
        Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");

        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function () {
            Route::get("/", [BlogController::class, "index"])->name("index");
            Route::get("/create", [BlogController::class, "create"])->name("create");
            Route::post("/create/store", [BlogController::class, "store"])->name("store");
            Route::get("/edit/{id}", [BlogController::class, "edit"])->name("edit");
            Route::post("/edit/{id}", [BlogController::class, "update"])->name("update");
            Route::get("/delete/{id}", [BlogController::class, "delete"])->name("delete");
        });
    });
});
