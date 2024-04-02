<?php
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...

]);



Route::middleware(['auth'])->group(function (){
    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('users', [UsersController::class, 'index'])->name('users.index');
    Route::get('users/profile', [UsersController::class, 'edit'])->name('users.edit-profile');
    Route::put('users/profile/{user}', [UsersController::class, 'update'])->name('users.update-profile');
    Route::get('company-detail', [CompanyController::class, 'index'])->name('company');
    Route::put('company-detail/update/{company}', [CompanyController::class, 'update'])->name('company.update');

    Route::get('content-detail', [ContentController::class, 'index'])->name('content');
    Route::put('content-detail/update/{content}', [ContentController::class, 'update'])->name('content.update');

    Route::resource('services', ServicesController::class);



    Route::resource('faqs', FaqsController::class);

    Route::resource('questions', QuestionsController::class);

    Route::resource('articles', ArticlesController::class);


    Route::get('logout', [LoginController::class, 'logout']);


});

//Route::get("generate-sitemap", function () {
//
//    SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
//
//});

