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

	class AjaxController extends Controller
	{

        public function Ajaxworker(Request $request){
			$Action = $request->input('action');

			//Возврат ссылки на автомобиль при боковом фильтре
			if($Action == "RedirectByBrand"){

				$BrandPageID  = (int) $request->input('BrandPageID');
				$Page = Pages::ReturnPageURLByID($BrandPageID);

				if(!empty($Page)){
					$ARR['ErrStatus']  = 0;
					$ARR['ErrText']    = "";
					$ARR['PageURL']    = $Page;
				}

				$Ajax = json_encode($ARR);
				return $Ajax;

			}
            
            //Подсчет стоимости авто
            if($Action == "CalculatePriceCar"){

                $DateStartDate  = $request->input('DateStartDate');
				$DateStartEnd   = $request->input('DateStartEnd');
                $CarID          = $request->input('CarID');

                $DateStartDateTMP = (int) strtotime($DateStartDate);
                if(empty($DateStartEnd)){
                    $DateStartEndTMP =  strtotime('+1 day', $DateStartDateTMP);
                }else{
                    $DateStartEndTMP = (int) strtotime($DateStartEnd); 
                }

                //Count of days
                $Days = ($DateStartEndTMP - $DateStartDateTMP) / 86400;

                //Get Car
                $CarInfo  = Cars::ReturnCar($CarID);

                if($Days > 0 AND $Days < 5 ){
                    $PriceDay = $CarInfo['Price_1'];
                }
                if($Days >= 5 AND $Days < 10 ){
                    $PriceDay = $CarInfo['Price_2'];
                }
                if($Days >= 10 AND $Days < 30 ){
                    $PriceDay = $CarInfo['Price_3'];
                }
                if($Days >= 30 ){
                    $PriceDay = $CarInfo['Price_4'];
                }

                //Total Money
                $TotalMoney = $PriceDay * $Days;
               
                //Final Data
				$ARR['Days']       = $Days;
				$ARR['PriceDay']   = $PriceDay;
                $ARR['TotalMoney'] = $TotalMoney;
				
				
				$Ajax = json_encode($ARR);
				return $Ajax;  
            }

            //Заказ Автомобиля
            if($Action == "OrderCar"){

                $DateStartDate  = $request->input('DateStartDate');
				$DateStartEnd   = $request->input('DateStartEnd');
                $CarID          = $request->input('CarID');
                $OrderName      = $request->input('OrderName');
                $OrderPhone     = $request->input('OrderPhone');

                //Данные Автомобиля и кол-во дней
                $DateStartDateTMP = (int) strtotime($DateStartDate);
                if(empty($DateStartEnd)){
                    $DateStartEndTMP =  strtotime('+1 day', $DateStartDateTMP);
                }else{
                    $DateStartEndTMP = (int) strtotime($DateStartEnd); 
                }

                //Count of days
                $Days = ($DateStartEndTMP - $DateStartDateTMP) / 86400;

                //Get Car
                $CarInfo  = Cars::ReturnCar($CarID);

                if($Days > 0 AND $Days < 5 ){
                    $PriceDay = $CarInfo['Price_1'];
                }
                if($Days >= 5 AND $Days < 10 ){
                    $PriceDay = $CarInfo['Price_2'];
                }
                if($Days >= 10 AND $Days < 30 ){
                    $PriceDay = $CarInfo['Price_3'];
                }
                if($Days >= 30 ){
                    $PriceDay = $CarInfo['Price_4'];
                }

                //Total Money
                $TotalMoney = $PriceDay * $Days;

                $UserStatus = 1;

                //Загрузка контроллеров
                $UserController        = new UserController();
				$OrderController       = new OrderController();
				//$CarsController        = new CarsController();
				$EmailController       = new EmailController();
				$TelegramBotController = new TelegramBotController();
				$TemplateController    = new TemplateController();

                //Phone Check
					$PhoneChek = $UserController -> ChexUserPhoneExist($OrderPhone);
					if($PhoneChek  === false){
						$PhoneID = $UserController -> AddNewPhoneToBase($OrderPhone);
					}else{
						$PhoneStatus = $UserController -> ChekPhoneStatus($PhoneChek);
						if($PhoneStatus == 1){
							$PhoneID = $PhoneChek;
						}
						if($PhoneStatus == 2){
							$UserStatus = 2;
						}
					}
					//Email Check
					/*$EmailChek = $UserController -> ChexUserEmailExist($OrderMail);
					if($EmailChek  === false){
						$EmailID = $UserController -> AddNewEmailToBase($OrderMail);
					}else{
						$EmailStatus = $UserController -> ChekEmailStatus($EmailChek);
						if($EmailStatus == 1){
							$EmailID = $EmailChek;
						}
						if($EmailStatus == 2){
							$UserStatus = 2;
						}
					}*/
					
					//Add New Order
					if($UserStatus == 1){
						//UserActions
						$UserIDPhone = $UserController -> ReturnUserIDByPhone($PhoneID); //В приоритете телефон а не почта
						if($UserIDPhone  == 0){
                            $UserID = $UserController -> AddNewUser($OrderName,$PhoneID,0);
							/*$UserIDMail = $UserController -> ReturnUserIDByMail($EmailID);
							if($UserIDMail  == 0){
								
							}else{
								$UserID = $UserIDMail;
							}	*/
						}else{
							$UserID = $UserIDPhone;
						}		
						
						//Add OrdersID
						$OrderID = $OrderController -> AddNewOrderStart(1,$UserID);
							$res = $OrderController -> UpdateOrderDays($OrderID,$Days);
							$res = $OrderController -> UpdateOrderPhoneID($OrderID,$PhoneID);
							//$res = $OrderController -> UpdateOrderEmailID($OrderID,$EmailID);
							//$res = $OrderController -> UpdateOrderDostType($OrderID,$DosID);
							//$res = $OrderController -> UpdateOrderComment($OrderID,$OrderComme);
							//if($DosID == 1){
							//	$res = $OrderController -> UpdateOrderDostAdress($OrderID,$OrderAdres);
							//}
							$res = $OrderController -> UpdateOrderDayStart($OrderID,$DateStartDate);
							$res = $OrderController -> UpdateOrderCarID($OrderID,$CarID);
							$res = $OrderController -> UpdateOrderPriceFull($OrderID,$TotalMoney);
							
						//DopsArr
						/*if(!empty($DopsArr)){
							$DopsRes = $OrderController -> AddOrderDops($OrderID,$DaysValue,$DopsArr);
							$Arr['Dops']  = $DopsRes;
						}*/
						
						//Return Carname
						$CarName = 	Cars::ReturnCarName($CarID);
						//PrepareData
						$Arr['ClientName']  = $OrderName;
						$Arr['ClientPhone'] = $OrderPhone;
						/*$Arr['ClientEmail'] = $OrderMail;
						if($DosID == 1){
							$Arr['DostID']   = 1;
							$Arr['Dost']     = "Доставка по адресу";
							$Arr['DostAddr'] = $OrderAdres;
						}
						if($DosID == 2){
							$Arr['DostID']   = 2;
							$Arr['Dost']     = "Самовывоз";
							$Arr['DostAddr'] = $OrderAdres;
						}*/
						$Arr['CarName']  = $CarName;
						$Arr['CarDays']  = $Days;
						$Arr['CarStart'] = $DateStartDate;
						$Arr['CarTotal'] = $TotalMoney;

                      
						
						//$Arr['Comment']  = $OrderComme;
						
						//Send Mailer
						//$Rm = $EmailController -> NewOrderMailManager($Arr);
						//Send Telegram
						$Rt = $TelegramBotController -> SendChatNewOrder($Arr);
						
					}
					
					
					//$Final = $TemplateController -> ReturnOrderFormSucces();
					
					return 15;
            }

            /*Шаблон быстрого заказа автомобиля*/
            if($Action == "GetTemplateFastOrder"){

                $CarID                 = $request->input('CarID');
                $TemplateController    = new TemplateController();

                $Final = $TemplateController -> ReturnFastOrder($CarID);

                return $Final;

            }

			/*Быстрый заказ автомобиля*/

			if($Action == "OrderCarFast"){

                $CarID          = $request->input('CarID');
                $OrderName      = $request->input('OrderName');
                $OrderPhone     = $request->input('OrderPhone');

                $UserStatus = 1;

                //Загрузка контроллеров
                $UserController        = new UserController();
				$OrderController       = new OrderController();
				//$CarsController        = new CarsController();
				$EmailController       = new EmailController();
				$TelegramBotController = new TelegramBotController();
				$TemplateController    = new TemplateController();

                //Phone Check
					$PhoneChek = $UserController -> ChexUserPhoneExist($OrderPhone);
					if($PhoneChek  === false){
						$PhoneID = $UserController -> AddNewPhoneToBase($OrderPhone);
					}else{
						$PhoneStatus = $UserController -> ChekPhoneStatus($PhoneChek);
						if($PhoneStatus == 1){
							$PhoneID = $PhoneChek;
						}
						if($PhoneStatus == 2){
							$UserStatus = 2;
						}
					}
					
				//Add New Order
				if($UserStatus == 1){
					//UserActions
					$UserIDPhone = $UserController -> ReturnUserIDByPhone($PhoneID); //В приоритете телефон а не почта
						if($UserIDPhone  == 0){
                            $UserID = $UserController -> AddNewUser($OrderName,$PhoneID,0);
						}else{
							$UserID = $UserIDPhone;
						}		
						
					//Add OrdersID
					$OrderID = $OrderController -> AddNewOrderStart(1,$UserID);

					$res = $OrderController -> UpdateOrderDays($OrderID,0);
					$res = $OrderController -> UpdateOrderPhoneID($OrderID,$PhoneID);
					$res = $OrderController -> UpdateOrderCarID($OrderID,$CarID);
					$res = $OrderController -> UpdateOrderPriceFull($OrderID,0);
							
					//Return Carname
					$CarName = 	Cars::ReturnCarName($CarID);
					//PrepareData
					$Arr['ClientName']  = $OrderName;
					$Arr['ClientPhone'] = $OrderPhone;
					$Arr['CarName']  = $CarName;
						
					$Rt = $TelegramBotController -> SendChatNewOrderFast($Arr);
						
				}
					
				//$Final = $TemplateController -> ReturnOrderFormSucces();
				return 15;
            }
            
            

        }

    }