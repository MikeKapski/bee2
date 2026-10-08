<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\User;
use App\Http\Controllers\Controller;

use PDF;
/*use Mail;*/




	class EmailController extends Controller
	{
		public $Serv = "http://dev.tcentor.avangard.ru";
		
		
		
		function AddNewOrderMail($Fullcart,$Client,$CartID){
			$maildata['SendTo'] = $Client['UserEmail'];
			$maildata['Theme']  = "Ваш заказ № ".$Fullcart['CartID']." на сайте altacera.ru";
			
			$MailRow  = "<style>html{
				padding-top:0px;
				padding-right:0px;
				padding-bottom:0px;
				padding-left:0px;
				margin-top:0px;
				margin-right:0px;
				margin-bottom:0px;
				margin-left:0px;
				}
				table{
				border-collapse:collapse;
				margin-bottom:0px;
				}table td{
				text-align:left;
				}img{
				border-top-style:none;
				border-right-style:none;
				border-bottom-style:none;
				border-left-style:none;
				border-top-width:0px;
				border-right-width:0px;
				border-bottom-width:0px;
				border-left-width:0px;
				}</style>";
			$MailRow .= "".$Client['UserName'].", здравствуйте!<br>";
			$MailRow .= "Благодарим за заказ № ".$CartID." на нашем сайте.<br>";
			$MailRow .= "Если вам не позвонили в течение трех часов с момента оформления заказа, просим вас связаться с нами по телефону <a href='tel:+74952680522'>+74952680522</a>.<br><br>";


			$MailRow .= "<table>
							<tbody>
							<tr>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Наименование</td>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Кол-во</td>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Ед. изм</td>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Цена</td>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Итого</td>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Скидка</td>
								<td style='border:solid 1px #B3EAE7;padding:10px;border-collapse:collapse;background:#B3EAE7;'>Стоимость</td>
							</tr>";

			foreach($Fullcart['Cart'] as &$row){
				$Vtype = "шт.";
				if($row['UnitID'] == 55){ $Vtype = "м<sup>2</sup>"; }

				$MailRow .= "<tr>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$row['Name']."</td>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$row['SquareTotalRow']."</td>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$Vtype."</td>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$row['PriceForUnit']."</td>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$row['TotalPriceRow']."</td>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$row['Discount']."</td>
								<td style='border: solid 1px #B3EAE7;padding: 10px;border-collapse: collapse;'>".$row['TotalPriceRow']."</td>
							</tr>";
			}

			$MailRow .= "<tr><td colspan='6'><br><br>Стоимость заказа:</td><td><br><br><span>".$Fullcart['CartTotalM']."</span> руб.</td></tr>";
			
				$UslugaTypeText = "";
				if($Client['UslugaType'] == 1){ $UslugaTypeText = "Без услуг"; }
				if($Client['UslugaType'] == 2){ $UslugaTypeText = "Подъем на ".$Client['UslugaTypeVal']." этаж"; }
				if($Client['UslugaType'] == 3){ $UslugaTypeText = "Подъем на любой этаж на лифте"; }
				if($Client['UslugaType'] == 4){ $UslugaTypeText = "Разгрузка у подъезда/дома"; }
				
			$MailRow .= "<tr><td colspan='6'>Платные услуги (".$UslugaTypeText."):</td><td><span>".$Client['UslugaPrice']."</span> руб.</td></tr>";
				
				if($Client['DostType'] == 1){
					$DeliveyTypeText = "Самовывоз";
					$DstPrice = 0;
				}
				if($Client['DostType'] == 2){
					if($Client['DostavkaTypeDelivery'] == 1){ $DeliveyTypeText = "в пределах Московской области ( ".$Client['DostavkaDist']." км. от МКАД)"; }
					if($Client['DostavkaTypeDelivery'] == 2){ $DeliveyTypeText = "в пределах МКАД"; }
					if($Client['DostavkaTypeDelivery'] == 3){ $DeliveyTypeText = "в пределах ТТК"; }
					if($Client['DostavkaTypeDelivery'] == 4){ $DeliveyTypeText = "в пределах льготной зоны"; }
					if($Client['DostavkaTypeDelivery'] == 5){ $DeliveyTypeText = "до транспортной компании"; }
					$DstPrice = $Client['DostavkaPrice'];
				}
			
			$MailRow .= "<tr><td colspan='6'>Доставка (".$DeliveyTypeText."):</td><td><span>".$DstPrice."</span> руб.</td></tr>";
				
			$Final = $DstPrice + $Fullcart['CartTotalM'] + $Client['UslugaPrice'];	

			$MailRow .= "<tr><td colspan='6'>Итого:</td><td><span><b>".$Final."</b></span> <b>руб.</b></td></tr>";
			$MailRow .= "</tbody></table>";
			$MailRow .= "Общий вес: ".$Fullcart['CartTotalW']." кг<br>";

			$MailRow .= "<br><br>С наилучшими пожеланиями, интернет-магазин <a href='https://altacera.ru' target='_blank'>altacera.ru</a>";
			
			$maildata['MailBody'] = $MailRow;
			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject($maildata['Theme'])
				->from('order@altacera.ru', 'AltaCera')
				->cc('webbsu@mail.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
		function SendMailMustang($PhoneNumber, $name,$message,$Timenow){
			//$maildata['SendTo'] = "info@delacora.ru";
			$maildata['SendTo'] = "webbsu@mail.ru";
			$maildata['Theme']  = "Заказ мустанга";
			
			$MailRow = "Сообщение с сайта<br>";
			$MailRow .= "Телефон: ".$PhoneNumber." <br>";
			$MailRow .= "Имя: ".$name." <br>";
			$MailRow .= "Сообщение: ".$message." <br>";
			
			
			$maildata['MailBody'] = $MailRow;
			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject($maildata['Theme'])
				->from('info@bee-cars.ru', 'Би Карс')
				//->cc('webbsu@mail.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
		function SendMailCallMe($PhoneNumber){
			//$maildata['SendTo'] = "info@delacora.ru";
			$maildata['SendTo'] = "webbsu@mail.ru";
			$maildata['Theme']  = "Заказ обратного звонка";
			
			$MailRow = "Сообщение с сайта<br>";
			$MailRow .= "Телефон: ".$PhoneNumber." <br>";
			
			
			$maildata['MailBody'] = $MailRow;
			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject($maildata['Theme'])
				->from('info@bee-cars.ru', 'Би Карс')
				//->cc('webbsu@mail.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
		
		function NewOrderMailManager($Arr){
			$maildata['SendTo'] = "webbsu@mail.ru";
			$maildata['Theme']  = "Новый заказ";
			
			$MailRow = "Новый заказ с сайта<br>";
			$MailRow .= "Имя Клиента: ".$Arr['ClientName']." <br>";
			$MailRow .= "Телефон: ".$Arr['ClientPhone']." <br>";
			//$MailRow .= "Почта: ".$Arr['ClientEmail']." <br>";
			$MailRow .= "Автомобиль: ".$Arr['CarName'] ." <br>";
			$MailRow .= "Количество дней: ".$Arr['CarDays']." <br>";
			$MailRow .= "Начало аренды: ".$Arr['CarStart']." <br>";
			//$MailRow .= "Комментарий к заказу: ".$Arr['Comment']." <br>";
			
			/*if($Arr['DostID'] == 1){
				$MailRow .= "Тип подачи: ".$Arr['Dost']." <br>";			  
				$MailRow .= "Адрес подачи: ".$Arr['DostAddr']." <br>";  
			}
			if($Arr['DostID'] == 2){
				$MailRow .= "Тип подачи: ".$Arr['Dost']." <br>";			  
				$MailRow .= "Адрес подачи: ".$Arr['DostAddr']." <br>";  
			}*/
			
			/*if(!empty($Arr['Dops'])){
				$MailRow .= "Опции к заказу<br>";
				foreach($Arr['Dops']['Options'] as &$row){	
					$MailRow .= "".$row['Name']." (Цена за стуки - ".$row['PriceDay']."): Всего".$row['PriceTotal']."<br>";
				}
				$MailRow .= "Опции итого:".$Arr['Dops']['TotalOptions']."<br>";
			}*/
			
			$MailRow .= "Предварительная цена итого: ".$Arr['CarTotal']." <br>";

			$maildata['MailBody'] = $MailRow;
			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject($maildata['Theme'])
				->from('info@bee-cars.ru', 'Би Карс')
				//->cc('webbsu@mail.ru')
				//->setBody($maildata['MailBody'], 'text/html');
				->html($maildata['MailBody']);
			});
		}
		
		
		/*
		
		MAIL_MAILER=smtp
		MAIL_HOST=mail.altacera.ru
		MAIL_PORT=1925
		MAIL_USERNAME=ak\order
		MAIL_PASSWORD=sD3G%yM2
		MAIL_ENCRYPTION=null
		MAIL_FROM_ADDRESS=null
		MAIL_FROM_NAME="${APP_NAME}"
		
		
		
		MAIL_MAILER=smtp
		MAIL_HOST=smtp.beget.com
		MAIL_PORT=2525
		MAIL_USERNAME=altacera30_mike@altacera.ru
		MAIL_PASSWORD=Junkers161803
		MAIL_ENCRYPTION=null
		MAIL_FROM_ADDRESS=null
		MAIL_FROM_NAME="${APP_NAME}"
		*/
		
		////->cc(['webbsu@mail.ru','koreneva@altacera.ru','gecerova@altacera.ru'])
		
		
		
		public function SendStartNewUser($email){
			$maildata['SendTo'] = $email;
			$maildata['MailBody'] = "Добрый день!
						Учетная запись активирована. Первичный пароль:123456Asd. Логин:".$email." .
						<a href='".$this->Serv."'>Авторизация</a>";

			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject('Учетная запись активирована')
				->from('Press-system@avangard.ru', 'Press System')
				->cc('kapskiyM@avangard.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
	 
		public function SendRestore($email){
			$maildata['SendTo'] = $email;
			Mail::raw('Новый пароль: 123456Asd', function($message) use($maildata){
				$message->from('Press-system@avangard.ru', 'Press System');
				$message->to($maildata['SendTo'])->cc('kapskiyM@avangard.ru');
				//$message->to("sites@avangard.ru")->cc('kapskiyM@avangard.ru');
			});
			return $email;
		}
		
		public function SendExucutorTask($email){
			$maildata['SendTo'] = $email;
			Mail::raw('Ахмед. Ты избран к задаче', function($message) use($maildata){
				$message->from('Press-system@avangard.ru', 'Press System');
				$message->to($maildata['SendTo'])->subject('Suggestion')->cc('kapskiyM@avangard.ru');
				//$message->to("sites@avangard.ru")->cc('kapskiyM@avangard.ru');
			});
			return $email;
		}
		
		public function SendStartExucutorTask($Task,$Exucutor){
			$maildata['SendTo'] = $Exucutor['Email'];
			$maildata['MailBody'] = "Добрый день!
						Вы назначены исполнителем по задаче «".$Task['TaskName']."».
						<a href='".$this->Serv."/Task/".$Task['ID']."/'>Перейти к задаче</a>";
			
			/*Mail::raw($MailBody, function($message) use($maildata){
				$message->from('Press-system@avangard.ru', 'Press System');
				$message->to($maildata['SendTo'])->subject('Уведомление о назначении исполнителем')->cc('kapskiyM@avangard.ru');
				//$message->to("sites@avangard.ru")->cc('kapskiyM@avangard.ru');
			});*/
			
			
			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject('Уведомление о назначении исполнителем')
				->from('Press-system@avangard.ru', 'Press System')
				->cc('kapskiyM@avangard.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
			 

			/*текст письма:


					= $List->ID;
					$TaskMS['TaskName']   = $List->Name;
					$TaskMS['TaskBody']   = $List->TaskBody;
					$TaskMS['Priority']   = $List->Priority;
					$TaskMS['GroupID']    = $List->GroupID;
					$TaskMS['Status']     = $List->Status;
					$TaskMS['Remain']     = $HelpController -> RemainTime($List->EndDate);
					$TaskMS['Owner']      = $UserController -> UserReturnID($List->OwnerID);
					$TaskMS['WorkerList'] = self::ReturnTaskWorkers($TaskID);
					$TaskMS['Exucutor']   = self::ReturnTaskExucutor($TaskID);
					$TaskMS['Files']      = self::GetFiles("Task",$TaskID);
					$TaskMS['Comments']   = $CommentController -> SelectTaskComment("Tasks",$TaskID);
			
			
			
			$User['F_Name']     = DB::table('TZ_Users_Info')->where('UserID', "=" , $ID)->value('F_Name');
			$User['S_Name']     = DB::table('TZ_Users_Info')->where('UserID', "=" , $ID)->value('S_Name');
			$User['FR_Name']    = DB::table('TZ_Users_Info')->where('UserID', "=" , $ID)->value('FR_Name');
			$User['Phone']      = DB::table('TZ_Users_Info')->where('UserID', "=" , $ID)->value('Phone');
			$User['UserRoleID'] = DB::table('TZ_Users_Info')->where('UserID', "=" , $ID)->value('UserRoleID');
			$User['Avatar']     = DB::table('TZ_Users_Info')->where('UserID', "=" , $ID)->value('Avatar');*/
			
			
		}
		public function SendStartUserTask($Task,$Exucutor){
			$maildata['SendTo'] = $Exucutor['Email'];
			$maildata['MailBody'] = "Добрый день!
						Вы назначены наблюдателем по задаче «".$Task['TaskName']."».
						<a href='".$this->Serv."/Task/".$Task['ID']."/'>Перейти к задаче</a>";

			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject('Уведомление о назначении наблюдателем')
				->from('Press-system@avangard.ru', 'Press System')
				->cc('kapskiyM@avangard.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
		public function AddCommentNotify($Email,$CommentID,$TaskID,$TaskName){
			$maildata['SendTo'] = $Email;
			$maildata['MailBody'] = "Добрый день!
						Добавлен новый комментарий к задаче «".$TaskName."».
						<a href='".$this->Serv."/Task/".$TaskID."/#Commentary".$CommentID."'>Просмотреть</a>";

			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject('Уведомление о новом комментарии')
				->from('Press-system@avangard.ru', 'Press System')
				->cc('kapskiyM@avangard.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
		
		public function ChangeStatusTaskNotify($Email,$TaskID,$TaskName,$StatusName){
			$maildata['SendTo'] = $Email;
			$maildata['MailBody'] = "Добрый день!
						Изменен статус к задаче «".$TaskName."».
						Новый статус: «".$StatusName."»
						<a href='".$this->Serv."/Task/".$TaskID."/'>Просмотреть</a>";

			Mail::send(array(), array(), function ($message) use ($maildata) {
			  $message->to($maildata['SendTo'])
				->subject('Уведомление смене статуса')
				->from('Press-system@avangard.ru', 'Press System')
				->cc('kapskiyM@avangard.ru')
				->setBody($maildata['MailBody'], 'text/html');
			});
		}
		
	}
