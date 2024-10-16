<?php

	namespace App\Services\Cars;

	use App\Models\Cars\CarsModel;
	/*use App\Models\ExpensesModel;
	use App\Models\Expences\ExpensesPlanTypeModel;
	use App\Models\Expences\ExpensesActionsModel;
	use App\Models\Expences\ExpensesCategoryModel;
	use App\Models\Users\UserInfoModel;

	use App\Models\CarModel;

	use App\Models\Services\ServicesListModel;
		use App\Models\Services\ServicesExpencesCollocationModel;
		//collocationmodel

	use App\Models\Сarwashes\СarwashesListModel;
		use App\Models\Сarwashes\CarwashesExpencesCollocationModel;
	use App\Models\Сarwashes\СarwashesUslugiModel;
		use App\Models\Сarwashes\CarwashesUslugisExpencesCollocationModel;*/

	class Cars{

		public static function FullTableCarsList(){
			
			return CarsModel::with("car_statuses")->where('car_history_id', 1)->get()->toArray();
			
		}

		public static function ReturnCarEdit($CarID){
			$CarData = CarsModel::find($CarID)->toArray();
			return $CarData;
		}

		/*Cheking Functions*/
		public static function ChekCarBYVin($vin){
			$Car = CarsModel::where('vin', $vin)->get()->toArray();
			if($Car){
				return true;
			}
		}

		/*Created Function*/
		/*Create Draft Car*/
		public static function CreateDraftCar($UserID){
			return 1;
		}

		/*UpdateFunctions*/
		public static function UpdateCarStatus($CarID,$CarStatusID){

			$CarData = CarsModel::find($CarID);
			if(!empty($CarStatusID)){
				$CarData->car_status_id = $CarStatusID;
			}

			$CarData->save();
			
			$jsonOutput = [
                'statusCode' => 2,
                'statusEror' => "Статус успешно обновлен",
            ];

			return $jsonOutput;
		}
		/*Update Car Main Photo*/
		public static function AddCarMainPhotoToBase($LinkSite,$CarID){

			$CarData = CarsModel::find($CarID);
			if(!empty($LinkSite)){
				$CarData->AvatarImage = $LinkSite;
			}

			$CarData->save();
			
			$jsonOutput = [
                'statusCode' => 2,
                'statusEror' => "Фото успешно обновлено",
				'imagelink'  => $LinkSite
            ];

			return $jsonOutput;
		}
		public static function UpdateCar($CarID,$CarUpdate){
			
			$CarData = CarsModel::find($CarID);
			$timenow = time();

			if(!empty($CarData)){

				//Обновляем год
				if(!empty($CarUpdate['year'])){
					$CarData->year = (int) $CarUpdate['year'];
				}
				//Номер автомобиля
				if(!empty($CarUpdate['carplate'])){
					$CarData->carplate = $CarUpdate['carplate'];
				}
				//Сопоставленное имя
				if(!empty($CarUpdate['ComputedName'])){
					$CarData->ComputedName = $CarUpdate['ComputedName'];
				}
				//Цена авто
				if(!empty($CarUpdate['CarCost'])){
					$CarData->CarCost = (int) $CarUpdate['CarCost'];
				}
				//Код авто
				if(!empty($CarUpdate['CarCode'])){
					$CarData->CarCode = $CarUpdate['CarCode'];
				}
				//Депозит за авто
				if(!empty($CarUpdate['CarDeposit'])){
					$CarData->CarDeposit = $CarUpdate['CarDeposit'];
				}
				//Вин номер
				if(!empty($CarUpdate['vin'])){
					$CarData->vin = strtoupper($CarUpdate['vin']);
				}
				//Текущий пробег
				if(!empty($CarUpdate['now_km'])){
					$CarData->now_km = (int) $CarUpdate['now_km'];
				}
				//Марка-модель-поколение
				$CarData->BrandID      = (int) $CarUpdate['BrandID'];
				$CarData->ModelID      = (int) $CarUpdate['ModelID'];
				$CarData->GenerationID = (int) $CarUpdate['GenerationID'];
				
				
				//Дата обновления
				$CarData->updated_at = date('Y-m-d H:i:s', $timenow);
				$CarData->save();
				return $CarData;

			}

		}
		public static function UpdateCarVin($CarID,$Vin){

			$CarData = CarsModel::find($CarID);

			$timenow = time();

			if(!empty($CarData)){
				if(!empty($CarUpdate['vin'])){
					$CarData->vin = strtoupper($Vin);
				}

				$CarData->updated_at = date('Y-m-d H:i:s', $timenow);
				$CarData->save();
				return $CarData;
			}

		}
		


	}