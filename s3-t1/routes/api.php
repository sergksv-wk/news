<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsCatList;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::match(['post', 'get'], '/cat_list', [NewsCatList::class, 'list']);
Route::post( '/cat_news', [NewsCatList::class, 'getNewsByCatName']);
Route::get('/cat_news/{cat_name}', [NewsCatList::class, 'getNewsByCatName']);
