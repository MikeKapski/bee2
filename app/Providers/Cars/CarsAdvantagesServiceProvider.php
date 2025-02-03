<?php

	namespace App\Providers\Cars;

	use App;
	use Illuminate\Support\ServiceProvider;
	use App\Services\Cars\CarsAdvantages;
	
	
	class CarsAdvantagesServiceProvider extends ServiceProvider
	{
		
		public function boot()
		{
			//
		}

		
		public function register()
		{
			$this->app->bind('CarsAdvantages',function($app){
				return new CarsAdvantages();
			});
		}
	}