<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SubCateoryController;
use App\Http\Controllers\CompanyController;

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[EmployeeController::class,'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('user',UserController::class);
    Route::resource('role',RoleController::class);
    Route::resource('permission',PermissionController::class);


 
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('getCategoryData', [CategoryController::class, 'getCategoryData'])->name('category.getCategoryData');  
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');


    //company routes
    Route::get('company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('company/create', [CompanyController::class, 'create'])->name('company.create'); 
    Route::get('getCompanyData', [CompanyController::class, 'getCompanyData'])->name('company.getCompanyData');  
    Route::post('company/store', [CompanyController::class, 'store'])->name('company.store'); 
    // Route::get('company/{company}/show',[CompanyController::class, 'show'])->name('company.show');
    Route::get('company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('company/{company}/update',[CompanyController::class, 'update'])->name('company.update');
    Route::delete('company/{company}/destroy',[CompanyController::class, 'destroy'])->name('company.destroy');

    //employee routes
    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('employee/create', [EmployeeController::class, 'create'])->name('employee.create');  
    Route::get('getEmployeeData', [EmployeeController::class, 'getEmployeeData'])->name('employee.getEmployeeData');  
    Route::post('employee/store', [EmployeeController::class, 'store'])->name('employee.store'); 
    Route::get('employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('employee/{employee}/update',[EmployeeController::class, 'update'])->name('employee.update');
    Route::delete('employee/{employee}/destroy',[EmployeeController::class, 'destroy'])->name('employee.destroy');


    Route::resource('subcategory',SubCateoryController::class);
 
    Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
    Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');
});
