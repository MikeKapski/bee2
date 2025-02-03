<?php

	namespace App\Services\Cars;

	use App\Models\Cars\CarsAdvantagesModel;
    use App\Models\Cars\CarsAdvantagesCollModel;
	
	class CarsAdvantages{

        function ReturnCarAdvantageSite($CarID){

            $whereData = [
                ['CarID', '=', $CarID],
            ];

            $Advantages = CarsAdvantagesCollModel::where($whereData)->with('car_advantage')->get();

           /* $Advantages = CarsAdvantagesModel::join('er_carsadvantagecoll', function ($join) use ($CarID) {
							$join->on('ER_CarsAdvantage.ID', '=', 'er_carsadvantagecoll.AdvantageID')
							->where('ER_CarsAdvantageColl.CarID', '=', $CarID);
						})
						->orderBy('ER_CarsAdvantage.Orders', 'asc')
						->select('ER_CarsAdvantage.*', 'ER_CarsAdvantageColl.AdvantageID', 'ER_CarsAdvantageColl.CarID','ER_CarsAdvantageColl.AdvantageValue')
						->get()->toArray();*/			
                        
            return $Advantages;
            
        }

    }