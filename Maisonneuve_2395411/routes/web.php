<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LocalizationController;

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

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('/etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.store');
Route::get('/etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant-edit/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');


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

Route::get('/dashboard', [CustomAuthController::class, 'index'])->name('index');
Route::get('/user-list',[CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');

/* ------- * ROUTES ARTICLE * ------- */
Route::get('/article-create', [ArticleController::class, 'create'])->name('article.create');


Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');