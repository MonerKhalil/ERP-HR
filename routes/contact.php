<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
Route::group([
   // 'middleware' => ['auth'],
    'as' => 'dashboard.',
    'prefix'=>'dashboard/',
], function () {
    Route::get('contact/index', [ContactController::class, 'index'])
        ->name('contact.index');
    Route::get('contact/{employee}/edit', [ContactController::class, 'edit'])
        ->name('contact.edit');
    Route::get('contact/show/{employee}', [ContactController::class, 'show'])
        ->name('contact.show')
        ->where('employee', '\d+');
    Route::put('contact/update/{employee}', [ContactController::class, 'update'])
        ->name('contact.update');
//    Route::delete('contact/destroy/{employee}', [ContactController::class, 'destroy'])
//        ->name('contact.destroy');
    Route::get('contact/create', [ContactController::class, 'create'])
        ->name('contact.create');
    Route::post('contact/store', [ContactController::class, 'store'])
        ->name('contact.store');

    Route::post('contact/deleteAllImage/{id}', [ContactController::class, 'deleteAllImage']);
    Route::post('contact/deleteOneImage/{id}', [ContactController::class, 'deleteOneImage']);
    Route::post('contact/addListImage', [ContactController::class, 'addListImage']);
});
