<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
// 以下のuseはmiddlewareエラー回避のため追記したもの
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// キャッシュリストのルート
Route::get('/generate-cache-list', function () {
    Artisan::call('php generate-cache-list.php');
    return 'Cache list generated.';
});

// 各種ページのビューへのアクセスを可能にする
Route::get('/setting', function () {
    if (Auth::check()) {
        return view('setting');
    } else {
        return redirect('/login');
    }
})->name('setting');

Route::get('/add-task', function () {
    if (Auth::check()) {
        return view('add-task');
    } else {
        return redirect('/login');
    }
})->name('add-task');

Route::get('/schedule', function () {
    if (Auth::check()) {
        return view('schedule');
    } else {
        return redirect('/login');
    }
})->name('schedule');

// Route::get('/my-tasks', function () {
//     if (Auth::check()) {
//         return view('my-tasks');
//     } else {
//         return redirect('/login');
//     }
// })->name('my-tasks');

// これはミドルウェアを使ったRoute::get()設定。自分の課題リストページに飛ぶ
Route::get('/my-tasks', [TaskController::class, 'index'])->middleware('auth')->name('my-tasks');

// ミドルウェアの直接指定(Controllers/Auth内のmiddlewareがunknown method となることの回避)
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware('guest');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

// storeメソッドを呼び出すルートを設定
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');

// 課題削除のdeleteメソッド呼び出し
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
