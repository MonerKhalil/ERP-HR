<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::group([
    'middleware' => ['auth'],
    'as' => 'dashboard.',
    'prefix'=>'dashboard/',
], function () {
    Route::get('employeePI/index', [EmployeeController::class, 'index'])
        ->name('employeePI.index');
    Route::get('employeePI/{employee}/edit', [EmployeeController::class, 'edit'])
        ->name('employeePI.edit');
    Route::get('employeePI/show/{employee}', [EmployeeController::class, 'show'])
        ->name('employeePI.show')
        ->where('employee', '\d+');
    Route::put('employeePI/update/{employee}', [EmployeeController::class, 'update'])
        ->name('employeePI.update');
//    Route::delete('employeePI/destroy/{employee}', [EmployeeController::class, 'destroy'])
//        ->name('employeePI.destroy');
    Route::get('employeePI/create', [EmployeeController::class, 'create'])
        ->name('employeePI.create');
    Route::post('employeePI/store', [EmployeeController::class, 'store'])
        ->name('employeePI.store');



});
