<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsCatList;
use App\Http\Controllers\ItemCardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/news');

Route::get('/news', function (){
    return view('news');
});

Route::get('/news/{cat_name}/{item_name}', [ItemCardController::class, 'showCard'])->where('item_name', '[^.]+.[^.]+.html$');
Route::get('/news/{cat_name}', [NewsCatList::class, 'getCategory']);


