<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CuisinierController;
use App\Http\Controllers\MenudujourController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\TemoignageController;
use Illuminate\Support\Facades\Route;


// Routes Admin Authentication
Route::get('/adminlogin', [AdminController::class, 'showLoginForm'])->name('login.form');
Route::post('/adminconnect', [AdminController::class, 'login'])->name('login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('frontend.parties.index');
})->name('home');

Route::get('/about', function () {
    return view('frontend.parties.pages.about');
})->name('about');
// Pour la page de service
Route::get('/service', function () {
    return view('frontend.parties.pages.services');
})->name('service');

// Pour la page de menu
Route::get('/menu', function () {
    return view('frontend.parties.pages.menu');
})->name('menu');

// Pour la page de contact
Route::get('/contact', function () {
    return view('frontend.parties.footer');
})->name('footer');


Route::get('/menu', [App\Http\Controllers\MenuFrontendController::class, 'index'])->name('menu');

Route::get('/notre-equipe', [App\Http\Controllers\SiteController::class, 'equipe'])->name('equipe');

Route::middleware(['auth'])->group(function () {

    Route::get('/admindash', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Catégories
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategorieController::class, 'show'])->name('categories.show');
    Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategorieController::class, 'destroy'])->name('categories.destroy');

    // Plats
    Route::get('/plats', [PlatController::class, 'index'])->name('plats.index');
    Route::get('/plats/create', [PlatController::class, 'create'])->name('plats.create');
    Route::post('/plats', [PlatController::class, 'store'])->name('plats.store');
    Route::get('/plats/{id}', [PlatController::class, 'show'])->name('plats.show');
    Route::get('/plats/{id}/edit', [PlatController::class, 'edit'])->name('plats.edit');
    Route::put('/plats/{id}', [PlatController::class, 'update'])->name('plats.update');
    Route::delete('/plats/{id}', [PlatController::class, 'destroy'])->name('plats.destroy');

    // Menus du jour
    Route::get('/menudujours', [MenudujourController::class, 'index'])->name('menudujours.index');
    Route::get('/menudujours/create', [MenudujourController::class, 'create'])->name('menudujours.create');
    Route::post('/menudujours', [MenudujourController::class, 'store'])->name('menudujours.store');
    Route::get('/menudujours/{id}', [MenudujourController::class, 'show'])->name('menudujours.show');
    Route::get('/menudujours/{id}/edit', [MenudujourController::class, 'edit'])->name('menudujours.edit');
    Route::put('/menudujours/{id}', [MenudujourController::class, 'update'])->name('menudujours.update');
    Route::delete('/menudujours/{id}', [MenudujourController::class, 'destroy'])->name('menudujours.destroy');

    // Cuisiniers
    Route::get('/cuisiniers', [CuisinierController::class, 'index'])->name('cuisiniers.index');
    Route::get('/cuisiniers/create', [CuisinierController::class, 'create'])->name('cuisiniers.create');
    Route::post('/cuisiniers', [CuisinierController::class, 'store'])->name('cuisiniers.store');
    Route::get('/cuisiniers/{id}', [CuisinierController::class, 'show'])->name('cuisiniers.show');
    Route::get('/cuisiniers/{id}/edit', [CuisinierController::class, 'edit'])->name('cuisiniers.edit');
    Route::put('/cuisiniers/{id}', [CuisinierController::class, 'update'])->name('cuisiniers.update');
    Route::delete('/cuisiniers/{id}', [CuisinierController::class, 'destroy'])->name('cuisiniers.destroy');

     // Temoignages
     Route::get('/temoignages', [TemoignageController::class, 'index'])->name('temoignages.index');
     Route::get('/temoignages/create', [TemoignageController::class, 'create'])->name('temoignages.create');
     Route::post('/temoignages', [TemoignageController::class, 'store'])->name('temoignages.store');
     Route::get('/temoignages/{id}', [TemoignageController::class, 'show'])->name('temoignages.show');
     Route::get('/temoignages/{id}/edit', [TemoignageController::class, 'edit'])->name('temoignages.edit');
     Route::put('/temoignages/{id}', [TemoignageController::class, 'update'])->name('temoignages.update');
     Route::delete('/temoignages/{id}', [TemoignageController::class, 'destroy'])->name('temoignages.destroy');
});
