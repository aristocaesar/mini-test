<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ArticleController::class, 'getAll']);

Route::prefix('/news')->group(function () {
    Route::get('/', function () {
        return redirect('/');
    });

    Route::get('{id}', [ArticleController::class, 'getById'])->name('news.show');
});

Route::post('/comment/{id}', [ArticleController::class, 'comment']);

Route::prefix('/author')->group(function () {
    Route::get('/', function () {
        return view('auth.author.login');
    });

    Route::post('/', [AuthorController::class, 'authenticate']);

    Route::get('/register', function () {
        return view('auth.author.register');
    });

    Route::post('/register', [AuthorController::class, 'register']);

    Route::get('/dashboard', function () {
        return view('author.dashboard');
    })->middleware('redirect.author');

    Route::get('/article', [AuthorController::class, 'getAll'])->middleware('redirect.author');

    Route::get('/add-article', function () {
        return view('author.add');
    })->middleware('redirect.author');

    Route::post('/add-article', [AuthorController::class, 'store'])->middleware('redirect.author');

    Route::get('/edit-article', [AuthorController::class, 'getById'])->middleware('redirect.author');

    Route::post('/edit-article', [AuthorController::class, 'update'])->middleware('redirect.author');

    Route::get('/delete-article', [AuthorController::class, 'delete'])->middleware('redirect.author');

    Route::get('/logout', [AuthorController::class, 'logout']);
});

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('auth.admin.login');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware('redirect.admin');

    Route::get('/article', function () {
        return view('admin.list');
    });

    Route::get('/add-article', function () {
        return view('admin.add');
    });

    Route::get('/edit-article', function () {
        return view('admin.edit');
    });

    Route::get('/list-author', function () {
        return view('admin.author');
    });
});
