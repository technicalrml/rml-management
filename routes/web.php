<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;


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

//ALL
Route::get('/', [LoginController::class, 'ShowViewLogin'])->name('ShowViewLogin');
Route::post('/', [LoginController::class, 'login'])->name('login');;

//AUTH
Route::middleware(['auth'])->group(function () {
//    LOGOUT
    Route::post('/auth/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//    PROFILE
    Route::get('/profile/{id}', [UserController::class, 'ShowViewProfileuser'])->name('viewprofile');

//    CHANGE PASSWORD
    Route::get('/changepassword/{id}', [UserController::class, 'ShowViewChangePassword'])->name('viewchangepassword');
    Route::put('/changepassword/{id}', [UserController::class, 'changePassword'])->name('changepassword');

//    LICENSE
//    VIEW
    Route::get('/license', [LicenseController::class, 'index'])->name('viewlicense');

//    PRODUCT
//    VIEW
    Route::get('/product', [ProductController::class, 'index'])->name('viewproduct');


});

//ADMINISTRATOR
Route::middleware(['auth','checkRole_id:RL001'])->group(function () {
//    ROLE
//    VIEW
    Route::get('/role' ,[RoleController::class,'index'])->name('viewrole');

//    ADD
    Route::get('/addrole', [RoleController::class, 'ShowViewroleAdd'])->name('viewroleadd');
    Route::post('/addrole', [RoleController::class, 'AddRole'])->name('addrole');

//    EDIT
    Route::get('/editrole/{role_id}', [RoleController::class, 'ShowViewEditrole'])->name('vieweditrole');
    Route::put('/editrole/{role_id}', [RoleController::class, 'updaterole'])->name('updaterole');

//    DELETE
    Route::get('/deleterole/{role_id}', [RoleController::class, 'deleterole'])->name('deleterole');

//    END OF ROLE

//    USER
//    VIEW
    Route::get('/user', [UserController::class, 'index'])->name('viewuser');

//    ADD
    Route::get('/adduser', [UserController::class, 'ShowViewUserAdd'])->name('viewuseradd');
    Route::post('/adduser', [UserController::class, 'Adduser'])->name('adduser');

//    EDIT
    Route::get('/edituser/{id}', [UserController::class, 'ShowViewEdituser'])->name('viewedituser');
    Route::put('/edituser/{id}', [UserController::class, 'updateuser'])->name('updateuser');

//    DELETE
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');
//    END OF USER
});

//ADMINISTRATOR & OWNER
Route::middleware(['auth', 'checkRole_id:RL001,RL002'])->group(function () {
//    CUSTOMER
//    VIEW
    Route::get('/customer', [CustomerController::class, 'index'])->name('viewcustomer');

//    ADD
    Route::get('/addcustomer', [CustomerController::class, 'ShowViewcustomerAdd'])->name('viewcustomeradd');
    Route::post('/addcustomer', [CustomerController::class, 'Addcustomer'])->name('addcustomer');

//    EDIT
    Route::get('/editcustomer/{id}', [CustomerController::class, 'ShowViewEditcustomer'])->name('vieweditcustomer');
    Route::put('/editcustomer/{id}', [CustomerController::class, 'updatecustomer'])->name('updatecustomer');

//    DELETE
    Route::get('/deletecustomer/{id}', [CustomerController::class, 'deletecustomer'])->name('deletecustomer');
//    END OF CUSTOMER

//    PRODUCT
//    ADD
    Route::get('/addproduct', [ProductController::class, 'ShowViewproductAdd'])->name('viewproductadd');
    Route::post('/addproduct', [ProductController::class, 'Addproduct'])->name('addproduct');

//    EDIT
    Route::get('/editproduct/{id}', [ProductController::class, 'ShowViewEditproduct'])->name('vieweditproduct');
    Route::put('/editproduct/{id}', [ProductController::class, 'updateproduct'])->name('updateproduct');
//    DELETE
    Route::get('/deleteproduct/{id}', [ProductController::class, 'deleteproduct'])->name('deleteproduct');
//    END OF PRODUCT
});

//ADMINISTRATOR, TECHNICAL & OWNER
Route::middleware(['auth', 'checkRole_id:RL001,RL005,RL002'])->group(function () {
//   TICKET
//    VIEW
    Route::get('/ticketopen', [TicketController::class, 'index'])->name('viewticket');
    Route::get('/ticketclose', [TicketController::class, 'ticketclose'])->name('viewticketclose');

});

//ADMINISTRATOR & TECHNICAL
Route::middleware(['auth', 'checkRole_id:RL001,RL005'])->group(function () {
//    TICKET
//    ADD
    Route::get('/addticket', [TicketController::class, 'ShowViewticketAdd'])->name('viewticketadd');
    Route::post('/addticket', [TicketController::class, 'Addticket'])->name('addticket');

//    EDIT
    Route::get('/editticket/{id}', [TicketController::class, 'ShowViewEditticket'])->name('vieweditticket');
    Route::put('/editticket/{id}', [TicketController::class, 'updateticket'])->name('updateticket');

//    DELETE
    Route::get('/deleteticket/{id}', [TicketController::class, 'deleteticket'])->name('deleteticket');

//    DETAIL
    Route::get('/detailticket/{id}', [TicketController::class, 'ShowViewDetailTicket'])->name('viewdetailticket');

//    POGRESS
    Route::get('/progressticket/{id}/', [TicketController::class, 'ShowProgressTicket'])->name('viewprogressticket');
    Route::post('/progressticket/{id}/addprogress', [TicketController::class, 'UpdateProgressticket'])->name('updateprogress');

    Route::get('/customer-products/{customer_id}', [TicketController::class, 'getCustomerProducts'])->name('getCustomerProducts');
    Route::get('/customer-products/{customer_id}/{product_id}', [TicketController::class, 'getCustomerProductLicense'])->name('getCustomerProductLicense');
//    END OF TICKET
});

Route::middleware(['auth', 'checkRole_id:RL001,RL005,RL002,RL004'])->group(function () {
//    LICENSE
//    ADD
    Route::get('/addlicense', [LicenseController::class, 'ShowViewlicenseAdd'])->name('viewlicenseadd');
    Route::post('/addlicense', [LicenseController::class, 'Addlicense'])->name('addlicense');

//    EDIT
    Route::get('/editlicense/{id}', [LicenseController::class, 'ShowViewEditlicense'])->name('vieweditlicense');
    Route::put('/editlicense/{id}', [LicenseController::class, 'updatelicense'])->name('updatelicense');

//    DELETE
    Route::get('/deletelicense/{id}', [LicenseController::class, 'deletelicense'])->name('deletelicense');

//    DETAIL
    Route::get('/detaillicense/{id}', [LicenseController::class, 'ShowViewDetailLicense'])->name('viewdetaillicense');

//    END OF LICENSE
});

