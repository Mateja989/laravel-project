<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserQuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AdminQuestionController;
use App\Http\Controllers\AdminTopicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserFollowController;
use App\Http\Controllers\QuestionReactionController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function() {
    return redirect()->route("home");
});
Route::get('/', function() {
    return redirect()->route("home");
});

Route::get('/questions',[QuestionController::class,'index'])->name('home');
Route::get('/unanswered',[QuestionController::class,'unanswered']);
Route::post('/questions/filter',[QuestionController::class,'filter']);
Route::get('/questions/{question:slug}',[QuestionController::class,'show']);
Route::get('/users',[UserController::class,'index']);
Route::get('/users/{user:username}',[UserController::class,'show']);
Route::get('/topics',[TopicController::class,'index']);
Route::get('/topics/{topic:slug}',[TopicController::class,'show']);
Route::get('/contact',[ContactController::class,'index']);
Route::post('/contact',[ContactController::class,'send'])->name('send.email');
Route::get('/tags', [TagController::class,'index']);
Route::get('/tags/{tag:name}', [TagController::class,'show']);


Route::get('/action', [\App\Http\Controllers\ActionController::class,'logAction']);


Route::post('/logout',[SessionsController::class,'destroy'])->middleware('auth');

Route::middleware('guest')->group(function(){
    Route::get('/register',[RegisterController::class,'create']);
    Route::post('/register',[RegisterController::class,'store']);
    Route::get('/login',[SessionsController::class,'create']);
    Route::post('/login',[SessionsController::class,'store']);
});

Route::middleware('usersOnly')->group(function(){

    //resource
    Route::get('/question/create',[UserQuestionController::class,'create']);
    Route::post('/question/create',[UserQuestionController::class,'store']);
    Route::get('/question/{question:slug}/edit',[UserQuestionController::class,'edit']);
    Route::patch('/question/{question:slug}/edit',[UserQuestionController::class,'update']);
    Route::delete('/question/{question:slug}',[UserQuestionController::class,'destroy']);

    Route::get('/myfollowing',[UserFollowController::class,'index']); //spakuj u user question
   // Route::post('/users/follow/store',[UserFollowController::class,'store']);
    Route::post('/users/follow/storeajax',[UserFollowController::class,'storeAjax']);
    //Route::post('/users/follow/destroy',[UserFollowController::class,'destroy']);
    Route::post('/users/follow/destroyajax',[UserFollowController::class,'destroyAjax']);

    Route::post('/home/{question:slug}/answer',[AnswerController::class,'store']);
    Route::post('/answer',[AnswerController::class,'storeAjax']);

    //resources
    Route::get('/profile',[UserProfileController::class,'index']);
    Route::get('/profile/{user:username}/edit',[UserProfileController::class,'edit']);
    Route::patch('/profile/{user:username}/edit',[UserProfileController::class,'update']);
    Route::delete('/profile/{user:username}',[UserProfileController::class,'destroy']);

    Route::post('/questions/like',[QuestionReactionController::class,'like']);
    Route::post('/questions/dislike',[QuestionReactionController::class,'dislike']);

});

Route::middleware('adminOnly')->group(function(){
    Route::get('/admin/dashboard',[AdminController::class,'index']);
    Route::get('/admin/users',[AdminUserController::class,'index']);
    Route::delete('/admin/users/{user:username}',[AdminUserController::class,'destroy']);


    Route::get('/admin/questions',[AdminQuestionController::class,'index']);
    Route::delete('/admin/questions/{question:slug}/edit',[AdminQuestionController::class,'destroy']);

    //resource
    Route::get('/admin/topics',[AdminTopicController::class,'index']);
    Route::get('/admin/topics/create',[AdminTopicController::class,'create']);
    Route::post('/admin/topics/create',[AdminTopicController::class,'store']);
    Route::get('/admin/topics/{topic:slug}/edit',[AdminTopicController::class,'edit']);
    Route::patch('/admin/topics/{topic:slug}/edit',[AdminTopicController::class,'update']);
    Route::delete('/admin/topics/{topic:slug}',[AdminTopicController::class,'destroy']);
});



















