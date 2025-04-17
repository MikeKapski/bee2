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

        /*Возврат марки матомобиля*/
        function ReturnBrandNameByID($BrandID){

            $BrandName = CarsBrandsModel::where('ID', '=', $BrandID)->value('BrandName');
            
			if(!empty($BrandName)){
				return $BrandName;
			} else {
				return false;
			}

        }

    }