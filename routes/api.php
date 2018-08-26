<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/endpoint', function (Request $request) {
    return [
        'data' => [
            'features' => [
                'bob test' => [
                    'bob can jump',
                    'bob can fly',
                    'bob can die',
                ],
                'joe test' => [
                    'joe can hop',
                    'joe cant fly',
                    'joe lives forever',
                ],
            ],
            'unit' => [
                'bob test' => [
                    'die returns true'
                ],
                'joe test' => [
                    'die returns false'
                ],
            ],
        ],
    ];
});
