<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstitutionAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard-count', [DashboardController::class, "dashboardCounts"]);

Route::get('/institutions', [InstitutionAdminController::class, 'listInstitutions']);
Route::get('/institutions/{id}', [InstitutionAdminController::class, 'showInstitution']);
Route::post('/institutions', [InstitutionAdminController::class, 'storeInstitution']);
Route::put('/institutions/{id}', [InstitutionAdminController::class, 'updateInstitution']);
Route::delete('/institutions/{id}', [InstitutionAdminController::class, 'deleteInstitution']);
