<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AjaxController;


    /*Frontend Routing*/
    Route::get('/', [RoutingController::class, 'mainpage']);
    Route::get('/park-avto/{slug}', [RoutingController::class, 'AutoSingle']);

    Route::get('/uslovia-prokata', [RoutingController::class, 'uslovia']);
    Route::get('/o-kompanii',      [RoutingController::class, 'about']);
    Route::get('/contacts',        [RoutingController::class, 'contacts']);


    Route::post('/ajaxworker/', [AjaxController::class, 'Ajaxworker']);

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


