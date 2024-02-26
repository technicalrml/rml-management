<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\TicketController;

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

Route::get('/', [LoginController::class, 'ShowViewLogin'])->name('ShowViewLogin');
Route::post('/', [LoginController::class, 'login'])->name('login');;

Route::middleware(['auth'])->group(function () {
    Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');
    // ROLE
    // VIEW
        Route::get('/role/view', [RoleController::class, 'index'])->name('viewrole');

    // ADD
        Route::get('/role/add', [RoleController::class, 'ShowViewroleAdd'])->name('viewroleadd');
        Route::post('/role/add', [RoleController::class, 'AddRole'])->name('addrole');

    // EDIT
        Route::get('/role/{id}/ShowViewEditrole', [RoleController::class, 'ShowViewEditrole'])->name('vieweditrole');
        Route::put('/role/{id}', [RoleController::class, 'updaterole'])->name('updaterole');

    // DELETE
        Route::get('/role/{id}', [RoleController::class, 'deleterole'])->name('deleterole');
    // END OF ROLE

    // PRODUCT
    // VIEW
    Route::get('/product/view', [ProductController::class, 'index'])->name('viewproduct');

    // ADD
    Route::get('/product/add', [ProductController::class, 'ShowViewproductAdd'])->name('viewproductadd');
    Route::post('/product/add', [ProductController::class, 'Addproduct'])->name('addproduct');

    // EDIT
    Route::get('/product/{id}/ShowViewEditrole', [ProductController::class, 'ShowViewEditproduct'])->name('vieweditproduct');
    Route::put('/product/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');

    // DELETE
    Route::get('/product/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
    // END OF PRODUCT

    // CUSTOMER
    // VIEW
    Route::get('/customer/view', [CustomerController::class, 'index'])->name('viewcustomer');

    // ADD
    Route::get('/customer/add', [CustomerController::class, 'ShowViewcustomerAdd'])->name('viewcustomeradd');
    Route::post('/customer/add', [CustomerController::class, 'Addcustomer'])->name('addcustomer');

    // EDIT
    Route::get('/customer/{id}/ShowViewEditrole', [CustomerController::class, 'ShowViewEditcustomer'])->name('vieweditcustomer');
    Route::put('/customer/{id}', [CustomerController::class, 'updatecustomer'])->name('updatecustomer');

    // DELETE
    Route::get('/customer/{id}', [CustomerController::class, 'deletecustomer'])->name('deletecustomer');
    // END OF CUSTOMER

    // USER
    // VIEW
        Route::get('/user/view', [UserController::class, 'index'])->name('viewuser');

    // ADD
        Route::get('/user/action', [UserController::class, 'ShowViewUserAdd'])->name('viewuseradd');
        Route::post('/user/action', [UserController::class, 'Adduser'])->name('adduser');

    // EDIT
        Route::get('/user/{id}/ShowViewEdituser', [UserController::class, 'ShowViewEdituser'])->name('viewedituser');
        Route::put('/user/{id}', [UserController::class, 'updateuser'])->name('updateuser');

    // DELETE
        Route::get('/user/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
    // END OF USER

    // LICENSE
    // VIEW
    Route::get('/license/view', [LicenseController::class, 'index'])->name('viewlicense');

    // ADD
    Route::get('/license/action', [LicenseController::class, 'ShowViewlicenseAdd'])->name('viewlicenseadd');
    Route::post('/license/action', [LicenseController::class, 'Addlicense'])->name('addlicense');

    // EDIT
    Route::get('/license/{id}/ShowViewEditlicense', [LicenseController::class, 'ShowViewEditlicense'])->name('vieweditlicense');
    Route::put('/license/{id}', [LicenseController::class, 'updatelicense'])->name('updatelicense');

    // DELETE
    Route::get('/license/{id}', [LicenseController::class, 'deletelicense'])->name('deletelicense');

    //DETAIL
    Route::get('/license/{id}/ShowDetailLicense', [LicenseController::class, 'ShowViewDetailLicense'])->name('viewdetaillicense');
    // END OF LICENSE

    // TICKET
    // VIEW
    Route::get('/ticket/view', [TicketController::class, 'index'])->name('viewticket');

    // ADD
    Route::get('/ticket/action', [TicketController::class, 'ShowViewticketAdd'])->name('viewticketadd');
    Route::post('/ticket/action', [TicketController::class, 'Addticket'])->name('addticket');

    // EDIT
    Route::get('/ticket/{id}/ShowViewEditticket', [TicketController::class, 'ShowViewEditticket'])->name('vieweditticket');
    Route::put('/ticket/{id}', [TicketController::class, 'updateticket'])->name('updateticket');

    // DELETE
    Route::get('/ticket/{id}', [TicketController::class, 'deleteticket'])->name('deleteticket');

    Route::get('/customer-products/{customer_id}', [TicketController::class, 'getCustomerProducts'])->name('getCustomerProducts');
    Route::get('/customer-products/{customer_id}/{product_id}', [TicketController::class, 'getCustomerProductLicense'])->name('getCustomerProductLicense');

    //DETAIL
    Route::get('/ticket/{id}/ShowDetailTicket', [TicketController::class, 'ShowViewDetailTicket'])->name('viewdetailticket');

    //PROGRESS
    Route::get('/ticket/{id}/UpdateProgressTicket', [TicketController::class, 'ShowProgressTicket'])->name('viewprogressticket');
    Route::post('/ticket/addprogress', [TicketController::class, 'UpdateProgressticket'])->name('updateprogress');
    // END OF TICKET

});



