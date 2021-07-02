<?php

use App\Http\Controllers\ClientsApiController;
use App\Http\Controllers\LoginApiController;
use App\Http\Controllers\PostsApiController;
use App\Http\Controllers\RegisterApiController;
use App\Models\Post;
use App\Models\Clients;
use App\Models\Register;
use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Content
Route::get('/posts', [PostsApiController::class, 'index']);
Route::post('/posts', [PostsApiController::class, 'store']);
Route::put('/posts{posts}', [PostsApiController::class, 'update']);
Route::delete('/posts/{post}', [PostsApiController::class, 'destroy']);

// method two for taking username and email but not necessary
Route::get('/clients', [ClientsApiController::class, 'index']);
Route::post('/clients', [ClientsApiController::class, 'store']);
Route::put('/clients/{post}', [ClientsApiController::class, 'update']);
Route::delete('/clients/{post}', [ClientsApiController::class, 'destroy']);

// Creating new user on the database
Route::get('/registers', [RegisterApiController::class, 'index']);
Route::post('/registers', [RegisterApiController::class, 'store']);
Route::put('/registers/{post}', [RegisterApiController::class, 'update']);
Route::delete('/registers/{post}', [RegisterApiController::class, 'destroy']);

//user login
Route::get('/logins', [LoginApiController::class, 'index']);
Route::post('/logins', [LoginApiController::class, 'store']);
Route::put('/logins/{post}', [LoginApiController::class, 'update']);
Route::delete('/logins/{post}', [LoginApiController::class, 'destroy']);
