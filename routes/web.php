<?php
    use App\Http\Controllers\adminController;
    use App\Http\Controllers\homeController;
    use Illuminate\Support\Facades\Route;

    //hotel
    Route::get('/getHotHotel',[homecontroller::class, 'getHotHotel']);
    Route::get('/getAllHotel',[homecontroller::class, 'getAllHotel']);

    //customer
    Route::get('/getCustomers',[homecontroller::class, 'getCustomers']);
    Route::post('/getCustomerByID',[homecontroller::class, 'getCustomerByID']);
    Route::post('/insertCustomer',[homecontroller::class, 'insertCustomer']);
    Route::post('/updateCustomerPhone',[homecontroller::class, 'updateCustomerPhone']);
    
    //ticket
    Route::get('/getTicket',[homecontroller::class, 'getTicket']);
    Route::get('/limitTicket',[homecontroller::class, 'getlimitTicket']);

    //restaurant
    Route::get('/getHotRestaurant',[homecontroller::class, 'getHotRestaurant']);
    Route::get('/getAllRestaurant',[homecontroller::class, 'getAllRestaurant']);

    //wishlist
    Route::post('/getWishlistTicKet',[homecontroller::class, 'getWishlistTicKet']);
    Route::post('/getWishlistRes',[homecontroller::class, 'getWishlistRes']);
    Route::post('/getWishlistHotel',[homecontroller::class, 'getWishlistHotel']);
    Route::post('/insertWishlistHotel',[homecontroller::class, 'insertWishlistHotel']);
    Route::post('/insertWishlistTicKet',[homecontroller::class, 'insertWishlistTicKet']);
    Route::post('/insertWishlistRes',[homecontroller::class, 'insertWishlistRes']);


    // region
    Route::get('/getRegion',[homecontroller::class, 'getRegion']);
    Route::post('/getByRegion',[homecontroller::class, 'getByRegion']);
    // Route::get('/',[homecontroller::class, 'getRestaurent']);
    // Route::get('/',[homecontroller::class, 'getRestaurent']);
    Route::get('/test',[homecontroller::class, 'getCurrentDate']);



    //admin mana
    Route::get('/home',[homecontroller::class, 'index']);

