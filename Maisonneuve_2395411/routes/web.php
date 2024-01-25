<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\App;

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
    return view('home');
});


/* ------- * ROUTES ÉTUDIANTS * -------  */ 



// Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
// Route::post('/etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');




/* ------- * ROUTES LOGIN/AUTHENTICATION * ------- */

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/authentication', [CustomAuthController::class, 'authentication'])->name('login.authentication');
Route::get('/forgot-password', [CustomAuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [CustomAuthController::class, 'tempPassword'])->name('temp.password');
Route::get('/new-password/{user}/{tempPassword}', [CustomAuthController::class, 'newPassword'])->name('new.password');
Route::post('/new-password/{user}/{tempPassword}', [CustomAuthController::class, 'storeNewPassword']);
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');


/* ------- * CRÉER ET STOCKER NOUVEL COMPTE * ------- */

// Route::get('/registration',[CustomAuthController::class, 'create'])->name('registration')->middleware('can:create-users');
Route::get('/registration',[CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration',[CustomAuthController::class, 'store']);


/* ------- * UNE FOIS CONNECTÉ/É... * ------- */

Route::get('/dashboard', [ArticleController::class, 'index'])->name('dashboard')->middleware('auth');


/* ------- * UNE FOIS CONNECTÉ/É : Profil étudiant/e * ------- */

Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');
Route::get('/etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::put('/etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update')->middleware('auth');
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete')->middleware('auth');


/* ------- * UNE FOIS CONNECTÉ/É : Article * ------- */

Route::get('/article-create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article-create',[ArticleController::class, 'store'])->middleware('auth');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('/article-edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/article-edit/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth', 'owner');
Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.delete')->middleware('auth', 'owner');


/* ------- * LANGUE * ------- */

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');



/* ------- * * * VIEWS * * * ------- */

// HOMEPAGE
// URL slug : '/'
// views files: 
//     views/layouts/layout.blade.php
//     views/home.blade.php

// CREER COMPTE
// URL slug : '/registration'
// views files: 
//     views/layouts/layout.blade.php
//     views/auth/create.blade.php

// LOGIN
// URL slug : '/login'
// views files: 
//     views/layouts/layout.blade.php
//     views/auth/login.blade.php

// DASHBOARD
// URL slug : '/dashboard'
// views files: 
//     views/layouts/layout.blade.php
//     views/article/index.blade.php

// MON PROFIL
// URL slug : '/etudiant/(id#)'
// views files: 
//     views/layouts/layout.blade.php
//     views/etudiant/show.blade.php

// MODIFIER MON PROFIL
// URL slug : '/etudiant-edit/(id#)'
// views files: 
//     views/layouts/layout.blade.php
//     views/etudiant/edit.blade.php