<?php

	namespace App\Providers\Cars;

	use App;
	use Illuminate\Support\ServiceProvider;
	use App\Services\Cars\CarsPhotos;
	
	
	class CarsPhotosServiceProvider extends ServiceProvider
	{
		
		public function boot()
		{
			//
		}

		
		public function register()
		{
			$this->app->bind('CarsPhotos',function($app){
				return new CarsPhotos ();
			});
		}
	}