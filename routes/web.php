<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ChildrenController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeEducationController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PensionController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("reboot", function () {
    Artisan::call("view:clear");
    Artisan::call("route:clear");
    Artisan::call("cache:clear");
    Artisan::call("config:clear");
});
Route::get('storageLink', function () {
    Artisan::call("storage:link");
});
Route::get('migrate-fresh', function () {
    Artisan::call("migrate:fresh --seed");
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class,'index'])->name('welcome');
    Route::get('/', [HomeController::class,'index'])->name('welcome');

    Route::post('employee/info/update/{employeeInfo}', [EmployeeController::class, 'infoUpdate'])->name('employee.info-update');
    Route::post('employee/education/create', [EmployeeEducationController::class, 'store'])->name('education.store');
    Route::post('employee/posting/create', [EmployeeEducationController::class, 'postingStore'])->name('posting.store');
    Route::get('employee/education/delete/{employeeEducation}', [EmployeeEducationController::class, 'destroy'])->name('education.delete');
    Route::get('employee/posting/delete/{employeePosting}', [EmployeeEducationController::class, 'destroyPosting'])->name('posting.delete');
    Route::get('employee/Approve/{employee}', [EmployeeController::class, 'approve'])->name('employee.approve');
    #resource routes

    Route::resource('employee',EmployeeController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('position',PositionController::class);
    Route::resource('pension',PensionController::class);
    Route::resource('meeting',MeetingController::class);
    Route::resource('payroll',PayrollController::class);
    Route::resource('report',ReportController::class);
    Route::resource('task',TaskController::class);
    Route::resource('document',DocumentController::class);
    Route::resource('attendance',AttendanceController::class);
    Route::resource('applicant',ApplicantController::class);
    Route::resource('salary',SalaryController::class);
    Route::resource('holiday',HolidayController::class);
    Route::post('children',[ChildrenController::class,'store'])->name('children.store');
    Route::get('children/{children}',[ChildrenController::class,'delete'])->name('children.delete');
    Route::get('salary/{salary}/update',[SalaryController::class,'updateStatus'])->name('salary.updateStatus');
    Route::post('salary/{salary}/update',[SalaryController::class,'update'])->name('salary.update');
    Route::get('logout','App\Http\Controllers\HomeController@logout');
    Route::get('/generate_pdf/{employee}', [EmployeeController::class, 'report'])->name('employee.report');
    Route::post('/getEmployees', [EmployeeController::class, 'massReport'])->name('getEmployees');
    #end resource route list
    Route::get('items/{item}',[HomeController::class, 'getItems']);
    Route::get('reports',[ReportController::class, 'index'])->name('reports');
    Route::get('reports/posting',[ReportController::class, 'posting'])->name('getEmployees.posting');
    Route::get('reports/education',[ReportController::class, 'education'])->name('getEmployees.education');

    Route::get('reports/training', [ReportController::class, 'training'])->name('getEmployees.training');
    Route::post('reports/salary', [ReportController::class, 'salary'])->name('getEmployees.salary');

    Route::middleware('admin')->group(function () {

    });
});
