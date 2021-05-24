<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GladosAuthController;
use App\Http\Controllers\SubjectAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectTestController;

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

Route::get('/healthz', function () {
    return '{}';
});

Route::post('admin/login', [GladosAuthController::class, 'adminLogin']);
Route::post('admin/logout', [GladosAuthController::class, 'adminLogout']);

Route::post('subject/login', [SubjectAuthController::class, 'subjectLogin']);
Route::post('subject/logout', [SubjectAuthController::class, 'subjectLogout']);

Route::middleware('auth:admin-api')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::apiResources([
            'subjects' => SubjectController::class,
            'users' => UserController::class
        ]);
    });
});

//Route::middleware('auth:subject-api')->group(function () {
Route::apiResources([
    'subject/test' => SubjectTestController::class,
    'users' => UserController::class
]);
//});
