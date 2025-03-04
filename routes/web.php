<?php

use App\Http\Controllers\FrontControler;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMaincategoryController;
use App\Http\Controllers\Admin\AdminSubcategoryController;
use App\Http\Controllers\Admin\AdminBrandController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminProductController;




Route::get('/', [FrontControler::class, "homePage"])->name("home");
Route::get('/about', [FrontControler::class, "aboutPage"])->name("about");
Route::get('/shop', [FrontControler::class, "shopPage"])->name("shop");
Route::get('/features', [FrontControler::class, "featuresPage"])->name("features");
Route::get('/testimonials', [FrontControler::class, "testimonialsPage"])->name("testimonials");
Route::get('/contact', [FrontControler::class, "contactPage"])->name("contact");

// admin routes----------------------------------------------------------------------------
Route::group(["prefix" => "admin"], function () {
    route::get("/", [AdminHomeController::class, "index"])->name("admin-home");

    Route::group(["prefix" => "maincategory"], function () {
        route::get("/", [AdminMaincategoryController::class, "index"])->name("admin-maincategory");
        route::get("/create", [AdminMaincategoryController::class, "create"])->name("admin-create-maincategory");
        route::Post("/store", [AdminMaincategoryController::class, "store"])->name("admin-store-maincategory");
        route::get("/destroy/{id}", [AdminMaincategoryController::class, "destroy"])->name("admin-destroy-maincategory");
        route::get("/edit/{id}", [AdminMaincategoryController::class, "edit"])->name("admin-edit-maincategory");
        route::Post("/update/{id}", [AdminMaincategoryController::class, "update"])->name("admin-update-maincategory");
    });

    Route::group(["prefix" => "subcategory"], function () {
        route::get("/", [AdminSubcategoryController::class, "index"])->name("admin-subcategory");
        route::get("/create", [AdminSubcategoryController::class, "create"])->name("admin-create-subcategory");
        route::Post("/store", [AdminSubcategoryController::class, "store"])->name("admin-store-subcategory");
        route::get("/destroy/{id}", [AdminSubcategoryController::class, "destroy"])->name("admin-destroy-subcategory");
        route::get("/edit/{id}", [AdminSubcategoryController::class, "edit"])->name("admin-edit-subcategory");
        route::Post("/update/{id}", [AdminSubcategoryController::class, "update"])->name("admin-update-subcategory");
    });

    Route::group(["prefix" => "brand"], function () {
        route::get("/", [AdminBrandController::class, "index"])->name("admin-brand");
        route::get("/create", [AdminBrandController::class, "create"])->name("admin-create-brand");
        route::Post("/store", [AdminBrandController::class, "store"])->name("admin-store-brand");
        route::get("/destroy/{id}", [AdminBrandController::class, "destroy"])->name("admin-destroy-brand");
        route::get("/edit/{id}", [AdminBrandController::class, "edit"])->name("admin-edit-brand");
        route::Post("/update/{id}", [AdminBrandController::class, "update"])->name("admin-update-brand");
    });

    Route::group(["prefix" => "testimonial"], function () {
        route::get("/", [AdminTestimonialController::class, "index"])->name("admin-testimonial");
        route::get("/create", [AdminTestimonialController::class, "create"])->name("admin-create-testimonial");
        route::Post("/store", [AdminTestimonialController::class, "store"])->name("admin-store-testimonial");
        route::get("/destroy/{id}", [AdminTestimonialController::class, "destroy"])->name("admin-destroy-testimonial");
        route::get("/edit/{id}", [AdminTestimonialController::class, "edit"])->name("admin-edit-testimonial");
        route::Post("/update/{id}", [AdminTestimonialController::class, "update"])->name("admin-update-testimonial");
    });

    Route::group(["prefix" => "product"], function () {
        route::get("/", [AdminProductController::class, "index"])->name("admin-product");
        route::get("/create", [AdminProductController::class, "create"])->name("admin-create-product");
        route::Post("/store", [AdminProductController::class, "store"])->name("admin-store-product");
        route::get("/destroy/{id}", [AdminProductController::class, "destroy"])->name("admin-destroy-product");
        route::get("/edit/{id}", [AdminProductController::class, "edit"])->name("admin-edit-product");
        route::Post("/update/{id}", [AdminProductController::class, "update"])->name("admin-update-product");
    });

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
