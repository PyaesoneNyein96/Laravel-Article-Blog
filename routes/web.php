<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeFeedController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;



Route::get('/',[
    HomeFeedController::class,'index'
]);

Route::get('/feed',[
    HomeFeedController::class,'index'
]);

Route::get('/feed/detail/{id}',[
    HomeFeedController::class,'detail',
]);

Route::get('/feed/delete/{id}',[
    HomeFeedController::class,'postDelete'
]);

//Create Post ---
Route::get('feed/add',[
    CategoryController::class, 'add'
]);
Route::post('/feed/add',[
    HomeFeedController::class, 'createPost'
]);
//comment delete
Route::get("/detail/delete/{id}",[
    CommentController::class, 'delCmt'
]);
Route::post('/detail/cmtadd',[
    CommentController::class, 'createComment'
]);

// Route::post('/detail/createcomment',[
//     comment
// ])






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
