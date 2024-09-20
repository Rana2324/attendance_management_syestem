<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstitutionAdminController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

Route::get( '/dashboard-count', [DashboardController::class, "dashboardCounts"] );

Route::prefix( 'institutions' )->controller( InstitutionController::class )->group( function () {
    Route::get( '/', 'listInstitutions' );
    Route::get( '/{id}', 'showInstitution' );
    Route::post( '/', 'storeInstitution' );
    Route::put( '/{id}', 'updateInstitution' );
    Route::delete( '/{id}', 'deleteInstitution' );
} );
// Admin routes for institutions
Route::prefix( 'institution-admin' )->controller( InstitutionAdminController::class )->group( function () {
    Route::get( '/', 'adminList' );
    Route::get( '/{id}', 'showAdmin' );
    Route::post( '/', 'storeAdmin' );
    Route::put( '/{id}', 'updateAdmin' );
    Route::delete( '/{id}', 'deleteAdmin' );
} );

//Login api

Route::post( '/login', [AuthController::class, 'login'] );
