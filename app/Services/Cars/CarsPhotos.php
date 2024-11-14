<?php

	namespace App\Services\Cars;

	use App\Models\Cars\CarsPhotosModel;
	
	class CarsPhotos{

        function ReturnCarImage($CarID,$Category){

            $whereData = [
                ['CarID', '=', $CarID],
                ['CategoryID', '=', $Category]
            ];
            $Image = CarsPhotosModel::where($whereData)->value('SitePachImage');
            if(!empty($Image)){
                return $Image;
            } else {
                return "";
            }	
            
        }

    }