<?php

use App\Http\Controllers\Api\V1\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function (){
   Route::apiResource('skills', SkillController::class)->middleware('auth:sanctum');
});

//Route::get('/create_first_user', [SkillController::class, 'createUser']);
Route::post('/login', [SkillController::class, 'userCheck']);
