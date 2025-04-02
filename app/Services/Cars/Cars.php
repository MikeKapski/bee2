<?php

	namespace App\Services\Cars;

	use App\Models\Cars\CarsModel;
	use App\Models\Cars\CarsTypesCollocationModel;
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

	use CarsPhotos;
	use CarsAdvantages;

	class Cars{

		function ReturnAllCarsListBYType($CarType){

			$i=0;
			$Arr = array();
			$RES = CarsModel::where('CarType', '=', $CarType)->orderBy('Orders', 'ASC')->get();
			foreach($RES as &$row){	
				$Arr[$i]['ID']       = $row->ID;
				$Arr[$i]['Name']     = $row->Name;
				$Arr[$i]['PageUrl']  = $row->PageUrl;
				$Arr[$i]['CarImage'] = CarsPhotos::ReturnCarImage($row->ID,1);
				
				$Arr[$i]['Price_1'] = $row->Price_1;
				$Arr[$i]['Price_2'] = $row->Price_2;
				$Arr[$i]['Price_3'] = $row->Price_3;
				$Arr[$i]['Price_4'] = $row->Price_4;
				
				//$Arr[$i]['CarText'] = $row->CarText;
				
				$i++;
			}
			return $Arr;
			//return "12";
		}

		/*Возврат Автомобиля по ID*/
		function ReturnCar($ID){
			$Arr = array();
			$RES = CarsModel::where('ID', '=', $ID)->orderBy('ID', 'ASC')->get();
			foreach($RES as &$row){	
				$Arr['ID']      = $row->ID;
				$Arr['Name']    = $row->Name;
				$Arr['PageUrl'] = $row->PageUrl;
				$Arr['CarType'] = $row->CarType;
				$Arr['Price_1'] = $row->Price_1;
				$Arr['Price_2'] = $row->Price_2;
				$Arr['Price_3'] = $row->Price_3;
				$Arr['Price_4'] = $row->Price_4;
				
				$Arr['MinDays'] = 1;
				
				$Arr['CarImage']   = CarsPhotos::ReturnCarImage($row->ID,1);
				$Arr['CarText']    = $row->CarText;
				$Arr['CarTextShort']    = $row->CarTextShort;
				
				//$Arr['CarAdvantage']      = self::ReturnCarAdvantage($row->ID);
				$Arr['CarAdvantageSite']  = CarsAdvantages::ReturnCarAdvantageSite($row->ID);
			}
			return $Arr;
		}


		/*Возврат ID  автомобиля по slug страницы*/
		function ReturnCarIDBYSlug($slug){
			$ID = CarsModel::where('Slug', '=', $slug)->value('ID');
			if(!empty($ID)){
				return $ID;
			} else {
				return false;
			}
		}
		/*Возврат PageID автомобиля по slug страницы*/
		function ReturnPageIDBYSlug($slug){
			$ID = CarsModel::where('Slug', '=', $slug)->value('PageID');
			if(!empty($ID)){
				return $ID;
			} else {
				return false;
			}
		}

		/*Список автомобилей по бренду*/
		function ReturnBrandCars($BrandID){

			$i=0;
			$Arr = array();
			$RES = CarsModel::where('CarBrandID', '=', $BrandID)->orderBy('Orders', 'ASC')->get();
			foreach($RES as &$row){	
				$Arr[$i]['ID']       = $row->ID;
				$Arr[$i]['Name']     = $row->Name;
				$Arr[$i]['PageUrl']  = $row->PageUrl;
				$Arr[$i]['CarImage'] = CarsPhotos::ReturnCarImage($row->ID,1);
				
				$Arr[$i]['Price_1'] = $row->Price_1;
				$Arr[$i]['Price_2'] = $row->Price_2;
				$Arr[$i]['Price_3'] = $row->Price_3;
				$Arr[$i]['Price_4'] = $row->Price_4;
				
				//$Arr[$i]['CarText'] = $row->CarText;
				
				$i++;
			}
			return $Arr;

		}

		/*Вернуть простой массив автомобилей*/
		function ReturnCarsArray($BrandCars){

			$Arr = array();
			foreach($BrandCars as &$row){	
				$Arr[]  = $row['ID'];
			}

			return $Arr;
		}

		/*Возврат похожих авто по массиву*/
		function ReturnSimilarCarsByArray($CarsArray){

			$i=0;
			$SimilarCars   = array();
			$ReadyCarArray = array();

			foreach($CarsArray as &$car){

				$Similar = self::ReturnSimilar($car);

				foreach($Similar as &$sim){
					
					if(!in_array($sim['ID'], $ReadyCarArray) AND !in_array($sim['ID'], $CarsArray)) {
						$ReadyCarArray[] = $sim['ID'];
						$SimilarCars[$i] = $sim;
						$i++;
					}
					
				}

			}

			return $SimilarCars;
		}

		/*Возврат главного фото автомобиля*/
		/*function ReturnCarImage($CarID,$Category){
			$whereData = [
				['CarID', '=', $CarID],
				['CategoryID', '=', $Category]
			];
			$Image = DB::table('ER_PhotosCars')->where($whereData)->value('SitePachImage');
			if(!empty($Image)){
				return $Image;
			} else {
				return "";
			}	
		}*/

		/*Возврат Названия Автомобиля*/
		function ReturnCarName($CarID){
			$res = CarsModel::where('ID', '=', $CarID)->value("Name");
			return $res;
		}

		/*Получить похожие автомобили*/
		function ReturnSimilar($CarID){

			$CarArray = [];
			$GetCarCategory =  CarsTypesCollocationModel::where('CarID', '=', $CarID)->value('CarType');

			$whereData = [
				['CarID', '!=', $CarID],
				['CarType', '=', $GetCarCategory]
			];

			$Carslist= CarsTypesCollocationModel::where($whereData)->get();

			if(!empty($Carslist)){

				$i = 0;
				foreach($Carslist as &$row){	

					$CarArray[$i] = self::ReturnCar($row->CarID);
					$i++;

				}

			}

			return $CarArray;
		}



















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