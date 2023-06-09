<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageSkillController;
use App\Http\Controllers\MembershipController;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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

/*
 *****************************test********************
 */
Route::resources(
    [
        "contract" => ContractController::class,
        "languageSkill" => LanguageSkillController::class,
        "membership" => MembershipController::class,
    ]);

Route::get('contract/data/trash', [ContractController::class, 'trash'])
    ->name('contract.trash');
Route::put('contract/{contract}/restore', [ContractController::class, 'restore'])
    ->name('contract.restore');
Route::delete('contract/{contract}/force-delete', [ContractController::class, 'forceDelete'])
    ->name('contract.force-delete');

Route::post('contract/export/xlsx', [ContractController::class, 'ExportXls'])->name("export.xls");
Route::post('contract/export/pdf',[ContractController::class, 'ExportPDF'] )->name("export.pdf");
Route::delete("contract/multi/delete", [ContractController::class, 'MultiDelete'])->name("multi.delete");



Route::get('language/data/trash', [LanguageSkillController::class, 'trash'])
    ->name('language_skill.trash');
Route::put('language/{language}/restore', [LanguageSkillController::class, 'restore'])
    ->name('language_skill.restore');
Route::delete('language/{language}/force-delete', [LanguageSkillController::class, 'forceDelete'])
    ->name('language_skill.force-delete');

Route::get('membership/data/trash', [LanguageSkillController::class, 'trash'])
    ->name('membership.trash');
Route::put('membership/{membership}/restore', [LanguageSkillController::class, 'restore'])
    ->name('membership.restore');
Route::delete('membership/{membership}/force-delete', [LanguageSkillController::class, 'forceDelete'])
    ->name('membership.force-delete');
/*
 *****************************test********************
 */
Route::post("mmm",[\App\Http\Controllers\WorkSettingController::class,"update"]);
Route::get("xxx",function (){
    $now = Carbon::create(0,0,0,17);
    dd($now->format("Y-m-d H:i:s A"));
//    $time = ;
});
