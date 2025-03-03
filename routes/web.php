<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/contatos', [ContactsController::class, 'index'])->name('contact.index');
    Route::get('/contato/novo', [ContactsController::class, 'create'])->name('contact.create');
    Route::post('/contato/salvar', [ContactsController::class, 'store'])->name('contact.store');
    Route::get('/contato/editar/{id}', [ContactsController::class, 'edit'])->name('contact.edit');
    Route::post('/contato/update/{id}', [ContactsController::class, 'update'])->name('contact.update');
    Route::get('/contato/excluir/{id}', [ContactsController::class, 'destroy'])->name('contact.destroy');
});

require __DIR__.'/auth.php';
