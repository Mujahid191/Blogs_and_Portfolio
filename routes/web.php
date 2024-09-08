<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\PortfolioController;

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
// })->middleware(['auth', 'verified'])->name('dashboardq');

// Auth All Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profileUpdate', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Backend Routes
Route::middleware('auth', 'verified')->group( function() {
    Route::view('/admin', 'admin.dashboard')->name('dashboard');
    Route::view('/admin/profile', 'admin.profile')->name('profile');
    Route::view('/admin/passwordUpdate', 'profile.partials.update-password-form')->name('passwordUpdate');

    // Home Slider Controller
    Route::controller(HomeSliderController::class)->group( function() {
        Route::get('/admin/homeSlider', 'homeSlider')->name('homeSlider');
        Route::put('/admin/sliderUpdate', 'sliderUpdate')->name('sliderUpdate');
    });

    // About Page Controller
    Route::view('/admin/multiImages', 'admin.addMultiImages')->name('multiImages');
    Route::controller(AboutController::class)->group( function() {
        Route::get('/admin/about', 'admin_about')->name('admin_about');
        Route::put('/admin/updateAbout', 'updateAbout')->name('updateAbout')->middleware('auth');
        Route::get('/admin/aboutAllImages', 'aboutAllImages')->name('aboutAllImages');
        // Multi Images Route
        Route::post('/admin/addMultiImages', 'addMultiImages')->name('addMultiImages');
        Route::get('/admin/editMultiImages/{id}', 'editMultiImages')->name('editMultiImages');
        Route::put('/admin/updateMultiImages/', 'updateMultiImages')->name('updateMultiImages');
        Route::get('/admin/deleteMultiImages/{id}', 'deleteMultiImages')->name('deleteMultiImages');
    });

    // Portfolio Page Controller
    Route::view('/admin/addPortfolio', 'admin.addPortfolio')->name('addPortfolio');
    Route::controller(PortfolioController::class)->group( function() {
        Route::get('/admin/allPortfolio', 'allPortfolio')->name('allPortfolio');
        Route::post('/admin/newPortfolio', 'newPortfolio')->name('newPortfolio');
        Route::get('/admin/editPortfolio/{id}', 'editPortfolio')->name('editPortfolio');
        Route::put('/admin/updatePortfolio', 'updatePortfolio')->name('updatePortfolio');
        Route::get('/admin/deletePortfolio/{id}', 'deletePortfolio')->name('deletePortfolio');
    });
    
    // Categories Controller
    Route::view('/admin/addCategory', 'admin.addCategory')->name('addCategory');
    Route::controller(CategoryController::class)->group( function() {
        Route::get('/admin/allCategories', 'allCategories')->name('allCategories');
        Route::post('/admin/newCategory', 'newCategory')->name('newCategory');
        Route::get('/admin/editCategory/{id}', 'editCategory')->name('editCategory');
        Route::put('/admin/updateCategory', 'updateCategory')->name('updateCategory');
        Route::get('/admin/deleteCategory/{id}', 'deleteCategory')->name('deleteCategory');
    });

    // Blog Controller
    Route::controller(BlogController::class)->group( function() {
        Route::get('/admin/addBlog', 'addBlog')->name('addBlog');
        Route::post('/admin/newBlog', 'newBlog')->name('newBlog');
        Route::get('/admin/allBlogs', 'allBlogs')->name('allBlogs');
        Route::get('/admin/editBlog/{id}', 'editBlog')->name('editBlog');
        Route::put('/admin/updateBlog', 'updateBlog')->name('updateBlog');
        Route::get('/admin/deleteBlog/{id}', 'deleteBlog')->name('deleteBlog');
    });

    // Footer Controller
    Route::controller(FooterController::class)->group( function () {
        Route::get('/admin/footer', 'footerPage')->name('footerPage');
        Route::put('/admin/update/footer', 'updateFooter')->name('updateFooter');
    });

    // Contact Controller
    Route::controller(ContactController::class)->group( function() {
        Route::post('/save/message', 'saveMessage')->name('saveMessage');
        Route::get('/admin/messages', 'messages')->name('messages');
        Route::get('/admin/deleteMessage/{id}', 'deleteMessage')->name('deleteMessage');
    });
});
// Frontend Routes
Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/services', 'services')->name('services');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/blogs', 'blogs')->name('blogs');
Route::view('/portfolio/detail/{id}', 'portfolioDetail')->name('portfolioDetail');
Route::view('/blog/detail/{id}', 'blogDetail')->name('blogDetail');
Route::view('/category/blogs/{id}', 'categoryBlogs')->name('categoryBlogs');
