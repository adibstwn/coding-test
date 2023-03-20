<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\LigaController;
use App\Models\Club;
use App\Models\Liga;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('multiple-match', function () {
    $data = new Liga;
    $club = Club::all();
    return view('liga.create_multiple', compact(
        'data',
        'club'
    ));
});
Route::post('multiple-match', [LigaController::class, 'multipleMatch']);
Route::resource('club', ClubController::class);
Route::resource('liga', LigaController::class);
