<?php

	namespace App\Services\Pages;

	use App\Models\SiteModels\PagesModel;
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

	class Pages{


        public $Site_URL = "https://bee-cars.ru/";

		public $DocsBreadCrumps = array();
		public $DocsPagesID = array();

        /*Хлебные крошки*/
         
        function ReturnBreadCrumps($PageID){
            
            self::DocsBreadCrumpsClean();
            self::ReturnDocsBreadCrumps(0,$PageID);

            $Bread = array_reverse($this->DocsBreadCrumps);
			$BreadCrumpsTemplates = self::ReturnBreacrumpsTemplate($Bread);
			return $BreadCrumpsTemplates;

        }

        function DocsBreadCrumpsClean(){
			$this->DocsBreadCrumps = array();
			return TRUE;
		}

        function DocsBreadCrumpsAdd($i,$value,$name,$Url){
			$this->DocsBreadCrumps[$i]['ID']   = $value;
			$this->DocsBreadCrumps[$i]['Name'] = $name;
			$this->DocsBreadCrumps[$i]['Url']  = $Url;
		}


        function ReturnDocsBreadCrumps($i,$ID){
			$Chek = PagesModel::where([['ID', '=', ''.$ID.'']])->value('ParentID');
			$Name = PagesModel::where([['ID', '=', ''.$ID.'']])->value('Name');
			$Url  = PagesModel::where([['ID', '=', ''.$ID.'']])->value('URL');
			if($Chek == 0){
				self::DocsBreadCrumpsAdd($i,$ID,$Name,$Url);
				$i++;
			}
			if($Chek != 0){
				self::DocsBreadCrumpsAdd($i,$ID,$Name,$Url);
				$i++;
				
				$this -> ReturnDocsBreadCrumps($i,$Chek);	
			}
		}

        function ReturnBreacrumpsTemplate($Bread){
			$MassCount = count($Bread);
			$CountStick = 1;
			$ROW = "<div class='block-breadcrumbs'><ol itemscope='' itemtype='http://schema.org/BreadcrumbList'>";
			foreach($Bread as $row){
				if($CountStick < $MassCount){
					if($row['Url'] == "/") { $URL = $this->Site_URL; } else { $URL = $row['Url']; }
					$ROW .="<li class='block-breadcrumbs-item' itemprop='itemListElement' itemscope='' itemtype='http://schema.org/ListItem'>
								<a itemprop='item' href='".$URL."'>
									<span itemprop='name'>".$row['Name']."</span>
								</a><meta itemprop='position' content='".$CountStick."'>
							</li>";
				}
				if($CountStick == $MassCount){
					$ROW .="<li class='block-breadcrumbs-item' itemprop='itemListElement' itemscope='' itemtype='http://schema.org/ListItem'>
								<span itemprop='name'>".$row['Name']."</span>
								<meta itemprop='position' content='".$CountStick."'>
							</li>";
				}
				$CountStick++;
			}
			$ROW .= "</ol></div>";
			return $ROW;
		}



    }

?>