<?php

use LaravelJsonApi\Laravel\Facades\JsonApiRoute;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

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

JsonApiRoute::server('v1') ->resources(function ($server) {
    $server->resource('posts', JsonApiController::class)
        ->readOnly()
        ->relationships(function ($relations) {
            $relations->hasOne('author')->readOnly();
            $relations->hasMany('comments')->readOnly();
            $relations->hasMany('tags')->readOnly();
        });
});
