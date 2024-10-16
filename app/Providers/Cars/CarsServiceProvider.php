<?php

	namespace App\Providers\Cars;

	use App;
	use Illuminate\Support\ServiceProvider;
	use App\Services\Cars\Cars;
	
	
	class CarsServiceProvider extends ServiceProvider
	{
		
		public function boot()
		{
			//
		}

		
		public function register()
		{
			$this->app->bind('Cars',function($app){
				return new Cars ();
			});
		}
	}