<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesztController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/teszt', [TesztController::class, "teszt"]);
Route::get('/names', [TesztController::class, "names"]);
Route::post('/names/delete', [TesztController::class, "deleteName"]);
Route::get('/names/create/{family}/{name}', [TesztController::class, "namesCreate"]);
Route::get('/families/create/{name}', [TesztController::class, "familyCreate"]);
Route::get('/names/manage/surname', [TesztController::class, "manageSurname"]);
Route::post('/names/manage/surname/delete', [TesztController::class, "deleteSurname"]);
Route::post('/names/manage/surname/new', [TesztController::class, "newSurname"]);
Route::post('/names/manage/name/new', [TesztController::class, "newName"]);