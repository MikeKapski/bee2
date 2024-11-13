<?php

	namespace App\Providers\Cars;

	use App;
	use Illuminate\Support\ServiceProvider;
	use App\Services\Cars\CarsBrands;
	
	
	class CarsBrandsServiceProvider extends ServiceProvider
	{
		
		public function boot()
		{
			//
		}

		
		public function register()
		{
			$this->app->bind('CarsBrands',function($app){
				return new CarsBrands ();
			});
		}
	}