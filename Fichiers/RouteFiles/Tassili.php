<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

Route::get('/tassili/router',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'index'])->middleware('auth');
Route::get('/tassili/router/create',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'create'])->middleware('auth');
Route::get('/tassili/router/update/{id}',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'update'])->middleware('auth');
Route::post('/tassili/router/creator',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'creator'])->middleware('auth');
Route::post('/tassili/router/updator',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'updator'])->middleware('auth');
Route::post('/tassili/router/updateActive',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'updateActive'])->middleware('auth');
Route::post('/tassili/router/delete',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'delete'])->middleware('auth');
Route::post('/tassili/logout',[\Tassili\Admin\Http\Resources\TassiliRouter::class,'logout'])->middleware('auth');
Route::post('/tassili/deleteRecord',[\Tassili\Prime\Http\Resources\TassiliRouter::class,'deleteRecord'])->middleware('auth');
