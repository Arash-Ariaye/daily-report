<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DailyreportController;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(DailyreportController::class)->group(function (){
    Route::get('reports', 'index')->name('reports');
    Route::get('add-report', 'add')->name('add-report');
    Route::post('create-report', 'create')->name('create-report');
    Route::get('edit-report', 'edit')->name('edit-report');
    Route::delete('destroy-report/{report}', 'destroy')->name('destroy-report');
    Route::put('update-report/{report}', 'update')->name('update-report');
});
