<?php

	namespace App\Facades\Cars; 
	
	use Illuminate\Support\Facades\Facade;

	class CarsFacade extends Facade 
	{
		protected static function getFacadeAccessor() { return 'Cars'; }
	}	