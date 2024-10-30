@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.default')

@section('content')



@php 
    if (!$Detect->isMobile() && !$Detect->isTablet()) { 
        $OrderAction = "FastDesctop";

    @endphp
    <div class="defaultpage padd_0_135">
    @php } @endphp
    @php 
    if ($Detect->isMobile() || $Detect->isTablet()) { 
        $OrderAction = "FastMobile";
        @endphp
    <div class="mobilepage">	
    @php } @endphp
    

    @php if (!$Detect->isMobile() && !$Detect->isTablet()) { @endphp
    <div class="index_top_block">
        <div class="central_block_slider">
            <div class="central_block_left">
                <div><h1>Автопрокат "Би Карс" </h1></div>
                <div class="central_block_left_text">
                Посуточная аренда<br> 
                автомобилей в Москве
                </div>
                <div class="central_block_left_ul">
                    <div><div class="slider_icon slider_icon_1"></div>Регулярные скидки и акции</div>
                    <div><div class="slider_icon slider_icon_2"></div>Быстрое оформление</div>
                    <div><div class="slider_icon slider_icon_3"></div>Все машины застрахованы по КАСКО</div>
                    <div><div class="slider_icon slider_icon_4"></div>Любая форма оплаты</div>
                </div>
            </div>
            <div class="central_block_right">
                <img src="/img/banners/mainpagebanner.png">
            </div>
        </div>
    </div>
    @php } @endphp	
        
    @php if ($Detect->isMobile() || $Detect->isTablet()) { @endphp
        
    <div class="index_top_block_mobile">
       
    </div>
    @php } @endphp

    <div class="central_block">

        <div class="left_block_content">
            <div class="brands_list_content">
                <h2>Наш парк авто</h2>
                <div class="car_brands_list">
                    Список авто
                </div>
            </div>
            <div class="brands_list_content">
                <h2>Как заказать?</h2>
                <div class="how_order_text">
                    <p>Минимальный возраст — 23 года</p>
                    <p>Водительский стаж — не менее 3 лет</p>
                    <p>Наличие постоянной регистрации</p>

                    <p>Для того, чтобы заказать прокат автомобиля позвоните по телефону <a href="tel:+74957903633" alt="Перезвоните мне, прокат автомобилей bee-cars.ru">+7 (495) 790-36-33</a>
                    или оформите заявку на сайте. Наши менеджеры с радостью ответят на все интересующие вас вопросы</p>

                    <div class="defbuttons_wrap padd_20_0">
                        <a href="/o-kompanii" class="defbuttons">Подробнее</a>
                    </div>
                </div>
            </div>
            <div class="brands_list_content">
                <h2>Стоимость и уловия</h2>
                <div class="main_uslovia">
                    <div class="main_uslovia_wrap">
                        <div class="main_uslovia_image">
                            <img src="/img/icons/uslovia_1.png"/>
                        </div>
                        <div class="main_uslovia_text">
                            <div class="main_uslovia_text_heading">В пределах МКАД</div>
                            <div class="main_uslovia_text_price">1500 руб.</div>
                        </div>
                    </div>
                    <div class="main_uslovia_wrap">
                        <div class="main_uslovia_image">
                            <img src="/img/icons/uslovia_2.png"/>
                        </div>
                        <div class="main_uslovia_text">
                            <div class="main_uslovia_text_heading">В аэропорт Шереметьево, Домодедово и Внуково</div>
                            <div class="main_uslovia_text_price">2000 руб.</div>
                        </div>   
                    </div>
                    <div class="main_uslovia_wrap">
                        <div class="main_uslovia_image">
                            <img src="/img/icons/uslovia_3.png"/>
                        </div>
                        <div class="main_uslovia_text">
                            <div class="main_uslovia_text_heading">Подача и Возврат</div>
                            <div class="main_uslovia_text_text">Осуществляется круглосуточно - по предварительной записи</div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <div class="cars-on-mainpage">
            
            <div class="cars-on-mainpage-wrapper">
                @isset($CarsAll)
                    @foreach ($CarsAll as $car)
                    <div class="main-car-card">
                            <div class="main-car-card-content">
                                <div class="row-100 FastIMage">
									<div id="Lazy_Car_{{ $car['ID'] }}" class="LazyUpload" data-car="{{ $car['ID'] }}" data-src="" data-href="{{ $car['PageUrl'] }}">
										<img src="/img/car_sl.png" >
									</div>
								</div>

                                <div class="row-100">
									<h2><a href="{{ $car['PageUrl'] }}">{{ $car['Name'] }}</a></h2>
                                </div>
                                <div id="CarDays_{{ $car['ID'] }}" class="main-cars-days" data-carid="{{ $car['ID'] }}">
                                    <div class="button-days-cols">Количество дней от:</div>
									<ul>
										<li data-price-value="{{ $car['Price_1'] }}">1</li>
										<li data-price-value="{{ $car['Price_2'] }}">5</li>
										<li data-price-value="{{ $car['Price_3'] }}">10</li>
										<li class="active-car-card" data-price-value="{{ $car['Price_4'] }}">30</li>
									</ul>
								</div>
                                <div class="row-100 main-car-card-order-price">
									<div id="CarPrice_{{ $car['ID'] }}" class="button-fast-order-price">
										от <span>{{ $car['Price_4'] }} &#8381;</span> в сутки
									</div>
                                </div>
                                <div class="row-100 main-car-card-order-but">
									<div class="button-fast-order-but {{ $OrderAction }}" data-carid="{{ $car['ID'] }}" data-href="{{ $car['PageUrl'] }}">
										Заказать в 1 клик
									</div>
								</div>
                            </div>
                    </div>
                    @endforeach
                @endisset
                <?  
                    if(!empty($CarsAll)){
                        var_dump($CarsAll);
                        
                ?>
                
                       
                
                
                <?  
                        }
                    
                ?>
            </div>
            <!--<div class="promo-cargo-show-all"><a href="">Посмотреть все автомобили</a></div>-->
        </div>
    </div>


    <div class="central_block_flex_column_50">

        <div class="how_order_block">
            <div class="side_line_block">
                <div class="side_line_header">ЭТАПЫ АРЕНДЫ АВТОМОБИЛЯ</div>
                <div class="side_line_text">Процесс аренды автомобиля состоит из простых, понятных и прозрачных по своей сути шагов. Никаких сложностей.</div>
            </div>
            <div class="arenda_left_ul">
                <div>
                    <div class="slider_icon_yelow slider_icon_yelow_1"></div>
                    <div class="arenda_left_ul_heading">ЗАКАЗ</div>
                    <div class="arenda_left_ul_text">Вы оставляете заявку на автомобиль удобным для вас способом</div>
                </div>
                <div>
                    <div class="slider_icon_yelow slider_icon_yelow_2"></div>
                    <div class="arenda_left_ul_heading">УТОЧНЕНИЕ ДЕТАЛЕЙ</div>
                    <div class="arenda_left_ul_text">Мы с вами связываемся, уточняем все детали и пожелания, запрашиваем необходимые документы</div>
                </div>
                <div>
                    <div class="slider_icon_yelow slider_icon_yelow_3"></div>
                    <div class="arenda_left_ul_heading">ПРОВЕРКА ДОКУМЕНТОВ</div>
                    <div class="arenda_left_ul_text">Мы проверяем ваши документы, служба безопасности рассматривает переданные сведения</div>
                </div>
                <div>
                    <div class="slider_icon_yelow slider_icon_yelow_4"></div>
                    <div class="arenda_left_ul_heading">ПЕРЕДАЧА АВТОМОБИЛЯ</div>
                    <div class="arenda_left_ul_text">Вы забираете автомобиль согласно вашим пожеланиям</div>
                </div>

            </div>            
        </div>

        <div class="rewiews_block">
            <div class="side_line_block">
                <div class="side_line_header">ОТЗЫВЫ НАШИХ КЛИЕНТОВ</div>
            </div>

        </div>

        <div class="about_company_block">
            <div class="about_image">
               <img src="/img/maps_contacts.png">
            </div>
            <div class="about_text">
                <div class="about_text_heading">
                    О КОМПАНИИ<br>АВТОПРОКАТ БИ КАРС
                </div>
                <div class="about_text_wrap">
                    <p>Мы занимаемся прокатом автомобилей в Москве и Московской области с 2018 года. Мы знаем как для Вас важен хороший сервис. Поэтому аренда автомобилей в компании «Би Карс» — это просто и быстро, без лишних вопросов!</p>
                    <p>В нашем парке можно выбрать автомобиль из более чем 12 ведущих марок автомобилей – это просто и удобно. Мы заботимся о своих клиентах и стараемся предоставить им наилучший сервис и найти подход к каждому клиенту без исключения. Звоните и бронируйте прямо сейчас!</p>
                </div>
                <div class="about_text_buttons al_right">
                    <div class="defbuttons_wrap">
                        <a href="/o-kompanii" class="defbuttons">Подробнее</a>
                    </div>
                </div>
            </div>
        </div>
                        

    </div>

    
    
    
 

 






<div class="about-company">
    <div class="container">
        <div class="row" style="flex-direction:row;">
            <div class="service-details">
              
            </div>
            <div id="Lazy_Car_Htop" class="service-image LazyUpload"  data-src="/img/Htop.png" data-car="Htop">
                
            </div>
        </div>
    </div>
</div>







</div>



@stop