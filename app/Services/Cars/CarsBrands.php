<?php

	namespace App\Services\Cars;

	use App\Models\Cars\CarsBrandsModel;
	
	class CarsBrands{

        function ReturnAll(){
            $CarsBrands = CarsBrandsModel::orderBy('Orders')->get();
            return $CarsBrands;
        }

        /*Воврат ID марки по ID  страницы*/
        function ReturnBrandIDByPageID($PageID){

            $ID = CarsBrandsModel::where('BrandPageID', '=', $PageID)->value('ID');
			if(!empty($ID)){
				return $ID;
			} else {
				return false;
			}

        }

    }