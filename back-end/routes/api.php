<?php

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

Route::post('/add-employee', [EmployeeController::class, 'postEmployee']);

Route::get('/employee-list', [EmployeeController::class, 'getEmployee']);

Route::delete('/delete-employee/{emp_id}', [EmployeeController::class, 'deleteEmployee']);

Route::get('/get-employee-details/{emp_id}', [EmployeeController::class, 'getEmployeeById']);

Route::put('/edit-employee/{emp_id}', [EmployeeController::class, 'editEmployee']);