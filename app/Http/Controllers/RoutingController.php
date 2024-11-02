<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Http\Controllers\Controller;

use PDF;
use File;

use Cars;
use Pages;

	class RoutingController extends Controller
	{
		/*CMS routing functions*/
		
		/*Front Routing Functions*/
			/*MainPage*/
			function mainpage(){

				$CarsAll = Cars::ReturnAllCarsListBYType(1);
				return view('html.mainpage',['CarsAll' => $CarsAll]);

			}
			/*Single Auto*/
			function AutoSingle($slug){

				$PageID = Cars::ReturnPageIDBYSlug($slug);
				$CarID  = Cars::ReturnCarIDBYSlug($slug);
				
				$BreadCrumps  = Pages::ReturnBreadCrumps($PageID);
				$CarInfo      = Cars::ReturnCar($CarID);

				if($CarInfo['CarType'] == 1){
				    return view('html.carsingle',['BreadCrumps' => $BreadCrumps, 'CarInfo' => $CarInfo]);
				}
				if($CarInfo['CarType'] == 2){
				    return view('html.carsingle',['BreadCrumps' => $BreadCrumps, 'CarInfo' => $CarInfo]);
				}

			}
			/*Park Auto*/
			/*-function ParkAuto(){
				
				$CarsController = new CarsController();
				$BreadCrumpsController = new BreadCrumpsController();
				
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(2);
				$CarsAll = $CarsController -> ReturnAllCarsList();
				
				
				return view('html.parkauto',['CarsAll' => $CarsAll]);
			}*/
			
			/*Uslovia*/
			function uslovia(){
				
				$BreadCrumps  = Pages::ReturnBreadCrumps(4);
				return view('html.uslovia',['BreadCrumps' => $BreadCrumps]);
				
			}
			
			/*Contacts*/
			/*function contactspage(){
				
				$BreadCrumpsController = new BreadCrumpsController();
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(9);

				return view('html.contacts',['BreadCrumps' => $BreadCrumps]);
			}*/
			
			/*O kompanii*/
			/*function okompanii(){
				
				$BreadCrumpsController = new BreadCrumpsController();
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(21);
				
				return view('html.about',['BreadCrumps' => $BreadCrumps]);
				
			}*/
			
			/*Arenda Gruzovich*/
			/*function CargoAuto(){
				
				$CarsController = new CarsController();
				
				$BreadCrumpsController = new BreadCrumpsController();
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(21);
				
				$CarsAll = $CarsController -> ReturnAllCarsListBYType(2);
				
				return view('html.cargo',['BreadCrumps' => $BreadCrumps,'CarsAll' => $CarsAll]);
				
			}*/
			
			/*Car Single Page*/
			/*function AutoSingle($slug){
				
				$CarsController = new CarsController();
				$BreadCrumpsController = new BreadCrumpsController();
				
				$PageID = $CarsController -> ReturnPageIDBYSlug($slug);
				
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps($PageID);
				$CarInfo = $CarsController -> ReturnCarBYSlug($slug);
				
				if($CarInfo['CarType'] == 1){
				    return view('html.carsingle',['BreadCrumps' => $BreadCrumps, 'CarInfo' => $CarInfo]);
				}
				if($CarInfo['CarType'] == 2){
				    return view('html.carsingle',['BreadCrumps' => $BreadCrumps, 'CarInfo' => $CarInfo]);
				}
				
				
			}*/
			
			/*Wish list*/
			/*function WishList(){
				
				$BreadCrumpsController = new BreadCrumpsController();
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(22);
				
				return view('html.wishlist',['BreadCrumps' => $BreadCrumps]);
				
			}*/
			
			/*Compare*/
			
			/*function Compare(){
				
				$BreadCrumpsController = new BreadCrumpsController();
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(23);
				
				return view('html.compare',['BreadCrumps' => $BreadCrumps]);
				
			}*/
			
			/*Rewiew Page*/
			
			/*function Rewiev(){
				
				//$BreadCrumpsController = new BreadCrumpsController();
				//$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(23);
				$BreadCrumps  = "";
				
				return view('html.rewiev',['BreadCrumps' => $BreadCrumps]);
				
			}*/
			
			/*PromoSingle*/
			/*function PromoSingle($slug){
				
				$CarsController = new CarsController();
				$BreadCrumpsController = new BreadCrumpsController();
				
				//$PageID = $CarsController -> ReturnPageIDBYSlug($slug);
				if($slug == "arenda-lada-largus-furgon"){ 
					$PageID = 8;
					$carslug = "lada-largus-furgon";
					
					$Promo['OldPRice'] = "2100";
					$Promo['MinDays'] = 3;
					
				}
				if($slug == "ford-mustang"){ 
					$PageID = 8;
					$carslug = "lada-largus-furgon";
					
					$Promo['OldPRice'] = "2100";
					$Promo['MinDays'] = 3;	
				}
				
				$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps($PageID);
				$CarInfo = $CarsController -> ReturnCarBYSlug($carslug);
				
				return view('html.promo.'.$slug.'',['BreadCrumps' => $BreadCrumps, 'CarInfo' => $CarInfo, 'Promo' => $Promo]);
				
			}*/
			
			
			
			
			
			
			
			
			
			/*Oplata*/
			/*function oplatapage(){

				return view('html.oplatapage');
			}*/
			/*Dostavka*/
			/*function dostavkapage(){

				return view('html.dostavka');
			}*/
			
		
		
		
		
		
		/*View Functions*/
		/*function ReturnSeoBlock($PageID){

			$PagesController = new PagesController();

			$Arr['Title']       = "<title>AltaCera</title>";
			$Arr['Description'] = "<meta name='description' content='Керамическая плитка для ванной комнаты, каталог плитки российского производства - фабрика Altacera (Россия). Официальный сайт производителя керамической плитки Альткера' />";
			$Arr['Keywords']    = "<meta name='keywords' content='каталог керамической плитки, керамическая плитка, Россия, плитка для ванны, плитка для ванной комнаты, плитка из России' />";
			
			$Title       = self::ReturnSeoPosition($PageID,1);
			$Description = self::ReturnSeoPosition($PageID,2);
			$Keywords    = self::ReturnSeoPosition($PageID,3);

			if($Title === false){
				$Title = $PagesController -> ReturnPageName($PageID);
				$Arr['Title']       = "<title>".$Title." | AltaCera</title>";
			} else {
				$Arr['Title']       = "<title>".$Title."</title>";
			}


			if($Description != false){
				$Arr['Description'] = "<meta name='description' content='".$Description."' />";
			} 
			if($Keywords != false){
				$Arr['Keywords'] = "<meta name='keywords' content='".$Keywords."' />";
			} 

			
			
			
			return $Arr;
		}*/
		/*Helper Functions*/
		
		
		
		/*function UpdateSearchCollections($CollectionIndexes){
			if(!empty($CollectionIndexes)){
				foreach($CollectionIndexes as &$row){
					
					$SearchID = self::ChekSearchIndex($row->URL);
					
					if($SearchID === false){
						$SearchID = self::CreateSearchIndex($row->Name,$row->URL);
					}else{
					
						//return $SearchID;
					}
				}	
				
			}	
			return $SearchID;
		}	*/
		
		/*DB Functions*/
			/*Return Functions*/
			/*function ReturnPageSeo($ID){
				$RES = DB::table('AC_Seo_Types')
					->leftJoin('AC_Seo_Values', 'AC_Seo_Types.ID', '=', 'AC_Seo_Values.TypeID')
					->select('AC_Seo_Types.*', 'AC_Seo_Values.ID as SeoValID','AC_Seo_Values.TypeID','AC_Seo_Values.PageID','AC_Seo_Values.Row')
					->where('AC_Seo_Values.PageID', '=', $ID)
					->orderBy('AC_Seo_Values.PageID', 'ASC')->get()->toArray();
				
				return $RES;
			//var_dump($RES);
			}
			function ReturnSeoTypes(){
				$RES = DB::table('AC_Seo_Types')->orderBy('ID', 'ASC')->get()->toArray();
				return $RES;
			}
			function ReturnSeoPosition($PageID,$TypeID){
				$whereData = [
					['PageID', $PageID],
					['TypeID', $TypeID]
				];
					
				$Chek = DB::table('AC_Seo_Values')->where($whereData)->value('Row');
				if(!empty($Chek)){
					return $Chek;
				} else {
					return false;
				}

			}
			
			
			
			
			
			
			function ReturnSearchIndexses(){
				$RES = DB::table('AC_Seacrh')
					->select('Name','Url')
					->orderBy('Name', 'ASC')->get()->toArray();
				return $RES;
			}
			function ReturnSearchLike($call){
				$RES = DB::table('AC_Seacrh')
					->select('Name','Url')
					->where('Name', 'like', '%'.$call.'%')
					->orderBy('Name', 'ASC')->get()->toArray();
				return $RES;
			}*/
			/*Create Functions*/
			/*function CreateSeoValue($PageID,$SeoID,$SeoValue){
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO AC_Seo_Values (TypeID,PageID,Row) VALUES (?,?,?)");
				$stmt->execute([$SeoID,$PageID,$SeoValue]);
				$LastID = $PDO->lastInsertId();
				return $LastID;
			}*/
			/*Chek Functions*/
			/*function ChekSearchIndex($URL){
				$ID = DB::table('AC_Seacrh')->where('Url', '=', $URL)->value('ID');
				if(!empty($ID)){
					return $ID;
				} else {
					return false;
				}
			}*/
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		/*1C Functions*/
		/*public function ReturnCartTo1C(Request $request){
			
			$Action = $request->input('action');
			
			if($Action == "GetCarts"){ 

				$CityController = new CityController();
			
				$CartList = self::ReturnCartsFor1C();
				if($CartList === false){
					$Arr['Message'] = "Новых заказов нет";
				}else{
					

					
					$Arr = array();
					$i=0;
					//var_dump($RES);
					foreach($CartList as &$row){	
						$Arr[$i]['id']        = $row->ID;
						$Arr[$i]['inn']       = "";
						$Arr[$i]['depot']     = "";
						$Arr[$i]['price_id']  = $CityController -> ReturnPriceSSID($row->UserPriceID);
						$Arr[$i]['city']      = $CityController -> ReturnCityName($row->UserCityID) ;
						$Arr[$i]['region']    = $CityController -> ReturnRegionNameByCityID($row->UserCityID);
						$Arr[$i]['region_id'] = $CityController -> ReturnRegionCIDByCityID($row->UserCityID);
						$Arr[$i]['fio']       = self::ReturnCartUserNameBYCartID($row->ID);
						$Arr[$i]['email']     = self::ReturnCartUserEmailBYCartID($row->ID);
						$Arr[$i]['phone']     = self::ReturnCartUserPhoneBYCartID($row->ID);
						$Arr[$i]['dosttype']  = self::ReturnCartUserDostTypeBYCartID($row->ID);
						$Arr[$i]['dostadres'] = self::ReturnCartUserDostAdresBYCartID($row->ID);
						$Arr[$i]['paytype']   = self::ReturnCartUserPayTypeBYCartID($row->ID);
						$Arr[$i]['comment']   = self::ReturnCartUserCommentaryBYCartID($row->ID);
						
						$Items = self::ReturnShortCart($row->ID);
						//var_dump($Items);
						if(!empty($Items)){
							$IT = array();
							$T=0;
							foreach($Items as &$row){
								$IT[$T]['tovar_id']   = $row['Tovar_ID'];
								$IT[$T]['unit_id']    = $row['UnitID'];
								$IT[$T]['quantity']   = "".$row['SquareTotalRow']."";
								$IT[$T]['ves']        = "".$row['WeightTotal']."";
								$IT[$T]['price_one']  = $row['PriceForUnit'];
								$IT[$T]['discont']    = $row['Discount'];
								$IT[$T]['price']      = $row['TotalPriceRow'];
								
								$T++;
							}
							$Arr[$i]['tovar'] = $IT;
						}
						
						
						$i++;
					}
					
				}
			
			}
			
			
			$AnswerJson = json_encode($Arr, JSON_UNESCAPED_UNICODE);
			return $AnswerJson;
			
		}	*/
		
		
		/*View Functions*/
		
		/*public function CartView(){
			
			$PositionController = new PositionController();
			$CookieController   = new CookieController();
			$CityController     = new CityController();
			$BreadCrumpsController = new BreadCrumpsController();
			
			$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(511);
					
			$SSID        = $CookieController -> ReturnCookie("CartHash");
			$CityID      = $CookieController -> ReturnCookie("CityID");
			$CityPriceID = $CityController   -> ReturnCityPriceID($CityID);
			
			$CartChek = self::ChekCartStartExist($SSID);
			if($CartChek === false){
				//$CartID = $CartController -> CreateCartStart($SSID);
			}else{
				$CartID = $CartChek;
				
				$CartCityPriceID = self::ReturnCartCityPriceID($CartID);
				if($CityPriceID <> $CartCityPriceID){
					$Res = self::CartUpdateCityAndPriceID($CartID,$CityID,$CityPriceID);
					$Res = self::UpdateCityPricesCartValues($CartID,$CityPriceID);
				}	
				
				$Cart = self::ReturnFullCart($CartID);
				$CartTotalM = self::ReturnFullCartMoney($CartID);
				$CartTotalW = self::ReturnFullCartWight($CartID);
				
				// 
				return view('cart.index',['BreadCrumps' => $BreadCrumps, 'Cart' => $Cart,'CartTotalM' => $CartTotalM,'CartTotalW' => $CartTotalW]);
			}
		}	
		
		public function CartConfirm(){
			
			$PositionController = new PositionController();
			$CookieController   = new CookieController();
			$CityController     = new CityController();
			$BreadCrumpsController = new BreadCrumpsController();
			
			$BreadCrumps  = $BreadCrumpsController -> ReturnBreadCrumps(511);
					
			$SSID        = $CookieController -> ReturnCookie("CartHash");
			$CityID      = $CookieController -> ReturnCookie("CityID");
			$CityPriceID = $CityController   -> ReturnCityPriceID($CityID);
			
			$CartChek = self::ChekCartStartExist($SSID);
			
			
			if($CartChek === false){
				//$CartID = $CartController -> CreateCartStart($SSID);
			}else{
				
				return view('cart.confirmation',['BreadCrumps' => $BreadCrumps]);
			}
			
		}	
		
		
		
		
		function ReturnFullCartArray(){
			
			$PositionController = new PositionController();
			$CookieController   = new CookieController();
			$CityController     = new CityController();
				
			$SSID        = $CookieController -> ReturnCookie("CartHash");
			$CityID      = $CookieController -> ReturnCookie("CityID");
			$CityPriceID = $CityController   -> ReturnCityPriceID($CityID);
			
			$CartChek = self::ChekCartStartExist($SSID);
			if($CartChek === false){
				//$CartID = $CartController -> CreateCartStart($SSID);
			}else{
				$CartID = $CartChek;
				
				$CartCityPriceID = self::ReturnCartCityPriceID($CartID);
				if($CityPriceID <> $CartCityPriceID){
					$Res = self::CartUpdateCityAndPriceID($CartID,$CityID,$CityPriceID);
					$Res = self::UpdateCityPricesCartValues($CartID,$CityPriceID);
				}	
				
				$Arr['Cart']       = self::ReturnFullCart($CartID);
				$Arr['CartID']     = $CartID;
				$Arr['CartTotalM'] = self::ReturnFullCartMoney($CartID);
				$Arr['CartTotalW'] = self::ReturnFullCartWight($CartID);
				
				return $Arr;
			}
			
		}	
		
		
		function ReturnUserCartValue(){
			
			$PositionController = new PositionController();
			$CookieController   = new CookieController();
			$CityController     = new CityController();
			
			$SSID        = $CookieController -> ReturnCookie("CartHash");
			$CityID      = $CookieController -> ReturnCookie("CityID");
			$CityPriceID = $CityController -> ReturnCityPriceID($CityID);
			
			$CartChek = self::ChekCartStartExist($SSID);
			
			if($CartChek === false){
				return 0;
			}else{
				$CartID = $CartChek;
				$CartCount = self::TotalRowInCart($CartID);
				
				return $CartCount;
			}
			
		}	*/
		
		
		
		/*DB Functions*/
		/*function ReturnCartsFor1C(){
			$whereData = [
				['CartStatus','=', 2],
				['1C_ID','=', NULL]
			];	
			$Chek = DB::table('AC_Cart_Start')->where($whereData)->get()->toArray();
			if(!empty($Chek)){
				return $Chek;
			}else{
				return false;
			}
		}	*/
		
		
		
		
		/*function UpdateCityPricesCartValues($CartID,$CityPriceID){
			
			$PriceController = new PriceController();
			$i=0;
			$Arr = array();
			$RES = DB::table('AC_Cart_Positions')
					->join('AC_Positions', 'AC_Cart_Positions.PositionID', '=', 'AC_Positions.ID')
					->select('AC_Cart_Positions.*', 'AC_Positions.Name','AC_Positions.ImageStyle','AC_Positions.ImageEXT','AC_Positions.Articul','AC_Positions.Stroke','AC_Positions.ItemTypes')
					->where('AC_Cart_Positions.CartID', '=', $CartID)
					->orderBy('AC_Cart_Positions.ID', 'ASC')->get()->toArray();
			//var_dump($RES);
			foreach($RES as &$row){	
				$Arr[$i]['ID']         = $row->ID;
				$Arr[$i]['UnitID']     = $row->UnitID;
				$Arr[$i]['Tovar_ID']   = $row->Tovar_ID;
				$Arr[$i]['TotalUnits'] = $row->TotalUnits;
				
				$NewPrice = $PriceController -> ReturnPositionPriceChek($row->Tovar_ID,$row->UnitID,$CityPriceID);
				$NewPriceValueRow = $row->TotalUnits * $NewPrice;
				
				$Red   = self::UpdateCartPriceForUnit($row->ID,$NewPrice);
				$Red2  = self::UpdateCartTotalPriceRow($row->ID,$NewPriceValueRow);
				$i++;
			}
			return $Arr;
			
		
		}
		function ReturnShortCart($CartID){
			$i=0;
			$Arr = array();
			$RES = DB::table('AC_Cart_Positions')->where('CartID', '=', $CartID)->orderBy('ID', 'ASC')->get()->toArray();
			
			foreach($RES as &$row){	
				$Arr[$i]['ID']           = $row->ID;
				$Arr[$i]['Tovar_ID']     = $row->Tovar_ID;
				$Arr[$i]['UnitID']       = $row->UnitID;
				$Arr[$i]['PriceForUnit'] = $row->PriceForUnit;

				$Arr[$i]['TotalUnits']      = $row->TotalUnits;
				$Arr[$i]['TotalPriceRow']   = $row->TotalPriceRow;
				$Arr[$i]['SquareUnit']      = $row->SquareUnit;
				$Arr[$i]['SquareTotalRow']  = $row->SquareTotalRow;
				
				
				if($row->UnitID != 55){
					$Arr[$i]['SquareTotalRow']  = $row->TotalUnits;
				}

				$Arr[$i]['WeightUnit']      = round($row->WeightUnit,3);
				$Arr[$i]['WeightTotal']     = round($row->WeightTotal,3);
				$Arr[$i]['Discount']        = $row->Discount;
				$i++;
			}
			return $Arr;
			
		}
		
		
		function ReturnFullCart($CartID){
			
			$PriceController = new PriceController();
			
			$i=0;
			$Arr = array();
			$RES = DB::table('AC_Cart_Positions')
					->join('AC_Positions', 'AC_Cart_Positions.PositionID', '=', 'AC_Positions.ID')
					->select('AC_Cart_Positions.*', 'AC_Positions.Name','AC_Positions.ImageStyle','AC_Positions.ImageEXT','AC_Positions.Articul','AC_Positions.Stroke','AC_Positions.ItemTypes')
					->where('AC_Cart_Positions.CartID', '=', $CartID)
					->orderBy('AC_Cart_Positions.ID', 'ASC')->get()->toArray();
			//var_dump($RES);
			foreach($RES as &$row){	
				$Arr[$i]['ID']           = $row->ID;
				$Arr[$i]['Name']         = $row->Name;
				$Arr[$i]['Articul']      = $row->Articul;
				$Arr[$i]['ImageEXT']     = $row->ImageEXT;

				$Arr[$i]['UnitID']          = $row->UnitID;
				$Arr[$i]['PriceForUnit']    = $row->PriceForUnit;
				$Arr[$i]['TotalUnits']      = $row->TotalUnits;
				$Arr[$i]['TotalPriceRow']   = $row->TotalPriceRow;
				$Arr[$i]['SquareUnit']      = $row->SquareUnit;
				$Arr[$i]['SquareTotalRow']  = $row->SquareTotalRow;
				if($row->UnitID != 55){
					$Arr[$i]['SquareTotalRow']  = round($row->TotalUnits,2);
				}
					
				
				$CityPriceID =  self::ReturnCartCityPriceID($CartID);
				$Arr[$i]['PriceID']   = $PriceController -> ReturnPositionPriceID($row->Tovar_ID,$row->UnitID,$CityPriceID);
				
				
				$Arr[$i]['WeightUnit']      = round($row->WeightUnit,3);
				$Arr[$i]['WeightTotal']     = round($row->WeightTotal,3);
				$Arr[$i]['Discount']        = $row->Discount;

				$Arr[$i]['PositionID']   = $row->PositionID;
				$Arr[$i]['ItemTypes']    = $row->ItemTypes;
				$Arr[$i]['Stroke']       = $row->Stroke;
				$Arr[$i]['ImageStyle']   = $row->ImageStyle;
				

				$Arr[$i]['TotalCountcart']   = self::TotalRowInCart($CartID);
				
				$Arr[$i]['Tovar_ID']        = $row->Tovar_ID;
				//$Arr[$i]['RegionID']   = $row->RegionID;
				//$Arr[$i]['RegionName'] = $row->RegionName;
				//$Arr[$i]['PriceName']  = self::ReturnCityPriceName($row->RegionID,$row->PriceID);
				$i++;
			}
			return $Arr;
			
		}
		function ReturnFullCartMoney($CartID){
			$Money=0;
			$RES = DB::table('AC_Cart_Positions')->where('CartID', '=', $CartID)->get()->toArray();
			foreach($RES as &$row){	
				$Money = $Money + $row->TotalPriceRow;
			}
			return $Money;
		}
		function ReturnFullCartWight($CartID){
			$WeightTotal=0;
			$RES = DB::table('AC_Cart_Positions')->where('CartID', '=', $CartID)->get()->toArray();
			foreach($RES as &$row){	
				$WeightTotal = $WeightTotal + $row->WeightTotal;
			}
			return $WeightTotal;
		}
		function ReturnCartCityPriceID($ID){
			$ID = DB::table('AC_Cart_Start')->where('ID', '=', $ID)->value('UserPriceID');
			return $ID;
		}


		function TotalRowInCart($CartID){
			$RES = DB::table('AC_Cart_Positions')->where('CartID', '=', $CartID)->count();
			return $RES;
		}*/
		
		
		
		
		/*Create start cart row*/
		
		/*UpdateCityAndPriceID*/
		/*function CartUpdateCityAndPriceID($CartID,$CityID,$CityPriceID){
			$result_1 = self::UpdateCartCityID($CartID,$CityID);
			$result_2 = self::UpdateCartPriceID($CartID,$CityPriceID);
		} 
		function UpdateCartCityID($CartID,$CityID){
			$result = DB::table('AC_Cart_Start')->where('ID', $CartID)->update(['UserCityID' => $CityID]);
			return $result;
		}
		function UpdateCartPriceID($CartID,$CityPriceID){
			$result = DB::table('AC_Cart_Start')->where('ID', $CartID)->update(['UserPriceID' => $CityPriceID]);
			return $result;
		}*/
		
		
		
		
		
		/*Cheking Function*/
		/*function  ChekingPositionConfirmed($PositionID,$ValueID,$CityPriceID,$Unitcode,$PriceValue){
			
			if($Unitcode == 555){ $Unitcode = 55;}
			
			$PositionController = new PositionController();
			$PriceController    = new PriceController();
			
			$TovarID = $PositionController -> ReturnTovarID($PositionID);
			$FromBasePrice = $PriceController -> ReturnPositionPriceChek($TovarID,$Unitcode,$CityPriceID);
			
			if($FromBasePrice == $PriceValue){
				return "Confirmed";
			}else{
				return "Fail";
			}
		}*/

		/*function AddToCartBrood($CartID,$PositionID,$CityPriceID,$Unitcode,$CountNow,$SquareOneUnit,$CartPosID){

			$PositionController = new PositionController();
			$PriceController    = new PriceController();

			$TovarID          = $PositionController -> ReturnTovarID($PositionID);
			$PositionHelperID = $PositionController -> ReturnPositionHelperID($TovarID);
			$FromBasePrice    = $PriceController -> ReturnPositionPriceChek($TovarID,$Unitcode,$CityPriceID);
			
			
			$OneWeit = $PositionController -> ReturnWeightOneUnit($PositionHelperID);
			
			if($Unitcode == 555){ $Unitcode = 55;}
			
			$SquareTotal   = $SquareOneUnit * $CountNow;
			$WeightTotal   = $OneWeit * $CountNow;
			
			if($Unitcode == 55){
				$TotalPriceRow = $FromBasePrice * $SquareTotal;
			}else{
				$TotalPriceRow = $FromBasePrice * $CountNow;
			}*/
			
			
			
			
			
			
			
			
			
			/*Проверка наличия данного поля в коризне - добавить*/
			/*if($CartPosID == 0){
				$RowID = self::CreatePositionToCartStart($CartID,$PositionID,$TovarID,$Unitcode);
			}else{
				$RowID = $CartPosID;
			}
			
			
			$Red   = self::UpdateCartPriceForUnit($RowID,$FromBasePrice);
			$Red1  = self::UpdateCartTotalUnits($RowID,$CountNow);
			$Red2  = self::UpdateCartTotalPriceRow($RowID,$TotalPriceRow);
			$Red3  = self::UpdateCartSquareUnit($RowID,$SquareOneUnit);
			$Red4  = self::UpdateCartSquareTotal($RowID,$SquareTotal);
			$Red5  = self::UpdateCartWeightUnit($RowID,$OneWeit);
			$Red6  = self::UpdateCartWeightTotal($RowID,$WeightTotal);

			return $RowID;
		}*/
		
		/*Create Cart Position Start*/ 
		/*function CreatePositionToCartStart($CartID,$PositionID,$TovarID,$Unitcode){

			$PDO = DB::connection()->getPdo();
			$stmt = $PDO->prepare("INSERT INTO AC_Cart_Positions (CartID,PositionID,Tovar_ID,UnitID) VALUES (?,?,?,?)");
			$stmt->execute([$CartID,$PositionID,$TovarID,$Unitcode]);
			$LastID = $PDO->lastInsertId();
			return $LastID;

		}*/

		/*function UpdateCartPriceForUnit($ID,$PriceForUnit){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['PriceForUnit' => $PriceForUnit]);
			return $result;
		}
		function UpdateCartTotalUnits($ID,$TotalUnits){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['TotalUnits' => $TotalUnits]);
			return $result;
		}
		function UpdateCartTotalPriceRow($ID,$TotalPriceRow){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['TotalPriceRow' => $TotalPriceRow]);
			return $result;
		}
		function UpdateCartSquareUnit($ID,$SquareOneUnit){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['SquareUnit' => $SquareOneUnit]);
			return $result;
		}
		function UpdateCartSquareTotal($ID,$SquareTotal){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['SquareTotalRow' => $SquareTotal]);
			return $result;
		}
		function UpdateCartWeightUnit($ID,$WeightUnit){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['WeightUnit' => $WeightUnit]);
			return $result;
		}
		function UpdateCartWeightTotal($ID,$WeightTotal){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['WeightTotal' => $WeightTotal]);
			return $result;
		}
		function UpdateCartDiscount($ID,$Discount){
			$result = DB::table('AC_Cart_Positions')->where('ID', $ID)->update(['Discount' => $Discount]);
			return $result;
		}
		function UpdateCartStatus($ID,$Status){
			$result = DB::table('AC_Cart_Start')->where('ID', $ID)->update(['CartStatus' => $Status]);
			return $result;
		}*/
		
		
		/*Delete From Cart*/
		/*function RemoveFromCart($CartID,$CartPositionID){
			$whereData = [
				['CartID', $CartID],
				['ID', $CartPositionID]
			];	
			$Chek = DB::table('AC_Cart_Positions')->where($whereData)->delete();
			return $Chek;
		}*/

		
		
		/*Order Function*/
		/*function ReturnClientIDBYEmail($Email){
			$ID = DB::table('AC_Cart_Users')->where('UserEmail', '=', $Email)->value('ID');
			if(!empty($ID)){
				return $ID;
			} else {
				return false;
			}
		}*/
		/*function AddClientIDBYEmail($Email){
			$PDO = DB::connection()->getPdo();
			$stmt = $PDO->prepare("INSERT INTO AC_Cart_Users (UserEmail) VALUES (?)");
			$stmt->execute([$Email]);
			$LastID = $PDO->lastInsertId();
			return $LastID;
		}*/
		
		
		/*function Update_Rows_AC_Cart_Users($ID,$Row,$Value){
			$result = DB::table('AC_Cart_Users')->where('ID', $ID)->update([''.$Row.'' => $Value]);
			return $result;
		}
		
		function ReturnCartUserNameBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('UserName');
			return $res;
		}
		function ReturnCartUserEmailBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('UserEmail');
			return $res;
		}
		function ReturnCartUserPhoneBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('UserPhone');
			return $res;
		}
		function ReturnCartUserDostTypeBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('DostType');
			if($res == 1){ return "Самовывоз";}
			if($res == 2){ return "Доставка по адресу";}
		}
		
		function ReturnCartUserDostAdresBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('DostAdres');
			if(empty($res)){ return "";}
			if(!empty($res)){ return $res;}
		}
		
		
		function ReturnCartUserPayTypeBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('PayType');
			if($res == 1){ return "Наличными при получении";}
			if($res == 2){ return "Картой при получении";}
			if($res == 3){ return "Картой на сайте";}
		}
		function ReturnCartUserCommentaryBYCartID($CartID){
			$res = DB::table('AC_Cart_Users')->where('UserCartID', '=', $CartID)->value('CartCommentary');
			if(empty($res)){ return "";}
			if(!empty($res)){ return $res;}
		}*/
		
		
		
		
		
		
		
		
		
		

		
		
		

		


	
		
		
		
		
		
		
		
		
		
		
		
		
	
	  
	   /* public function mainview(){
			
			$CarMakeController = new CarMakeController();
			$CarsRentController = new CarsRentController();
			
			
			$Arr = $CarMakeController -> ReturnCarMakeList();
			$CarList = $CarsRentController -> ReturnCarsToRentList();
			
			// $worlds = DB::table('AL_BlackList')->get();
		    //return view('beecars.mainview', ['DocName' => $worlds]);
		    return view('beecars.mainview', [
				'MakeList' => $Arr, 
				'CarList'  => $CarList
				]
			);
	    }*/
		/*public function listview(){
			$BreadCrumpsController = new BreadCrumpsController();

			$News = self::ReturnNewsList();
			$BreadCrumps = $BreadCrumpsController -> ReturnBreadCrumps(78);
			
			return view('news.list',['News' => $News,'BreadCrumps' => $BreadCrumps]);
			
		}
		public function newsview($slug){
			
			$BreadCrumpsController = new BreadCrumpsController();

			$Arr = self::ReturnNewsBySlug($slug);
			$BreadCrumps = $BreadCrumpsController -> ReturnBreadCrumps($Arr['PageID']);

			
			return view('news.newsview',['Collection' => $Arr, 'BreadCrumps' => $BreadCrumps]);

		}*/


		//return data functions
		/*public function ReturnNewsList(){
			$Arr = DB::table('AC_News')->orderBy('NewsTime', 'DESC')->get();
			return $Arr;
		}
		
		
		public function ReturnNewsBySlug($slug){
			$ID = DB::table('AC_News')->where('Slug', '=', $slug)->value('ID');
			$Collection = self::ReturnNews($ID);
			return $Collection;
		}
		function ReturnNews($ID){
			$Arr['ID'] = $ID;
			$News = DB::table('AC_News')->where('ID', "=" , $ID)->get()->toArray();
			
			if(!empty($News)){
				foreach($News as &$row){		
					$Arr['Name']       = $row->Name;
					$Arr['ShortName']  = $row->ShortName;
					$Arr['Date']       = self::CreateDataPointMounth($row->NewsTime);
					$Arr['DataPoint']  = self::CreateDataPoint($row->NewsTime);
					$Arr['Text']       = $row->NewsBody;
					$Arr['PageID']     = $row->PageID;
				}
			}	
			$NewsPhoto = self::ReturnNewsImages($ID);
			$Arr['Photos'] = $NewsPhoto;
			return $Arr;
		}
			//Create Data Points
			function CreateDataPoint($TimeDate){
				$time = strtotime($TimeDate); 
				$date = date('d.m.Y', $time);
				return $date;
			}
			function CreateDataPointMounth($TimeDate){
				$time = strtotime($TimeDate); 
				$date = date('d.m.Y', $time);
				$TRUNC_DATE = explode(".", $date);
				$mounth = self::MounthRod($TRUNC_DATE[1]);
				return "".$TRUNC_DATE[0]." ".$mounth." ".$TRUNC_DATE[2]." ";
			}
			function MounthRod($i){
				$Arr['01']  = 'января';
				$Arr['02']  = 'февраля';
				$Arr['03']  = 'марта';
				$Arr['04']  = 'апреля';
				$Arr['05']  = 'мая';
				$Arr['06']  = 'июня';
				$Arr['07']  = 'июля';
				$Arr['08']  = 'августа';
				$Arr['09']  = 'сентября';
				$Arr['10']  = 'октября';
				$Arr['11']  = 'ноября';
				$Arr['12']  = 'декабря';
				return $Arr[$i];
			}
			//Return News Images
			function ReturnNewsImages($ID){
				$Images = DB::table('AC_News_Gallery')->where('NewsID', "=" , $ID)->get()->toArray();
				$ImagesCount = count($Images);
				$Arr['Icount'] = $ImagesCount;
				$i = 0;
				if(!empty($Images)){
					foreach($Images as &$row){		
						$Arr['Images'][$i]['ID']  = $row->ID;
						$Arr['Images'][$i]['URL']  = $row->URL;
						$i++;
					}
				}
				return 	$Arr;
			}
			//return image info
			function ReturnNewsImageInfo($ID){
				$Images = DB::table('AC_News_Gallery')->where('ID', "=" , $ID)->get()->toArray();
				if(!empty($Images)){
					foreach($Images as &$row){		
						$Arr['ID']  = $row->ID;
						$Arr['URL']  = $row->URL;
					}
				}
				return 	$Arr;
			}
			function RemoveNewsImage($ID){
				$result = DB::table('AC_News_Gallery')->where('ID', '=', $ID)->delete();
				return $result;
			}



*/
		
		//DB functions
			//Create Collections Pages
			/*function CreateNewsPage($Url,$Name,$Slug,$NewsNameShort,$NewsDate,$NewsText){
				
				$PagesController = new PagesController();

				$PageID = $PagesController -> CreateNewPage(78,"/news/".$Slug."",$Name);
				$NewsID = self::AddNews($PageID,"/news/".$Slug."",$Name,$Slug);
				
				$Res = self::UpdateNewsDate($NewsID,$NewsDate);
				$Res = self::UpdateNewsNameShort($NewsID,$NewsNameShort);
				$Res = self::UpdateNewsBody($NewsID,$NewsText);
				
			}
			
			//Add new news
			function AddNews($PageID,$URL,$Name,$Slug){
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO AC_News (Name,URL,Slug,PageID) VALUES (?,?,?,?)");
				$stmt->execute([$Name,$URL,$Slug,$PageID]);
				$PageID = $PDO->lastInsertId();
				return $PageID;
			}
			function UpdateNews($NewsID,$NewsName,$NewsNameShort,$NewsDate,$NewsText){
				$Res = "";
				if(!empty($NewsID)){
					$Res = self::UpdateNewsDate($NewsID,$NewsDate);
					$Res = self::UpdateNewsName($NewsID,$NewsName);
					$Res = self::UpdateNewsNameShort($NewsID,$NewsNameShort);
					$Res = self::UpdateNewsBody($NewsID,$NewsText);
				}
				return $Res;
			}
			function UpdateNewsDate($NewsID,$NewsDate){
				$TRUNC_DATE = explode(".", $NewsDate);
				$FinalDate = date("Y-m-d H:i:s", mktime(0,0, 0, $TRUNC_DATE[1], $TRUNC_DATE[0], $TRUNC_DATE[2]));
				return $result = DB::table('AC_News')->where('ID', $NewsID)->update(['NewsTime' => $FinalDate]);
			}
			function UpdateNewsNameShort($NewsID,$NewsNameShort){
				if(!empty($NewsNameShort)){
					return $result = DB::table('AC_News')->where('ID', $NewsID)->update(['ShortName' => $NewsNameShort]);	
				}
			}
			function UpdateNewsName($NewsID,$NewsName){
				if(!empty($NewsName)){
					return $result = DB::table('AC_News')->where('ID', $NewsID)->update(['Name' => $NewsName]);	
				}
			}
			function UpdateNewsBody($NewsID,$NewsText){
				if(!empty($NewsText)){
					return $result = DB::table('AC_News')->where('ID', $NewsID)->update(['NewsBody' => $NewsText]);	
				}
			}
			function UpdateShowHideNews($NewsID,$val){
				if(!empty($NewsID)){
					return $result = DB::table('AC_News')->where('ID', $NewsID)->update(['ShowSite' => $val]);	
				}
			}
			
			function UpdateMainImageNews($NewsID,$LinkSite){
				if(!empty($LinkSite)){
					return $result = DB::table('AC_News')->where('ID', $NewsID)->update(['MainImage' => $LinkSite]);	
				}
			}
			
			function NewsAddGallery($NewsID,$URL,$FilesNew,$extension){
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO AC_News_Gallery (NewsID,URL,EXT,Filename) VALUES (?,?,?,?)");
				$stmt->execute([$NewsID,$URL,$extension,$FilesNew]);
				$PageID = $PDO->lastInsertId();
				return $PageID;
			}



			function AddNewCollection($PageID,$Arr){
				
				$Chek = self::ChekCollectionExist($Arr['category_id']);
				if($Chek == 2){
					
					$PDO = DB::connection()->getPdo();
					$stmt = $PDO->prepare("INSERT INTO AC_Collections (1C_ID,Name,URL,Slug,URLID) VALUES (?,?,?,?,?)");
					$stmt->execute([$Arr['category_id'],$Arr['CategoryNameSite'],"/collection/".$Arr['CategoryNameSiteUrl']."",$Arr['CategoryNameSiteUrl'],$PageID]);
					$PageID = $PDO->lastInsertId();
					return $PageID;
					
				}
				
			}
			//check if collection exist
			function ChekCollectionExist($category_id){
				$Chek = DB::table('AC_Collections')->where('1C_ID', '=', $category_id)->value('ID');
				if(!empty($Chek)){
					return 1;
				} else {
					return 2;
				}
			}
			
			
		
		
		
		
		
		
		public function carview($Slug){
			
			$CarsRentController = new CarsRentController();
			$PageController = new PageController();
			$SeoController  = new SeoController();
			
			$CarID            = $CarsRentController -> ReturnCarIDBYSlug($Slug);
			$PageControllerID = $PageController     -> ReturnPageIDBY_TypeTableID($CarID);
			
			$Car = $CarsRentController -> ReturnCarBySlug($Slug);
			$SEO = $SeoController      -> ReturnPageSEO($PageControllerID);
			
			
			//return $Car;
			
			return view('beecars.carview', [
				'Car' => $Car,
				'SEO' => $SEO
				]
			);
			
		}
		
		
		public function mainview_cms(){
			
			$CarMakeController = new CarMakeController();
			$CarsRentController = new CarsRentController();
			
			
			$Arr = $CarMakeController -> ReturnCarMakeList();
			$CarList = $CarsRentController -> ReturnCarsToRentList();
			
			
			return view('beecars_cms.mainview', [
				'MakeList' => $Arr, 
				'CarList'  => $CarList
				]
			);
		}
		public function cms_cars_list(){
				
			$CarMakeController = new CarMakeController();
			$CarsRentController = new CarsRentController();
			
			$Arr = $CarMakeController -> ReturnCarMakeList();
			$CarList = $CarsRentController -> ReturnCarsToRentList();
			
			return view('beecars_cms.cars_list', [
				'MakeList' => $Arr, 
				'CarList'  => $CarList
				]
			);
		}
		
		
		
		
		
		
		
		
		
		public function docview($ID){
			//$ID;
			//SELECT A.*, B.* FROM `TZ_Docs` AS A, `TZ_DocsBody` AS B WHERE A.ID = 1 AND A.DocBodyID = B.ID->first()
		    $worlds = self::ReturnDocInfo($ID);
		    $body   = self::ReturnActiveDocBody($worlds->DocBodyID);
			$tags   = self::ReturnDocTags($ID);
			$older  = self::ReturnOlder($ID,$worlds->DocBodyID);
			$PDF_BODY = self::DocPdf($body);
			//var_dump($PDF_BODY);
			
		    return view('docs.docview', ['DocTech' => $worlds,'DocBody' => $body, 'Tags' => $tags, 'Older' => $older, 'PDF' => $PDF_BODY]);
	    }
		public function DocViewOlder($ID,$Version){
			//$ID;
			//SELECT A.*, B.* FROM `TZ_Docs` AS A, `TZ_DocsBody` AS B WHERE A.ID = 1 AND A.DocBodyID = B.ID->first()
		    $worlds  = self::ReturnDocInfo($ID);
		    $body    = self::ReturnActiveDocBody($Version);
		    $Vdata   = self::ReturnActiveDocBodyDate($Version);
			$tags    = self::ReturnDocTags($ID);
			$older   = self::ReturnOlderOther($ID,$worlds->DocBodyID,$Version);
			
		    return view('docs.docviewolder', ['DocTech' => $worlds,'DocBody' => $body, 'Tags' => $tags, 'Older' => $older, 'Vdata' => $Vdata]);
	    }
		public function DocEditView($ID){
			//$ID;
			//SELECT A.*, B.* FROM `TZ_Docs` AS A, `TZ_DocsBody` AS B WHERE A.ID = 1 AND A.DocBodyID = B.ID->first()
		    $worlds = self::ReturnDocInfo($ID);
		    $body   = self::ReturnActiveDocBody($worlds->DocBodyID);
			$tags   = self::ReturnDocTags($ID);
			
		    return view('docs.editview', ['DocTech' => $worlds,'DocBody' => $body, 'Tags' => $tags]);
	    }
		public function addview(){
			return view('black.addview');
		}
		public function tagview($TAG_ID){
			$DocsIDS = DB::table('TZ_Docs_Worlds_Collocation')->where('TagID', "=" , $TAG_ID)->get()->toArray();	
			$TAG = DB::table('TZ_Worlds')->where('ID', '=', $TAG_ID)->value('TZ_Word');
			//var_dump($DocsIDS);
			if(!empty($DocsIDS)){
				$SearchResult = self::ReturnDocsListBYID($DocsIDS);
				return view('docs.TP.docs_list_searchtag', ['DocName' => $SearchResult,'TagName' => $TAG]);
			} else {
				return view('docs.TP.docs_list_searchtagempty', ['TagName' => $TAG]);
			}
		}	
		
		
		
			
			
		
		
		
		

			
			
		//Search functions
		public function DocsLiteSearch($SV){
			foreach($SV as &$row){
				$ARR[] = $row['id'];
			}
			$DocsIDS = DB::table('TZ_Docs_Worlds_Collocation')->whereIn('TagID', $ARR)->get()->toArray();
			//var_dump($DocsIDS);
			if(!empty($DocsIDS)){
				$SearchResult = self::ReturnDocsListBYID($DocsIDS);
				return view('docs.TP.docs_list_searchlite', ['DocName' => $SearchResult]);
			} else {
				return view('docs.TP.docs_list_searchempty');
			}
		}	
		public function DocsTextSearch($WRD){
			//$DocsIDS = DB::select('SELECT ID AS DocID, DocCreate, DocUpdate, DocName, DocBodyID FROM `TZ_Docs` WHERE ID IN (SELECT DocID FROM `TZ_DocsBody` WHERE DocBody LIKE "%:DocText%")', ['DocText' => $WRD]);
			$DocsIDS = DB::select('SELECT DocID FROM `TZ_DocsBody` WHERE DocBody LIKE "%'.$WRD.'%"');
			var_dump($DocsIDS);
			if(!empty($DocsIDS)){
				$SearchResult = self::ReturnDocsListBYID($DocsIDS);
				return view('docs.TP.docs_list_searchlite', ['DocName' => $SearchResult]);
			} else {
				return view('docs.TP.docs_list_searchempty');
			}	
			
		}*/
	}
