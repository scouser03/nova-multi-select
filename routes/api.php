<?php

use Scouser03\MultiSelect\Http\Controllers\MultiSelectController;

Route::post('delete', [MultiSelectController::class, 'destroy']);
Route::post('update', [MultiSelectController::class, 'update']);