	  
	@inject('Detect', 'App\Http\Controllers\DetectController')


    <header class="bee_head">
      <div class="head_info">
        <div class="brand_logo">
            <a href="https://bee-cars.ru/" class="logostyle">
                <div class="brand_logo_company">БИ КАРС</div>
                <div class="brand_logo_text">АВТОПРОКАТ</div>
            </a>
        </div>
      </div>
      <div class="head_menu">1234</div>
    </header
	
	@php if ($Detect->isMobile() || $Detect->isTablet()) { @endphp
	
		<div class="Mobile_Slide_Pop" id="WMap">
			<div class="Mobile_Filters_Head">
				<div class="MFH_Head">Заказ автомобиля</div>
				<!--<div class="MFH_Clear">Очистить</div>
				<div class="MFH_H">Фильтры</div>-->
				<div class="MFH_Close"></div>
			</div>
			<div class="Mobile_Slide_Content"></div>
		</div>
	
		<div class="mobile_header">
			<div class="icons">
				<div class="place-header-mobile"><span class="ti-Line-Map-Pin-4"></span></div>
				<div class="email-header-mobile"><span class="ti-Line-Email"></span></div>
				<div class="phonei-header-mobile"><span class="ti-Line-Phone"></span></div>
				<div class="show-menu-mobile">
					<label for="show-menu-mobile">
						<input type="checkbox" id="show-menu-mobile"> 
						<span></span>
						<span></span>
						<span></span>
					</label>
				</div>
			</div>
			<div class="bar">
				<div class="cap"></div>
				<div class="middle">
					<div class="circle">
						<a href="https://bee-cars.ru/" class="logostyle">
							<img height="60" width="60" src="/img/bbcars_logo_pin.png" alt="Би Карс" title="Прокат автомобилей в Москве bee-cars.ru" >
						</a>
					</div>
					<div class="side"></div>
					<div class="side"></div>
				</div>
				<div class="cap"></div>
			</div>
		</div>
		<div class="main-nav" id="main-nav">
			<ul>
				<li><a href="https://bee-cars.ru/">Главная</a></li>
				<li><a href="/uslovia-prokata/">Условия проката</a></li>
				<li><a href="/o-kompanii/">О компании</a></li>
				<li><a href="/contacts/">Контакты</a></li>
			</ul>
		</div>
		
    @php }else{ @endphp	
	
		<div class="RightSidebar">
			<div class="RightSidebarItem">
				<a href="https://wa.me/74957903633"><div class="whatsapp_call"></div></a>
			</div>
			<div class="RightSidebarItem">
				<div class="gototop"></div>
			</div>
		</div>
		<header>
			<nav>
				<div id="brand">
				  <div id="logo">
					<a href="https://bee-cars.ru/" class="logostyle">
						<span class="color_orange">Би карс</span>
						<img height="40" width="40" src="/img/bbcars_logo_pin.png" alt="Би Карс" title="Прокат автомобилей в Москве bee-cars.ru">
						<span class="color_black">автопрокат</span>
					</a>
					
				  </div>
				</div>
				<div id="menu">
				  <div id="menu-toggle">
					<div id="menu-icon">
					  <div class="bar"></div>
					  <div class="bar"></div>
					  <div class="bar"></div>
					</div>
				  </div>
				  <ul class="mainmenu">
					<li><a class="activemenu" href="https://bee-cars.ru/">Главная</a></li>
					<li><a class="activemenu" href="/uslovia-prokata/">Условия проката</a></li>
					<li><a class="activemenu" href="/o-kompanii/">О компании</a></li>
					<li><a class="activemenu" href="/contacts/">Контакты</a></li>
				  </ul>
				</div>
				<div id="butoon-header">
					<div class="phone-header">
						<a href="tel:+74957903633" alt="Перезвоните мне, прокат автомобилей bee-cars.ru">+7 (495) 790-36-33</a>
					</div>
					<div class="show-menu-desctop">
						<label for="show-menu-desctop">
						  <input type="checkbox" id="show-menu-desctop"/> 
						  <span></span>
						  <span></span>
						  <span></span>
						</label>
					</div>
					<!--<div class="callme"   target="callmerepeat">Перезвоните мне!</div>
					<div class="personal" target="callmerepeat">123</div>-->
					
					
					<!-- Right Menu --> 
					<div class="RightSlideMenu">
						
					</div>
				</div>
				<div class="full_page_show">
					
				</div>
			</nav>
		  <div id="hero-section">
			<div id="head-line"></div>
		  </div>
			<!-- ORder window --> 
			<div class="RightSlideOrder">
				<h2>Заказ Автомобиля</h2>
				
				<div class="OrderInfoSlide">
					<div class="OrderInfoSlideRow">
						<div class="OrderInfoSlideRowLabel">ФИО</div>
						<input class="InputOnWhiteTextaR w100px" type="text">
					</div>
					<div class="OrderInfoSlideRow">
						<div class="OrderInfoSlideRowLabel">Телефон</div>
						<input class="InputOnWhiteTextaR w100px" type="text">
					</div>
					
				</div>
				
				
				<div class="RightSlideOrderCar">
					
					
					<div class="AnotherCar">
						<div class="AnotherCarText">Другой автомобиль?</div>
					</div>
				</div>
				<div class="RightSlideOrderCarClose"></div>
			</div>
		</header>
		
    @php } @endphp	