<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesOfferController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserParkedCarController;

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

//Authentifizierung
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Inserate suchen und anzeigen
Route::get('/offers', [SalesOfferController::class, 'index']);
Route::get('/offers/{id}', [SalesOfferController::class, 'show']);
Route::get('/offers/search/{name}', [SalesOfferController::class, 'search']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    //Inserate CUD-Operationen
    Route::post('/offers', [SalesOfferController::class, 'store']); //Inserat hinzufügen
    Route::put('/offers/{id}', [SalesOfferController::class, 'update']); //Inserat bearbeiten
    Route::delete('/offers/{id}', [SalesOfferController::class, 'destroy']); //Inserat löschen

    //parkplatz
    Route::get('/parking', [UserParkedCarController::class, 'index']); //anzeigen
    Route::post('/parking', [UserParkedCarController::class, 'store']); //neues Fahrzeug/Angebot parken
    Route::delete('/parking/{id}', [UserParkedCarController::class, 'destroy']); //Fahrzeug/Angebot entfernen

    //Authentifizierung
    Route::post('/logout', [AuthController::class, 'logout']);
});
