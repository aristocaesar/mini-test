<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('/news', function () {
    return redirect('/');
});

Route::get('/news/{id}', function ($id) {
    return view('single', [
        "title" => "asu",
        "author" => "Aristo Caesar",
        "date" => date('d-m-y'),
        "body" => "Amet ex labore voluptate anim nostrud aute ipsum dolor nisi deserunt quis commodo qui. Est reprehenderit nisi velit dolore non labore laborum ullamco ex Lorem cupidatat aute. Labore tempor sint reprehenderit ut ex voluptate. Incididunt mollit ullamco minim id. Aliquip tempor cillum dolor ut consectetur enim ex est pariatur sit laborum quis."
    ]);
});

Route::prefix('/author')->group(function () {
    Route::get('/', function () {
        return view('auth.author.login');
    });

    Route::get('/register', function () {
        return view('auth.author.register');
    });

    Route::get('/dashboard', function () {
        return view('author.dashboard');
    });

    Route::get('/article', function () {
        return view('author.list');
    });

    Route::get('/add-article', function () {
        return view('author.add');
    });

    Route::get('/edit-article', function () {
        return view('author.edit');
    });
});

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return view('auth.admin.login');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

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
