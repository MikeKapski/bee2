<?php

	namespace App\Facades\Cars; 
	
	use Illuminate\Support\Facades\Facade;

	class CarsBrandsFacade extends Facade 
	{
		protected static function getFacadeAccessor() { return 'CarsBrands'; }
	}	