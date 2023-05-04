<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
   // 'middleware' => ['auth'],
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
    Route::delete('employeePI/destroy/{employee}', [EmployeeController::class, 'destroy'])
        ->name('employeePI.destroy');
    Route::get('employeePI/create', [EmployeeController::class, 'create'])
        ->name('employeePI.create');
    Route::post('employeePI/store', [EmployeeController::class, 'store'])
        ->name('employeePI.store');

});
Route::group([
    // 'middleware' => ['auth'],
    'as' => 'dashboard.',
    'prefix'=>'dashboard/',
], function () {
    Route::get('contact/index', [ContactController::class, 'index'])
        ->name('contact.index');
    Route::get('contact/{contact}/edit', [ContactController::class, 'edit'])
        ->name('contact.edit');
    Route::get('contact/show/{contact}', [ContactController::class, 'show'])
        ->name('contact.show')
        ->where('contact', '\d+');

    Route::put('contact/update/{id}', [ContactController::class, 'update'])
        ->name('contact.update');


//    Route::delete('contact/destroy/{employee}', [ContactController::class, 'destroy'])
//        ->name('contact.destroy');
    Route::get('contact/create', [ContactController::class, 'create'])
        ->name('contact.create');
    Route::post('contact/store', [ContactController::class, 'store'])
        ->name('contact.store');



});
