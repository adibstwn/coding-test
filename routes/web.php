<?php

use App\Http\Controllers\ClubController;
use App\Http\Controllers\LigaController;
use App\Http\Controllers\MatchController;
use App\Models\Club;
use App\Models\Liga;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('club', ClubController::class);
Route::resource('liga', LigaController::class);
Route::resource('match', MatchController::class);

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {
    Route::get('/multiple-matches', function () {
        $data = new Liga;
        $club = Club::all();
        return view('liga.create_multiple', compact(
            'data',
            'club'
        ));
    });
    Route::get('/save-match', [LigaController::class, 'create']);
    Route::post('/multiple-match', [LigaController::class, 'multipleMatch']);
    Route::get('/create-club', [ClubController::class, 'create']);
    Route::get('/create-match', [MatchController::class, 'create']);
});


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
