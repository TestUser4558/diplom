<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EqipController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UseController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\MiddleMiddleware;
use Illuminate\Support\Facades\Route;


Route::fallback([MainController::class, 'index']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'loginHandle'])->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('cabinet');

    Route::get('/user/changePass', [UserController::class, 'changePassUser'])->name('user.changepass');
    Route::post('/user/changePass', [UserController::class, 'changePassUserHandle'])->name('user.changepass');

    Route::get('/eqips', [EqipController::class, 'index'])->name('eqips');
    Route::get('/eqips/{eqip}', [EqipController::class, 'info'])->name('eqip.info');

    Route::get('/pdf/{eqip}', [PDFController::class, 'generate'])->name('pdf');
});

Route::middleware(['auth', MiddleMiddleware::class])->group(function () {
    Route::get('/eqip/create', [EqipController::class, 'create'])->name('eqip.create');
    Route::post('/eqip/create', [EqipController::class, 'store']);
    Route::get('/eqips/edit/{eqip}', [EqipController::class, 'edit'])->name('eqip.edit');
    Route::post('/eqips/edit/{eqip}', [EqipController::class, 'update']);
    Route::get('/eqips/delete/{eqip}', [EqipController::class, 'delete'])->name('eqip.delete');
    Route::get('/eqips/acess/{eqip}', [EqipController::class, 'setAcess'])->name('eqip.acess');
    Route::post('/eqips/acess/{eqip}', [EqipController::class, 'setAcessHandle']);
    Route::post('/eqips/acessEnd/{eqip}', [EqipController::class, 'endAcess'])->name('eqip.acessEnd');
    Route::get('/eqips/check/{eqip}', [EqipController::class, 'check'])->name('eqip.check');
    Route::post('/eqips/check/{eqip}', [EqipController::class, 'checkHandle'])->name('eqip.check');

    Route::get('/uses/{use}', [UseController::class, 'info'])->name('eqip.useinfo');
    Route::get('/uses/{use}/card', [UseController::class, 'card'])->name('eqip.card');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get("/admin/users", [AdminController::class, 'users'])->name('users');
    Route::get("/admin/users/addUser", [AdminController::class, 'addUser'])->name('users.create');
    Route::post("/admin/users/addUser", [AdminController::class, 'addUserHandle'])->name('users.create');
    Route::get("/admin/users/updateUser/{user}", [AdminController::class, 'updateUser'])->name('users.update');
    Route::post("/admin/users/updateUser/{user}", [AdminController::class, 'updateUserHandle'])->name('users.update');
    Route::get("/admin/users/changePassUser/{user}", [AdminController::class, 'changePassUser'])->name('users.change');
    Route::post("/admin/users/changePassUser/{user}", [AdminController::class, 'changePassUserHandle'])->name('users.change');
    Route::get("/admin/users/delUser{user}", [AdminController::class, 'delUser'])->name('users.delete');
});
