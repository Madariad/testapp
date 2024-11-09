<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ModuleCuntroller;
use App\Http\Controllers\UserGroupController;
use App\Models\Group;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function ()  {
    
    Route::get('login', [AuthController::class, 'loginPage'])->name('loginPage');
    
    Route::get('register', [AuthController::class, 'registerPage'])->name('registerPage');
    
    Route::post('login', [AuthController::class, 'login'])->name('login');
    
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth:web')->group(function (){
    Route::get('/', function () {
        return view('pages.user.index');
    })->name('mainPageUser');


    Route::get('groups', [UserGroupController::class, 'index'])->name('myGruopPage');
    Route::get('groups/{id}', [UserGroupController::class, 'show'])->name('showGroup');


    Route::post('join', [UserGroupController::class, 'join'])->name('join-group');



    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
});


Route::middleware('auth:teachers')->group(function (){
    Route::get('/dashboard', function (Request $request) {
        $groups = Group::where('teacher_id', $request->user()->id)->get();
        return view('pages.teacher.index', ['groups' => $groups]);
    })->name('mainPage');

    Route::resource('teacherGroup', GroupController::class);

    Route::post('create-module/{id}', [ModuleCuntroller::class, 'store']);


    // Route::get('group', [UserGroupController::class, 'index'])->name('myGruopPage');



    Route::get('logoutTeachere', [AuthController::class, 'logoutTeachere'])->name('logoutTeachere');
    
});


