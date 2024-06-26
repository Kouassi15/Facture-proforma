<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group( function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/rpofile',[ProfileController::class, 'profile'])->name('profile.profil');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/deconnexion',[ProfileController::class, 'logout'])->name('profile.logout');

    Route::prefix('client')->name('client.')->group(function () {
        Route::get('index', [ClientController::class, 'index'])->name('index');
        Route::get('create', [ClientController::class, 'create'])->name('create');
        Route::post('store', [ClientController::class, 'store'])->name('store');
        Route::get('show/{id}', [ClientController::class, 'show'])->name('show');
        Route::get('edit/{id}', [ClientController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [ClientController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [ClientController::class, 'destroy'])->name('delete');
    });

    Route::prefix('facture')->name('facture.')->group(function () {
        Route::get('index', [FactureController::class, 'index'])->name('index');
        Route::get('index/proforma', [FactureController::class, 'proforma'])->name('proforma');
        Route::get('index/particulier', [FactureController::class, 'particulier'])->name('particulier');
        Route::get('create', [FactureController::class, 'create'])->name('create');
        Route::post('store', [FactureController::class, 'store'])->name('store');
        Route::post('ministerestore', [FactureController::class, 'storefacture'])->name('ministerestore');
        Route::get('show/{id}', [FactureController::class, 'show'])->name('show');
        Route::get('edit/{id}', [FactureController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [FactureController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [FactureController::class, 'destroy'])->name('delete');
        Route::get('generate-pdf/{id}', [FactureController::class, 'generatePDF'])->name('generate-pdf');
        Route::get('generatefacture-pdf/{id}', [FactureController::class, 'generatefacturePDF'])->name('generatefacture-pdf');
        Route::get('deletesection/{id}', [FactureController::class, 'deleteFactureSection'])->name('deletesection');
        Route::get('deleteitem/{id}', [FactureController::class, 'deleteFactureItem'])->name('deleteitem');
        route::get('facture/historique', [FactureController::class, 'historique'])->name('historique');
        route::get('facture/search', [FactureController::class, 'search'])->name('search');
    });

    Route::middleware('admin')->prefix('users')->name('users.')->group(function () {
        Route::get('index', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('show/{id}', [UserController::class, 'show'])->name('show');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });
});



require __DIR__.'/auth.php';
