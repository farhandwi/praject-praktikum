<?php

use App\Http\Controllers\Api\movieApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('movies',movieApiController::class);