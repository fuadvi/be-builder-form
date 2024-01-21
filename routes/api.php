<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserTeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)
    ->group(function (){
        Route::post('register', 'reqister');
        Route::post('login','login');
    });

Route::controller(UserTeamController::class)
    ->middleware('auth:sanctum')
    ->group(function (){
        Route::post('teams', 'createTeam');
        Route::post('teams/{team}/members', 'addPeople');
    });


Route::controller(FormController::class)
    ->middleware('auth:sanctum')
    ->group(function (){
        Route::post('forms/{id}/component','addFormField');
        Route::post('forms/{uuid}/answers','processAnswer');
    });

Route::apiResource('forms',FormController::class)->middleware('auth:sanctum');

