	  
	@inject('Detect', 'App\Http\Controllers\DetectController')


    <header class="bee_head hidemobile">
      <div class="head_info padd_0_135">
        <div class="brand_logo">
            <a href="https://bee-cars.ru/" class="logostyle">
                <div class="brand_logo_company">БИ КАРС</div>
                <div class="brand_logo_text">АВТОПРОКАТ</div>
            </a>
        </div>
        <div class="brand_contacts">
            <div class="phone-header">
				<a href="tel:+74957903633" alt="Перезвоните мне, прокат автомобилей bee-cars.ru">+7 (495) 790-36-33</a>
			</div>
            <div class="phone-adress">
                Москва Нежинская дом 5 стр. 1 
			</div>
        </div>
        <div class="brands_time">
            Ежедневно с 10:00 до 22:00<br>
            Круглосуточная доставка автомобилей<br>
            <span>(при бронировании в рабочее время)</span>
        </div>
        <div class=header-actions>
            <div class="HeaderItem">
				<a href="https://wa.me/74957903633"><div class="whatsapp_call"></div></a>
			</div>
            <div class="HeaderItem">
				<a href="https://t.me/beecars1"><div class="telegram_call"></div></a>
			</div>
            <!--<div class="HeaderItem" id="menu">
                <div id="butoon-header">
					
					<div class="show-menu-desctop">
						<label for="show-menu-desctop">
						  <input type="checkbox" id="show-menu-desctop"> 
						  <span></span>
						  <span></span>
						  <span></span>
						</label>
					</div>
				
				</div>
			</div>-->
        </div>
      </div>
      <div class="head_menu padd_0_135">
            <ul class="mainmenu">
				<li><a class="activemenu" href="https://bee-cars.ru/">Главная</a></li>
				<li><a class="" href="/uslovia-prokata/">Условия проката</a></li>
				<li><a class="" href="/o-kompanii/">О компании</a></li>
				<li><a class="" href="/contacts/">Контакты</a></li>
			</ul>
      </div>
    </header
	
	@php if ($Detect->isMobile() || $Detect->isTablet()) { @endphp
	
		<div class="mobile_header">
			<div class="mobile_header_wrapper">
			    <div class="head_mobile_row_wrap">
					<div class="brand_logo">
						<a href="https://bee-cars.ru/" class="logostyle">
							<div class="brand_logo_company">БИ КАРС</div>
							<div class="brand_logo_text">АВТОПРОКАТ</div>
						</a>
					</div>
					<div class="show-menu-mobile">
						<label for="show-menu-mobile">
							<input type="checkbox" id="show-menu-mobile"> 
							<span></span>
							<span></span>
							<span></span>
						</label>
					</div>
				</div>
			</div>
			
			<!--<div class="icons">
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
			</div>-->
			
		</div>
		<div class="main-nav" id="main-nav">
			<ul>
				<li><a href="https://bee-cars.ru/">Главная</a></li>
				<li><a href="/uslovia-prokata/">Условия проката</a></li>
				<li><a href="/o-kompanii/">О компании</a></li>
				<li><a href="/contacts/">Контакты</a></li>
			</ul>
			<div class="call_mobile">
				<button class="mobile-button"><a href="tel:+74957903633" alt="Автопрокат автомобилей bee-cars.ru">+7 (495) 790-36-33</a></button>
			</div>
		</div>
		
    @php } @endphp	
