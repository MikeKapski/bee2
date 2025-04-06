@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.default')

@section('content')

    <div class="defaultpage padd_0_135">
        <div class="htmlpageblock padd_0_135">

            <div class="Breadrumps">
                {!! $BreadCrumps !!}
            </div> 

            <div class="three_rows_wrapper">
				@php if (!$Detect->isMobile() && !$Detect->isTablet()) { @endphp
                <div class="left_block_content">
                    <div class="brands_list_content">
						@include('components.site.brandlist', [
							'CarsBrands' => $CarsBrands,
							'CarActions' => 'HrefBox'
						])
                    </div>
                </div>
				@php } @endphp
                <div class="center_block_content">
					
                    <div class="black_header">
						<h1>О Компании</h1>
					</div>       
                    <div class="yeloow_header">
						<h1>Прокат автомобилей в Москве — это реально!</h1>
					</div>
					<div class="uslovia-content-row-list">
						<div>Мы занимаемся прокатом автомобилей в Москве и Московской области с 2018 года. Мы знаем как для Вас важен хороший сервис. Поэтому аренда автомобилей в компании «Би Карс» — это просто и быстро, без лишних вопросов!</div>
						<div>В нашем парке можно выбрать автомобиль из более чем 12 ведущих марок автомобилей – это просто и удобно. Мы заботимся о своих клиентах и стараемся предоставить им наилучший сервис и найти подход к каждому клиенту без исключения. Звоните и бронируйте прямо сейчас!</div>
					</div>        
					<div class="yeloow_header">
						<h1>Автомобиль напрокат в «Би Карс» — это легко и просто!</h1>
					</div>
					<div class="uslovia-content-row-list">
						<div>Мы постарались по максимуму упростить аренду авто для Вас: всё, что Вам необходимо для аренды – это предъявить свой паспорт и водительское удостоверение, пройти проверку службы безопасности и можете приезжать за своим автомобилем. Для Вашего удобства документы на проверку вы можете предоставить лично в нашем офисе или отправить нам на What's app. Мы ценим Ваше время, поэтому оформление автомобиля в аренду займет не более 15 минут.</div>
					</div>
                    <div class="yeloow_header">
						<h1>Как нас найти?</h1>
					</div>
					<div class="uslovia-content-row-list">
						<div>Взять машину напрокат в «Би Карс» — это всегда легко! Офис нашей организации находится в шаговой доступности от станции метро Славянский бульвар или метро Кунцевская на ул. Нежинская 5 стр. 1, оф. 72.</div>
					</div>	

                    <div class="about_contacts">
                        <div class="about_contacts_image hidemobile">
                            <img src="/img/maps_about.png">
                        </div>  
                        <div class="about_contacts_text">
                            <h3>Адрес</h3>
                            <div class="about_contacts_text_item">
                                Москва<br>
                                Нежинская дом 5 строение 1<br>
                                Первый этаж, офис 1<br>
                                метро Славянский Бульвар<br>
                                метро Минская
                            </div>
                            <h3>Телефон</h3>
                            <div class="about_contacts_text_item">
                                <a href="tel:+74957903633">+7 (495) 790-36-33</a>
                            </div>
                            <h3>Время работы офиса</h3>
                            <div class="about_contacts_text_item">
                                Ежедневно с 10:00 до 22:00
                            </div>
                            <div class="defbuttons_wrap padd_20_0">
                                <a href="/uslovia-prokata" class="carbuttons">Как проехать?</a>
                            </div>
                        </div>     
                    </div>
                </div>

                <div class="right_block_content">
                    <div class="brands_list_content">
                        @include('components.site.howorder')
                    </div>
                    <div class="brands_list_content">
                        @include('components.site.howcost')
                    </div>
                </div>

            </div>
            
           
        </div>
    
    </div>
      
@stop