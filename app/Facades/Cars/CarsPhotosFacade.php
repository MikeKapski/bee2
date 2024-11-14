<?php

	namespace App\Facades\Cars; 
	
	use Illuminate\Support\Facades\Facade;

	class CarsPhotosFacade extends Facade 
	{
		protected static function getFacadeAccessor() { return 'CarsPhotos'; }
	}	