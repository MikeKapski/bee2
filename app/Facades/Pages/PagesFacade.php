<?php

	namespace App\Facades\Pages; 
	
	use Illuminate\Support\Facades\Facade;

	class PagesFacade extends Facade 
	{
		protected static function getFacadeAccessor() { return 'Pages'; }
	}	