<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\GenreController;
use \App\Http\Controllers\Api\MovieController;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\PosterController;
use \App\Http\Controllers\Api\GalleryController;

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



Route::get('getMovie/{id}',[MovieController::class,'show']);

Route::get('getAllGenres',[GenreController::class,'index']);

Route::post('sign-in',[AuthController::class,'login']);

Route::get('/getUser', [AuthController::class,'getUser'])->middleware('auth:sanctum');

Route::get('/getApprovedMovie', [MovieController::class,'getApproved']);

Route::post('createUser',[UserController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('logout',[AuthController::class,'logout']);

    Route::post('uploadPosterForMovie',[PosterController::class,'uploadById']);
    Route::post('uploadGalleryForMovie/{id}',[GalleryController::class,'uploadById']);

    Route::get('getTrashMovie/{id}',[MovieController::class,'getTrashMovie']);
    Route::get('getMyMovie',[MovieController::class,'getMovieByUserToken']);
    Route::post('createMovie',[MovieController::class,'store']);
    Route::post('publishMyMovie/{id}',[MovieController::class,'publish']);
    Route::post('canceledPublishMyMovie/{id}',[MovieController::class,'canceledPublish']);
    Route::post('trashingMyMovie/{id}',[MovieController::class,'softDelete']);
    Route::post('restoreMyMovie/{id}',[MovieController::class,'restore']);
    Route::post('deleteMyMovie/{id}',[MovieController::class,'forceDestroy']);


    // Only ADMIN
    Route::get('getAllMovie',[MovieController::class,'getAllMovieByAdmin']);

    Route::post('approveMovie',[MovieController::class,'approveMovie']);

    Route::post('createGenre',[GenreController::class,'store']);

    Route::apiResources([
        'users' => UserController::class,
    ]);

});
