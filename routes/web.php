<?php


use App\Http\Controllers\Movement\MovementController;
use Illuminate\Support\Facades\Route;

Route::get('/movement/{id}', [MovementController::class, 'index']);

Route::group([
    'prefix' => 'V1',
    'as' => 'api.',
    'namespace' => 'Api\V1\Admin'
], function () {
    Route::apiResource('projects', 'ProjectsApiController');
});
