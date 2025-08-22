<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// --- ✨ NEW: ใช้ Group Middleware 'cors' ที่คุณ Wing สร้างไว้ มาครอบ Resource ของเรา ---
Route::middleware('cors')->group(function () {
    
    /**
     * ✨ REVISED: ใช้ apiResource เพื่อสร้างเส้นทาง API สำหรับ Employer โดยอัตโนมัติ
     * คำสั่งนี้จะสร้าง Route ทั้ง 5 ที่เราต้องการให้ทันที:
     * 1. GET /api/employers       -> EmployerController@index
     * 2. POST /api/employers      -> EmployerController@store
     * 3. GET /api/employers/{id}  -> EmployerController@show
     * 4. PUT /api/employers/{id}  -> EmployerController@update
     * 5. DELETE /api/employers/{id} -> EmployerController@destroy
     */
    Route::apiResource('employers', EmployerController::class);

    // ✨ FUTURE: ในอนาคตเราจะเพิ่ม Resource สำหรับส่วนอื่นๆ ที่นี่
    // Route::apiResource('importers', ImporterController::class);
    // Route::apiResource('agents', AgentController::class);
    // Route::apiResource('delegates', DelegateController::class);

});