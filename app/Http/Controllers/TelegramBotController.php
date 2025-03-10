<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\User;
use App\Http\Controllers\Controller;

use PDF;
use File;

	class TelegramBotController extends Controller
	{
		
		private $TelegramApi = "2024655284:AAG4g49H7OgdKVzmE7xVeh9kRzqrI0chbno";
		//private $ChatID      = "1701088991";
		private $ChatID      = "-1001596345175";
		
		function SendChatCallMe($PhoneNumber){
			
			$arr = array(
				'Тип сообщения:' => "Перезвоните мне. ",
				'Телефон:' => $PhoneNumber
			);
			$txt = "";
			foreach($arr as $key => $value) {
				$txt .= "<b>".$key."</b> ".$value."%0A";
			}
			
			$sendToTelegram = fopen("https://api.telegram.org/bot".$this->TelegramApi."/sendMessage?chat_id=".$this->ChatID."&parse_mode=html&text=".$txt."","r");
			
			if ($sendToTelegram) {
				return 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.';
			}else {
				return  'Что-то пошло не так. ПОпробуйте отправить форму ещё раз.';
			}
			//return "https://api.telegram.org/bot{".$this->TelegramApi."}/sendMessage?chat_id={".$this->ChatID."}&parse_mode=html&text={".$txt."}";
		}
		
		
		function SendChatCallMeMustang($PhoneNumber,$name,$message,$Timenow){
			
			$arr = array(
				'Тип сообщения:' => "Mustang мне. ",
				'Телефон:' => $PhoneNumber,
				'Имя:' => $name,
				'Сообщение:' => $message
			);
			$txt = "";
			foreach($arr as $key => $value) {
				$txt .= "<b>".$key."</b> ".$value."%0A";
			}
			
			$sendToTelegram = fopen("https://api.telegram.org/bot".$this->TelegramApi."/sendMessage?chat_id=".$this->ChatID."&parse_mode=html&text=".$txt."","r");
			
			if ($sendToTelegram) {
				return 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.';
			}else {
				return  'Что-то пошло не так. ПОпробуйте отправить форму ещё раз.';
			}
			//return "https://api.telegram.org/bot{".$this->TelegramApi."}/sendMessage?chat_id={".$this->ChatID."}&parse_mode=html&text={".$txt."}";
		}
		
		
		function SendChatNewOrder($Arr){
			
			$Options = "";
			/*if(!empty($Arr['Dops'])){
				$Options .= "Опции к заказу%0A";
				foreach($Arr['Dops']['Options'] as &$row){	
					$Options .= "".$row['Name']." (Цена за стуки - ".$row['PriceDay']."): Всего ".$row['PriceTotal']."%0A";
				}
				$Options .= "Опции итого: ".$Arr['Dops']['TotalOptions']."%0A";
			}*/
			
			$arr = array(
				'Тип сообщения:'   => "TEST TEST TEST Новый заказ с сайта. ",
				'Имя Клиента:'     => $Arr['ClientName'],
				'Телефон:'         => $Arr['ClientPhone'],
				'Автомобиль:'      => $Arr['CarName'],
				'Количество дней:' => $Arr['CarDays'],
				'Начало аренды:'   => $Arr['CarStart'],
				'Предварительная цена итого:' => $Arr['CarTotal'],
			);
			$txt = "";
			foreach($arr as $key => $value) {
				if(!empty($value)){
					$txt .= "<b>".$key."</b> ".$value."%0A";
				}
			}
			
			
			
			
		
			
			$sendToTelegram = fopen("https://api.telegram.org/bot".$this->TelegramApi."/sendMessage?chat_id=".$this->ChatID."&parse_mode=html&text=".$txt."","r");
			
			if ($sendToTelegram) {
				return 'Спасибо! Ваша заявка принята. Мы свяжемся с вами в ближайшее время.';
			}else {
				return  'Что-то пошло не так. ПОпробуйте отправить форму ещё раз.';
			}
			
		}
		
		
		
	}
