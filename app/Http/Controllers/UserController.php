<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\User;
use App\Http\Controllers\Controller;

use PDF;
use File;

	class UserController extends Controller
	{
		
		//cheking functions
			//chek phone exist
			public function ChexUserPhoneExist($phone){
				$ID = DB::table('ER_UserPhones')->where('Phone', '=', $phone)->value('ID');
				if(!empty($ID)){
					return $ID;
				} else {
					return false;
				}
			}
			//chek phone status
			public function ChekPhoneStatus($PhoneID){
				$PhoneStatus = DB::table('ER_UserPhones')->where('ID', '=', $PhoneID)->value('Status');
				return $PhoneStatus;
			}
			//check email exist
			public function ChexUserEmailExist($email){
				$ID = DB::table('ER_UserEmail')->where('UserEmail', '=', $email)->value('ID');
				if(!empty($ID)){
					return $ID;
				} else {
					return false;
				}
			}
			//chek email status
			public function ChekEmailStatus($EmailID){
				$PhoneStatus = DB::table('ER_UserEmail')->where('ID', '=', $EmailID)->value('Status');
				return $PhoneStatus;
			}
			//chek userID by phone
			public function ReturnUserIDByPhone($PhoneID){
				$PhoneStatus = DB::table('ER_UserPhones')->where('ID', '=', $PhoneID)->value('UserID');
				return $PhoneStatus;
			}
			//chek user by mail
			public function ReturnUserIDByMail($EmailID){
				$PhoneStatus = DB::table('ER_UserEmail')->where('ID', '=', $EmailID)->value('UserID');
				return $PhoneStatus;
			}
		
		//Adding fucntions
			//add new phone
			function AddNewPhoneToBase($phone){
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO ER_UserPhones (ID,Phone,Status,UserID) VALUES (?,?,?,?)");
				$stmt->execute([Null,$phone,1,0]);
				$PhoneID = $PDO->lastInsertId();
				return $PhoneID;
			}
			//add new email
			function AddNewEmailToBase($email){
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO ER_UserEmail (ID,UserEmail,Status,UserID) VALUES (?,?,?,?)");
				$stmt->execute([Null,$email,1,0]);
				$PhoneID = $PDO->lastInsertId();
				return $PhoneID;
			}
			//Add New User
			function AddNewUser($name,$phoneID,$emailID){
				$PDO = DB::connection()->getPdo();
				$stmt = $PDO->prepare("INSERT INTO ER_User (ID,FormName,ActivePhoneID,ActiveEmailID) VALUES (?,?,?,?)");
				$stmt->execute([Null,$name,$phoneID,$emailID]);
				$resID = $PDO->lastInsertId();
				return $resID;
			}
		
		
		
		
	}
