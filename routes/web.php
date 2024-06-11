<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/import-xml',[\App\Http\Controllers\XMLImportController::class,'import'])->name('import.xml');

Route::get('/export-excel',[\App\Http\Controllers\ExcelExportController::class,'export'])->name('export.excel');
