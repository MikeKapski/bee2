<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoutingController;


    /*Frontend Routing*/
    Route::get('/', [RoutingController::class, 'mainpage']);



/*Route::get('/uslovia-prokata', 'RoutingController@uslovia');
Route::get('/oplata',   'RoutingController@oplatapage');
Route::get('/o-kompanii', 'RoutingController@okompanii');
Route::get('/contacts', 'RoutingController@contactspage');
Route::get('/wishlist', 'RoutingController@WishList');
Route::get('/compare',  'RoutingController@Compare');
Route::get('/policy',   'RoutingController@Policy');
	
Route::get('/rewiev',   'RoutingController@Rewiev');
	
Route::get('/park-avto', 'RoutingController@ParkAuto');
Route::get('/park-avto/{slug}', 'RoutingController@AutoSingle');
	
Route::get('/arenda-gruzovyh-auto', 'RoutingController@CargoAuto');
	
	
Route::get('/promo', 'RoutingController@Promo');
Route::get('/promo/{slug}', 'RoutingController@PromoSingle');*/


