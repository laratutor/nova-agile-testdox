<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laratutor\NovaAgileTestdox\TestdoxGenerator;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/', function (Request $request) {
    $phpunitConfiguration = base_path('phpunit.xml');

    return response()->json([
        'data' => (new TestdoxGenerator($phpunitConfiguration))->generate(),
    ]);
});
