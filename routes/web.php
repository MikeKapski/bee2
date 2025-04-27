<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoutingController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CmsController;


    /*Frontend Routing*/
    Route::get('/', [RoutingController::class, 'mainpage']);
    Route::get('/park-avto/{slug}', [RoutingController::class, 'AutoSingle']);
    
    Route::get('/park-brands/',         [RoutingController::class, 'AutoBrand']);
    Route::get('/park-brands/{slug}',   [RoutingController::class, 'AutoBrandItem']);

    Route::get('/uslovia-prokata', [RoutingController::class, 'uslovia']);
    Route::get('/o-kompanii',      [RoutingController::class, 'about']);
    Route::get('/contacts',        [RoutingController::class, 'contacts']);


    Route::post('/ajaxworker/', [AjaxController::class, 'Ajaxworker']);

    //Роуты Авторизации
    Route::get('/login', [UserController::class, 'UserLogin'])->name('login'); 
    //Poуты Админки
    Route::prefix('cms')->middleware(['auth'])->group(function () {

        Route::get('/', [CmsController::class, 'CmsMainPage']);

    });
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


