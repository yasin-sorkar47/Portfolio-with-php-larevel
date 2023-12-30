<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AppearanceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\CatrgoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\technologyController;
use App\Http\Controllers\UserController;
use App\Models\About;
use App\Models\User;
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

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard']);
        
        //Slider Route 
        Route::get('/slider/index', [SliderController::class, 'index'])->name('back.slider.index');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('back.slider.create');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('back.slider.store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('back.slider.edit');
        Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('back.slider.update');
        Route::post('/slider/delete', [SliderController::class, 'delete'])->name('back.slider.delete');
        
        //About Route
        Route::get('/about/index', [AboutController::class, 'index'])->name('back.about.index');
        Route::get('/about/create', [AboutController::class, 'create'])->name('back.about.create');
        Route::post('/about/store', [AboutController::class, 'store'])->name('back.about.store');
        Route::get('/about/edit/{slug}', [AboutController::class, 'edit'])->name('back.about.edit');
        Route::post('/about/update/{slug}', [AboutController::class, 'update'])->name('back.about.update');
        Route::post('/about/delete', [AboutController::class, 'delete'])->name('back.about.delete');
        
        // Service Route
        Route::get('/service/index', [ServiceController::class, 'index'])->name('back.service.index');
        Route::get('/service/create', [ServiceController::class, 'create'])->name('back.service.create');
        Route::post('/service/store', [ServiceController::class, 'store'])->name('back.service.store');
        Route::get('/service/edit/{slug}', [ServiceController::class, 'edit'])->name('back.service.edit');
        Route::post('/service/update/{slug}', [ServiceController::class, 'update'])->name('back.service.update');
        Route::post('/service/delete', [ServiceController::class, 'delete'])->name('back.service.delete');
        
        // Category Route
        Route::get('/category/index', [CategoryController::class, 'index'])->name('back.category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('back.category.create');
        Route::post('/category/store', [CategoryController::class, 'store'])->name('back.category.store');
        Route::get('/category/edit/{slug}', [CategoryController::class, 'edit'])->name('back.category.edit');
        Route::post('/category/update/{slug}', [CategoryController::class, 'update'])->name('back.category.update');
        Route::post('/category/delete', [CategoryController::class, 'delete'])->name('back.category.delete');

        // Blog Route
        Route::get('/blog/index', [BlogController::class, 'index'])->name('back.blog.index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('back.blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('back.blog.store');
        Route::get('/blog/edit/{slug}', [BlogController::class, 'edit'])->name('back.blog.edit');
        Route::post('/blog/update/{slug}', [BlogController::class, 'update'])->name('back.blog.update');
        Route::post('/blog/delete', [BlogController::class, 'delete'])->name('back.blog.delete');

        // User Route 
        Route::get('user/index', [UserController::class, 'index'])->name('back.user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('back.user.create');
        Route::post('user/store', [UserController::class, 'store'])->name('back.user.store');
        Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('back.user.edit');
        Route::post('user/update/{id}', [UserController::class, 'update'])->name('back.user.update');
        Route::post('user/delete', [UserController::class, 'delete'])->name('back.user.delete');

        // Address Route 
        Route::get('address/index', [AddressController::class, 'index'])->name('back.address.index');
        Route::get('address/create', [AddressController::class, 'create'])->name('back.address.create');
        Route::post('address/store', [AddressController::class, 'store'])->name('back.address.store');
        Route::get('address/edit/{id}', [AddressController::class, 'edit'])->name('back.address.edit');
        Route::post('address/update/{id}', [AddressController::class, 'update'])->name('back.address.update');
        Route::post('address/delete', [AddressController::class, 'delete'])->name('back.address.delete');

        // Portfolio Route 
        Route::get('portfolio/index', [PortfolioController::class, 'index'])->name('back.portfolio.index');
        Route::get('portfolio/create', [PortfolioController::class, 'create'])->name('back.portfolio.create');
        Route::post('portfolio/store', [PortfolioController::class, 'store'])->name('back.portfolio.store');
        Route::get('portfolio/edit/{slug}', [PortfolioController::class, 'edit'])->name('back.portfolio.edit');
        Route::post('portfolio/update/{slug}', [PortfolioController::class, 'update'])->name('back.portfolio.update');
        Route::post('portfolio/delete', [PortfolioController::class, 'delete'])->name('back.portfolio.delete');

        // Social Route
        Route::get('/social/create', [SocialController::class, 'create'])->name('back.social.create');
        Route::post('/social/store', [SocialController::class, 'store'])->name('back.social.store');
    
        // Appearance Route 
        Route::get('/create/appearance', [AppearanceController::class, 'create'])->name('back.appearance.create');
        Route::post('/store/appearance', [AppearanceController::class, 'store'])->name('back.appearance.store');
      
          // Address Route 
          Route::get('technology/index', [technologyController::class, 'index'])->name('back.technology.index');
          Route::get('technology/create', [technologyController::class, 'create'])->name('back.technology.create');
          Route::post('technology/store', [technologyController::class, 'store'])->name('back.technology.store');
          Route::get('technology/edit/{id}', [technologyController::class, 'edit'])->name('back.technology.edit');
          Route::post('technology/update/{id}', [technologyController::class, 'update'])->name('back.technology.update');
          Route::post('technology/delete', [technologyController::class, 'delete'])->name('back.technology.delete');
  

    });
});
