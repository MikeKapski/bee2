<?php

	namespace App\Services\Cars;

	use App\Models\Cars\CarsBrandsModel;
	
	class CarsBrands{

        function ReturnAll(){
            $CarsBrands = CarsBrandsModel::orderBy('Orders')->get();
            return $CarsBrands;
        }

    }