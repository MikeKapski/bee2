<?php

	namespace App\Providers\Pages;

	use App;
	use Illuminate\Support\ServiceProvider;
	use App\Services\Pages\Pages;
	
	
	class PagesServiceProvider extends ServiceProvider
	{
		
		public function boot()
		{
			//
		}

		
		public function register()
		{
			$this->app->bind('Pages',function($app){
				return new Pages ();
			});
		}
	}