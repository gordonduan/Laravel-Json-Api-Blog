<?php

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

JsonApiRoute::server('v1')
    ->namespace('Api\V1')
    ->resources(function ($server) {

        // Define your resource routes here
        // e.g. $server->resource('coupons')->only('read', 'index', 'create', 'delete');
    }
);
