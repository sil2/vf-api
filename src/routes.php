<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

Route::group([
    'middleware' => ['vfapi.api'],
    'prefix'     => 'api'
], function (Router $router) {
    Route::get('widget', 'Sil2\VfApi\Controllers\WidgetController@all');
    Route::get('widget/{id}', 'Sil2\VfApi\Controllers\WidgetController@get');
    Route::patch('widget/{id}', 'Sil2\VfApi\Controllers\WidgetController@update');
    Route::post('widget', 'Sil2\VfApi\Controllers\WidgetController@create');
    Route::delete('widget/{id}', 'Sil2\VfApi\Controllers\WidgetController@delete');
});
