<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BalanceTransferController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InvestController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\NoticeController;
use App\Http\Controllers\Api\PackageController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\TbcApiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserVideoController;
use App\Http\Controllers\Api\WithdrawController;
use App\Http\Controllers\Api\UserInvestController;
use App\Http\Controllers\Api\PackageUserController;
use App\Http\Controllers\Api\InvestUserController;
use App\Http\Controllers\Api\ObjectionController;
use App\Http\Controllers\Api\WithdrawLimitController;
use Illuminate\Support\Facades\Route;

Route::middleware('validated')->group(function () {
  
});
