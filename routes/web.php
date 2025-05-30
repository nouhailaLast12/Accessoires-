<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CommandeController;

// // Route pour afficher une page Web pour créer une commande
// Route::get('/commandes/create', [CommandeController::class, 'create'])->name('commandes.create');

// // Route pour afficher une commande spécifique en fonction de l'ID
// Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');

// // Si vous avez besoin d'un formulaire pour créer une commande
// Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');

// // Route pour stocker une nouvelle commande (généralement pour un formulaire POST)
// Route::post('/commandes', [CommandeController::class, 'store'])->name('commandes.store');




Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/finaliser-tache', [ProductController::class, 'finalizeTask']);
Route::post('/products', [ProductController::class, 'store']); 
Route::get('/test-image', function() {
    return response()->file(storage_path('app/public/images/team11.jpg'));
});
