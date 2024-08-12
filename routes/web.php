<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PromotionAdController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BodyPartController;
use App\Http\Controllers\CertificateImageController;
use App\Http\Controllers\ServiceProductController;
use App\Http\Controllers\ServiceImageController;
use App\Http\Controllers\ExpertController;

use App\Http\middleware\Role;

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

//admin routes
Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);


    Route::resource('promotionsAds', PromotionAdController::class);
    Route::resource('cities', CityController::class);
Route::resource('locations', LocationController::class);
Route::resource('bodyparts', BodyPartController::class);

});


//agent routes
Route::middleware(['auth','role:agent'])->group(function () {
    Route::get('/agent/dashboard',[AgentController::class,'dashboard'])->name('agent.dashboard');
    Route::resource('agents', AgentController::class);

    Route::resource('certificate_images', CertificateImageController::class);
    Route::resource('service_images', ServiceImageController::class);
    Route::resource('experts', ExpertController::class);
    Route::resource('services', ServiceProductController::class);
    Route::put('/services/{serviceProduct}/update', [ServiceProductController::class, 'update'])->name('services.update');
    Route::get('/services/{serviceProduct}/edit', [ServiceProductController::class, 'edit'])->name('services.edit');



    Route::get('/get-subcategories/{categoryId}', [ServiceProductController::class, 'getSubcategories']);


    Route::get('/get-bodyparts/{subcategoryId}', [ServiceProductController::class, 'getBodyparts']);

    Route::get('/get-locations/{cityId}', [ServiceProductController::class, 'getLocations']);




// Update Expert
Route::patch('/experts/{expert}', [ExpertController::class, 'update'])->name('experts.update');


// Remove Image
Route::delete('/experts/{expert}/remove_image/{image}', [ExpertController::class, 'removeImage'])->name('experts.remove_image');




});


Route::middleware('auth')->group(function () {



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
