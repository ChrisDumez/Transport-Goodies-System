<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UpdatesController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/overview-dashboard', [OrderController::class, 'overviewdashboard'])->name('overview-dashboard');
    Route::get('/orders-dashboard', [OrderController::class, 'ordersdashboard'])->name('orders-dashboard');
    Route::get('/expenses-dashboard', [OrderController::class, 'expensesdashboard'])->name('expenses-dashboard');
    //Route::post('/user-login', [UserController::class, 'UserLogin']);

    //Customers Controller Routes
    Route::get('/customers-dashboard', [CustomerController::class, 'CustomersDashboard'])->name('customers-dashboard');
    Route::post('/add-customer', [CustomerController::class, 'addCustomer'])->name('add-customer');
    //Route::get('/edit-customer/{id}', [CustomerController::class, 'EditCustomer'])->name('edit-customer');
    Route::get('/display-customerdetails/{id}', [CustomerController::class, 'DisplayCustomerDetails'])->name('display-customerdetails');
    Route::get('/edit-customerdetails', [CustomerController::class, 'EditCustomerDetails'])->name('edit-customerdetails');
    Route::post('/update-customerdetails', [CustomerController::class, 'UpdateCustomerDetails'])->name('update-customerdetails');

    //Orders Controller Routes
    Route::get('/orders-dashboard', [OrderController::class, 'OrdersDashboard'])->name('orders-dashboard');
    Route::get('/display-allorders', [OrderController::class, 'AllOrdersView'])->name('display-allorders');
    Route::get('/add-orderview/{id}', [OrderController::class, 'AddOrderView'])->name('add-orderview');
    Route::post('/add-order', [OrderController::class, 'SaveOrder'])->name('add-order');
    Route::post('/edit-order', [OrderController::class, 'EditOrder'])->name('edit-order');
    Route::post('/update-order', [OrderController::class, 'UpdateOrder'])->name('update-order');
    Route::get('/display-orderdetails/{id}', [OrderController::class, 'DisplayOrderDetails'])->name('display-orderdetails');
    Route::get('/search-order', [OrderController::class, 'SearchOrder'])->name('search-order');

    //Orders Updates Controller Routes
    Route::get('/display-orderupdates/{id}', [UpdatesController::class, 'OrdersUpdatesView'])->name('display-orderupdates');
    Route::post('/add-update', [UpdatesController::class, 'UpdateOrder'])->name('add-update');
});

require __DIR__.'/auth.php';
