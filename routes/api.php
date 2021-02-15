<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\batchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\FeeCategoryController;
use App\Http\Controllers\FeeParticularsController;
use App\Http\Controllers\FeeCollectionController;
use App\Http\Controllers\FeeSubmissionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [RegistrationController::class, 'test']);

//handling users 
Route::post('/register', [RegistrationController::class, 'store']);
Route::post('/update/{id}', [RegistrationController::class, 'update']);
Route::get('/profile/{id}', [RegistrationController::class, 'detailinfo']);
Route::middleware('auth:sanctum')->get('/users', [RegistrationController::class, 'index']);
Route::post('/login', [RegistrationController::class, 'login']);


//handling school settings
Route::middleware('auth:sanctum')->post('/school/create', [SchoolController::class, 'store']);
Route::post('/school/update/{id}', [SchoolController::class, 'update']);
Route::get('/school/{id}', [SchoolController::class, 'show']);
Route::middleware('auth:sanctum')->get('/schools', [SchoolController::class, 'index']);
Route::delete('/school/{id}', [SchoolController::class, 'destroy']);

//handling classes
Route::get('/classes', [ClassesController::class, 'index']);
Route::post('/classes/create', [ClassesController::class, 'store']);
Route::post('/classes/update/{id}', [ClassesController::class, 'update']);
Route::get('/classes/{id}', [ClassesController::class, 'show']);
Route::delete('/classes/{id}', [ClassesController::class, 'destroy']);

//handling Batches
Route::get('/batch', [BatchController::class, 'index']);
Route::post('/batch/create', [BatchController::class, 'store']);
Route::post('/batch/update/{id}', [BatchController::class, 'update']);
Route::get('/batch/{id}', [BatchController::class, 'show']);
Route::delete('/batch/{id}', [BatchController::class, 'destroy']);


//handling CATEGORY categoriess
Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/create', [CategoryController::class, 'store']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

//handling subjects
Route::get('/subjects', [SubjectController::class, 'index']);
Route::post('/subjects/create', [SubjectController::class, 'store']);
Route::post('/subjects/update/{id}', [SubjectController::class, 'update']);
Route::get('/subjects/{id}', [SubjectController::class, 'show']);
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);

//handling students details
Route::middleware('auth:sanctum')->get('/student', [StudentsController::class, 'index']);
Route::post('/student/create', [StudentsController::class, 'store']);
Route::post('/student/update/{id}', [StudentsController::class, 'update']);
Route::get('/student/{id}', [StudentsController::class, 'show']);
Route::delete('/student/{id}', [StudentsController::class, 'destroy']);

//handling fee cateories details
Route::get('/feecategories', [FeeCategoryController::class, 'index']);
Route::post('/feecategory/create', [FeeCategoryController::class, 'store']);
Route::post('/feecategory/update/{id}', [FeeCategoryController::class, 'update']);
Route::get('/feecategory/{id}', [FeeCategoryController::class, 'show']);
Route::delete('/feecategory/{id}', [FeeCategoryController::class, 'destroy']);

//handling fee cateories particulars details
Route::get('/feeparticulars', [FeeParticularsController::class, 'index']);
Route::post('/feeparticulars/create', [FeeParticularsController::class, 'store']);
Route::post('/feeparticulars/update/{id}', [FeeParticularsController::class, 'update']);
Route::get('/feeparticulars/{id}', [FeeParticularsController::class, 'show']);
Route::delete('/feeparticulars/{id}', [FeeParticularsController::class, 'destroy']);

//handling fee cateories particulars details
Route::get('/feeCollection', [FeeCollectionController::class, 'index']);
Route::post('/feeCollection/create', [FeeCollectionController::class, 'store']);
Route::post('/feeCollection/update/{id}', [FeeCollectionController::class, 'update']);
Route::get('/feeCollection/{id}', [FeeCollectionController::class, 'show']);
Route::delete('/feeCollection/{id}', [FeeCollectionController::class, 'destroy']);

//handling fee cateories particulars details
Route::get('/feesubmission', [FeeSubmissionController::class, 'index']);
Route::post('/feesubmission/create', [FeeSubmissionController::class, 'store']);
Route::post('/feesubmission/update/{id}', [FeeSubmissionController::class, 'update']);
Route::get('/feesubmission/{id}', [FeeSubmissionController::class, 'show']);
Route::delete('/feesubmission/{id}', [FeeSubmissionController::class, 'destroy']);


Route::post('/paymentgate', [FeeSubmissionController::class, 'pay']);