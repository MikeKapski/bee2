<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests;


use App\User;
use App\Http\Controllers\Controller;

use Auth;
use PDF;
use File;

	class CmsController extends Controller
	{
		
		/*ReturnMenuAllCategories*/
		function ReturnMenuAllCategories(){
			$i=0;
			$Arr = array();
			$RES = DB::table('ER_MenuCategories')->orderBy('ID', 'ASC')->get()->toArray();
			foreach($RES as &$row){	
				$Arr[$i]['ID']   = $row->ID;
				$Arr[$i]['Name'] = $row->Name;
				$Arr[$i]['URL']  = $row->URL;
				$i++;
			}
			return $Arr;
		}
		function ReturnMenuAllCategoriesAndPositions(){
			$i=0;
			$Arr = array();
			$RES = DB::table('ER_MenuCategories')->orderBy('ID', 'ASC')->get()->toArray();
			foreach($RES as &$row){	
				$Arr[$i]['ID']        = $row->ID;
				$Arr[$i]['Name']      = $row->Name;
				$Arr[$i]['URL']       = $row->URL;
				$Arr[$i]['Positions'] = self:: ReturnCategoryPosition($row->ID);
				$i++;
			}
			return $Arr;
		}
		function ReturnCategoryPosition($CategoryID){
			$i=0;
			$Arr = array();
			$RES = DB::table('ER_MenuItems')->where('CategoryID', '=', $CategoryID)->orderBy('ID', 'ASC')->get()->toArray();
			foreach($RES as &$row){	
				$Arr[$i]['ID']    = $row->ID;
				$Arr[$i]['Name']  = $row->Name;
				$Arr[$i]['Price'] = $row->Price;
				$i++;
			}
			return $Arr;
		}
    }