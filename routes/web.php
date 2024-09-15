<?php

use App\Http\Controllers\annexeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeinterventionController;
use App\Http\Controllers\TypesPieceController;
use App\Http\Controllers\VehiculeController;
use App\Models\Intervention;
use App\Models\Piece;
use App\Models\Vehicule;
use FontLib\Table\Type\name;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/Accueil', [VehiculeController::class, 'index']);

Route::get('/', function () {

    $voitures = Vehicule::All();

    return view('home', compact("voitures"));

})->name('home'); // Assign the name 'home' to the route


// Routes d'authentification
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('logins', [AuthController::class, 'logins'])->name('logins');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('create_user', [AuthController::class, 'create_user'])->name('create_user');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware([Authenticate::class])->group(function () {

    Route::get('vehicules', [VehiculeController::class, 'index'])->name('vehicules.index');
    Route::get('vehicules/create', [VehiculeController::class, 'create'])->name('vehicules.create');
    Route::post('vehicules', [VehiculeController::class, 'store'])->name('vehicules.store');
    Route::get('vehicules/{vehicule}', [VehiculeController::class, 'show'])->name('vehicules.show');
    Route::get('vehicules/{vehicule}/edit', [VehiculeController::class, 'edit'])->name('vehicules.edit');
    Route::put('vehicules/{vehicule}', [VehiculeController::class, 'update'])->name('vehicules.update');
    Route::delete('vehicules/{vehicule}', [VehiculeController::class, 'destroy'])->name('vehicules.destroy');
    Route::get('vehicules/search', [VehiculeController::class, 'search'])->name('vehicules.search');






Route::get('/annexes', [annexeController::class, 'index'])->name('annexes.index');
Route::get('annexes/create', [annexeController::class, 'create'])->name('annexes.create');
Route::post('annexes', [annexeController::class, 'store'])->name('annexes.store');
Route::get('annexes/{annexe}', [annexeController::class, 'show'])->name('annexes.show');
Route::get('annexes/{annexe}/edit', [annexeController::class, 'edit'])->name('annexes.edit');
Route::put('annexes/{annexe}', [annexeController::class, 'update'])->name('annexes.update');
Route::delete('annexes/{annexe}', [annexeController::class, 'destroy'])->name('annexes.destroy');




Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');



Route::get('/factures', [FactureController::class, 'index'])->name('factures.index');
Route::get('factures/create', [FactureController::class, 'create'])->name('factures.create');
Route::post('factures', [FactureController::class, 'store'])->name('factures.store');
Route::get('factures/{facture}', [FactureController::class, 'show'])->name('factures.show');
Route::get('factures/{facture}/edit', [FactureController::class, 'edit'])->name('factures.edit');
Route::put('factures/{facture}', [FactureController::class, 'update'])->name('factures.update');
Route::delete('factures/{facture}', [FactureController::class, 'destroy'])->name('factures.destroy');
Route::get('factures/{facture}/pdf', [FactureController::class, 'generatePDF'])->name('factures.pdf'); // Route pour la génération du PDF



Route::get('/typepieces', [TypesPieceController::class, 'index'])->name('typepieces.index');
Route::get('typepieces/create', [TypesPieceController::class, 'create'])->name('typepieces.create');
Route::post('typepieces', [TypesPieceController::class, 'store'])->name('typepieces.store');
Route::get('typepieces/{type_piece}', [TypesPieceController::class, 'show'])->name('typepieces.show');
Route::get('typepieces/{type_piece}/edit', [TypesPieceController::class, 'edit'])->name('typepieces.edit');
Route::put('typepieces/{type_piece}', [TypesPieceController::class, 'update'])->name('typepieces.update');
Route::delete('typepieces/{type_piece}', [TypesPieceController::class, 'destroy'])->name('typepieces.destroy');



Route::get('/typeinterventions', [TypeinterventionController::class, 'index'])->name('typeinterventions.index');
Route::get('typeinterventions/create', [TypeinterventionController::class, 'create'])->name('typeinterventions.create');
Route::post('typeinterventions', [TypeinterventionController::class, 'store'])->name('typeinterventions.store');
Route::get('typeinterventions/{type_intervention}', [TypeinterventionController::class, 'show'])->name('typeinterventions.show');
Route::get('typeinterventions/{type_intervention}/edit', [TypeinterventionController::class, 'edit'])->name('typeinterventions.edit');
Route::put('typeinterventions/{type_intervention}', [TypeinterventionController::class, 'update'])->name('typeinterventions.update');
Route::delete('typeinterventions/{type_intervention}', [TypeinterventionController::class, 'destroy'])->name('typeinterventions.destroy');


Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('services', [ServiceController::class, 'store'])->name('services.store');
Route::get('services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');



Route::get('/personnels', [PersonnelController::class, 'index'])->name('personnels.index');
Route::get('personnels/create', [PersonnelController::class, 'create'])->name('personnels.create');
Route::post('personnels', [PersonnelController::class, 'store'])->name('personnels.store');
Route::get('personnels/{personnel}', [PersonnelController::class, 'show'])->name('personnels.show');
Route::get('personnels/{personnel}/edit', [PersonnelController::class, 'edit'])->name('personnels.edit');
Route::put('personnels/{personnel}', [PersonnelController::class, 'update'])->name('personnels.update');
Route::delete('personnels/{personnel}', [PersonnelController::class, 'destroy'])->name('personnels.destroy');



Route::get('/pieces', [PieceController::class, 'index'])->name('pieces.index');
Route::get('pieces/create', [PieceController::class, 'create'])->name('pieces.create');
Route::post('pieces', [PieceController::class, 'store'])->name('pieces.store');
Route::get('pieces/{piece}', [PieceController::class, 'show'])->name('pieces.show');
Route::get('pieces/{piece}/edit', [PieceController::class, 'edit'])->name('pieces.edit');
Route::put('pieces/{piece}', [PieceController::class, 'update'])->name('pieces.update');
Route::delete('pieces/{piece}', [PieceController::class, 'destroy'])->name('pieces.destroy');




Route::get('/interventions', [InterventionController::class, 'index'])->name('interventions.index');
Route::get('interventions/create', [InterventionController::class, 'create'])->name('interventions.create');
Route::post('interventions', [InterventionController::class, 'store'])->name('interventions.store');
Route::get('interventions/{intervention}', [InterventionController::class, 'show'])->name('interventions.show');
Route::get('interventions/{intervention}/edit', [InterventionController::class, 'edit'])->name('interventions.edit');
Route::put('interventions/{intervention}', [InterventionController::class, 'update'])->name('interventions.update');
Route::delete('interventions/{intervention}', [InterventionController::class, 'destroy'])->name('interventions.destroy');

});


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
