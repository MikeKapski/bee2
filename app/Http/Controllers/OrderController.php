<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\User;
use App\Http\Controllers\Controller;

use PDF;
use File;

	class OrderController extends Controller
	{
		
		//Add New Order Start
		public function AddNewOrderStart($Status,$UserID){
			//Status 1 - новый заказ
			//2 Заказ принят
			//3 Заказ подтвержден
			//4 В аренде
			//5 Заказ завершен
			//6 Заказ продлен
			//7 Заказ закрыт (после возврата депозита)
			//8 Заказ отменен
			
			$PDO = DB::connection()->getPdo();
			$stmt = $PDO->prepare("INSERT INTO ER_UserOrders (ID,StatusID,UserID) VALUES (?,?,?)");
			$stmt->execute([Null,$Status,$UserID]);
			$resID = $PDO->lastInsertId();
			return $resID;

		}
		//Insert Dops Functions
		public function AddOrderDops($OrderID,$DaysValue,$DopsArr){
			
			$CarsController = new CarsController();
			$i = 0;
			$TotalOptions = 0;
			foreach($DopsArr as &$row){	
			
				$OptionDayPrice = $CarsController -> ReturnOptionPriceByDays($row,$DaysValue);
				$OptionName     = $CarsController -> ReturnOptionName($row);
				$TotalPrice     = $DaysValue * $OptionDayPrice;
				
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO ER_UserOrders_Dop (ID,OrderID,DopID,PriceDay,PriceTotal,DaysCount) VALUES (?,?,?,?,?,?)");
				$stmt->execute([Null,$OrderID,$row,$OptionDayPrice,$TotalPrice,$DaysValue]);
				$resID = $PDO->lastInsertId();
				
				$Arr['Options'][$i]['Name']       = $OptionName;
				$Arr['Options'][$i]['ID']         = $row;
				$Arr['Options'][$i]['PriceDay']   = $OptionDayPrice;
				$Arr['Options'][$i]['PriceTotal'] = $TotalPrice;
	
				$TotalOptions = $TotalOptions + $TotalPrice;
				$i++;
			}
			$Arr['TotalOptions'] = $TotalOptions;
			return $Arr;
		}
		
		//Update Functions
			//Update Days Cols
			function UpdateOrderDays($OrderID,$Days){
				if(!empty($Days)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['DaysCount' => $Days]);	
				}
			}
			//order phone ID
			function UpdateOrderPhoneID($OrderID,$PhoneID){
				if(!empty($PhoneID)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['PhoneID' => $PhoneID]);	
				}
			}
			//update order EmailID
			function UpdateOrderEmailID($OrderID,$EmailID){
				if(!empty($EmailID)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['EmailID' => $EmailID]);	
				}
			}	
			//Update Dost type
			function UpdateOrderDostType($OrderID,$DosID){
				if(!empty($DosID)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['DostID' => $DosID]);	
				}
			}
			//update dost adress
			function UpdateOrderDostAdress($OrderID,$OrderAdres){
				if(!empty($OrderAdres)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['DostAdress' => $OrderAdres]);	
				}
			}
			//Update DaysStart
			function UpdateOrderDayStart($OrderID,$DaysCalendar){
				if(!empty($DaysCalendar)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['OrderDayStart' => $DaysCalendar]);	
				}
			}
			//update CarID
			function UpdateOrderCarID($OrderID,$CarID){
				if(!empty($CarID)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['CarID' => $CarID]);	
				}
			}
			//Update Final Price
			function UpdateOrderPriceFull($OrderID,$FinalPrice){
				if(!empty($FinalPrice)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['OrderPrice' => $FinalPrice]);	
				}
			}
			//Update Order Commentary
			function UpdateOrderComment($OrderID,$OrderComme){
				if(!empty($OrderComme)){
					return $result = DB::table('ER_UserOrders')->where('ID', $OrderID)->update(['Comment' => $OrderComme]);	
				}
			}
			
		
	}
