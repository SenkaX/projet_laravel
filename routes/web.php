<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\TierListController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/people', [PersonController::class, 'index'])->name('people.index');

    // Route pour voter (upvote/downvote)
    Route::post('/people/{person}/vote/{value}', [VoteController::class, 'vote'])->name('people.vote');

    // TierList : toutes les actions sauf index/show accessibles seulement à l'utilisateur connecté
    Route::resource('tier-lists', TierListController::class)->except(['index', 'show']);
});

// Accès public : voir toutes les tier lists, voir une tier list, voir une personne, voir une catégorie
Route::resource('tier-lists', TierListController::class)->only(['index', 'show']);
Route::resource('people', PersonController::class)->only(['show']);
Route::resource('categories', CategoryController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';