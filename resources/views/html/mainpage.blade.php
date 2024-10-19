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
    <div class="index_top_block padd_0_135">
        <div class="slider">
            <ul id="lightSlider">
                <li>
                    <div class="slide_wrap">
                        <div class="slide_container">
                            <div class="slide_text_wrap" style="align-items:center;justify-content:center;">
                                <div class="slider_logo"></div>
                                <div class="slider_heading sh_left">«Би Карс - сделай поездку лучше!»</div>
                                <div class="button-fast-order-but m-top50" id="ShowVideo" data-video="stoped">
                                    Посмотреть промо
                                </div>
                            </div>
                            <div class="slider_one_car slider_one_car85">
                                <div id="Lazy_Car_SliderCar99" class="LazyUpload ToggleCars" data-src="/img/promo/mainpage/bee.png" data-car="SliderCar99">
                            
                                </div>
                                <div id="PromoVideo">
                                    <video width="400" height="300" controls="controls" poster="/Logo.svg">
                                       <source src="/car_rental.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                                       Тег video не поддерживается вашим браузером. 
                                       <a href="/car_rental.mp4">Скачайте видео</a>.
                                    </video>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide_wrap">
                        <div class="slide_container">
                            <div class="slide_text_wrap">
                                <div class="slider_heading sh_left">Новинка автопарка<br><span>Volkswagen Tiguan</span></div>
                                <div class="slider_text sh_left">
                                    <div class="slider_text_content">
                                        Новый городской компактный автомобиль немецкого производителя<br>
                                        Светодиодные фары, рейлинги на крыше и  маленький расход топлива порадуют вас<br>
                                        За дополнительную плату доступен бокс на крышу автомобиля
                                    </div>
                                    <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow" data-href="/park-avto/volkswagen-tiguan">
                                        Заказать
                                    </div>
                                </div>
                            </div>
                            <div class="slider_one_car">
                                <div id="Lazy_Car_SliderCar1" class="LazyUpload" data-src="/img/promo/tiguan/tiguan.png" data-car="SliderCar1">
                            
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide_wrap">
                        <div class="slide_container">
                            <div class="slider_one_car">
                                <div id="Lazy_Car_SliderCar3" class="" data-src="/img/slider/lagrus.png" data-car="SliderCar3">
                                    <img src="/img/slider/lagrus.png">
                                </div>
                            </div>
                            <div class="slide_text_wrap">
                                <div class="slider_heading sh_right">Дачное приключение<br><span>LADA Largus</span></div>
                                <div class="slider_text sh_right">
                                    <div class="slider_text_content">
                                        Отличное бюджетное решение как для поездок на дачу, так и на море<br>
                                        Неприхотливый автомобиль с небольшим расходом топлива<br>
                                        Доступен в варианте на 7 мест, так и в грузовой версии
                                    </div>
                                    <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow" data-href="/park-avto/lada_largus">
                                        Заказать
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide_wrap">
                        <div class="slide_container">
                            <div class="slide_text_wrap">
                                <div class="slider_heading sh_left">Спец предложение на <br><span>Эконом-класс</span></div>
                                <div class="slider_text sh_left">
                                    <div class="slider_text_content">
                                        При любом заказе автомобиля эконом<br> класса через форму заказа на нашем сайте Вы получаете скидку 5%.


                                    </div>
                                    <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow" data-href="/park-avto/hyundai-solaris-ii">
                                        Заказать
                                    </div>
                                </div>
                            </div>
                            <div class="slider_one_car">
                                <div id="Lazy_Car_SliderCar4" class="LazyUpload" data-src="/img/slider/solaris-slider.png" data-car="SliderCar4">
                                    <img src="/img/slider/solaris-slider.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        
    
        </div>
        <!--<div class="slider" id="mainpageslider">
            <ul class="slider_wrapper" >
                <li class="slide">   
                    <div class="slide_wrap">
                        <div class="slider_heading sh_left">Новинка автопарка - <span>KIA Soul</span></div>
                        <div class="slider_text sh_left">
                            <div class="slider_text_content">
                                Новый городской компактный автомобиль корейского производителя<br>
                                Светодиодные фары, рейлинги на крыше и  маленький расход топлива порадуют вас<br>
                                За дополнительную плату доступен бокс на крышу автомобиля
                            </div>
                            <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow">
                                Заказать
                            </div>
                        </div>
                        <div class="slider_one_car"></div>
                    </div>
                </li>
                <li class="slide">   
                    <div class="slide_wrap">
                        <div class="slider_heading sh_left">Летнее настроение - <span>кабриолет в аренду</span></div>
                        <div class="slider_text sh_left">
                            <div class="slider_text_content">
                                Хочется попробовать чего-то нового и необычного?<br>
                                Американский автомобиль, классика в современном прочтении<br>
                                Идеальное предложение для летнего вечера<br>
                            </div>
                            <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow">
                                Заказать
                            </div>
                        </div>
                        <div class="slider_three_car"></div>
                    </div>
                </li>
                <li class="slide">   
                    <div class="slide_wrap">
                        <div class="slider_heading sh_right">Дачное приключение - <span>LADA Largus</span></div>
                        <div class="slider_text sh_right">
                            <div class="slider_text_content">
                                Отличное бюджетное решение как для поездок на дачу, так и на море<br>
                                Неприхотливый автомобиль с небольшим расходом топлива<br>
                                Доступен в варианте на 7 мест, так и в грузовой версии
                            </div>
                            <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow">
                                Заказать
                            </div>
                        </div>
                        <div class="slider_two_car"></div>
                    </div>
                </li>
                
            </ul>
        </div>-->
    </div>
    @php } @endphp	
        
    @php if ($Detect->isMobile() || $Detect->isTablet()) { @endphp
        
    <div class="index_top_block_mobile">
        <div class="slider" id="mainpageslider">
            <ul class="slider_wrapper" id="lightSlider">
                <li class="slide">   
                    <div class="slide_wrap_mobile">
                        <div class="slider_heading_mobile">Новинка автопарка<div class="slider_heading_mobile_carname"><a href="/park-avto/volkswagen-tiguan">Volkswagen Tiguan</a></div></div>
                        <div class="slider_text_mobile">
                            <div class="slider_text_content">
                                Новый городской компактный автомобиль немецкого производителя<br>
                                Светодиодные фары, рейлинги на крыше и  маленький расход топлива порадуют вас<br>
                                За дополнительную плату доступен бокс на крышу автомобиля
                            </div>
                            <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow" data-href="/park-avto/volkswagen-tiguan">
                                Заказать
                            </div>
                        </div>
                        <div id="Lazy_Car_SliderCar30" class="LazyUpload MObileCars" data-src="/img/promo/tiguan/tiguan_mobile.png" data-car="SliderCar30">
                            
                                </div>
                    </div>
                </li>
                <li class="slide">   
                    <div class="slide_wrap_mobile">
                        <div class="slider_heading_mobile">Дачное приключение<div class="slider_heading_mobile_carname"><a href="">LADA Largus</a></div></div>
                        <div class="slider_text_mobile">
                            <div class="slider_text_content">
                                Отличное бюджетное решение как для поездок на дачу, так и на море<br>
                                Неприхотливый автомобиль с небольшим расходом топлива<br>
                                Доступен в варианте на 7 мест, так и в грузовой версии
                            </div>
                            <div class="button-fast-order-but OrderCarSlide" data-show="OrderCarSlideShow" data-href="/park-avto/lada_largus">
                                Заказать
                            </div>
                        </div>
                            <div id="Lazy_Car_SliderCar355" class="LazyUpload MObileCars" data-src="/img/promo/largus/largus_mobile.png" data-car="SliderCar355">
                            <img src="/img/promo/largus/largus_mobile.png">
                                </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @php } @endphp

    <div class="central_block">

        <div class="left_block_content">
            1234344
        </div>

        <div class="cars-on-mainpage">
            
            <div class="cars-on-mainpage-wrapper">
                @isset($CarsAll)
                    @foreach ($CarsAll as $car)
                    <div class="main-car-card">
                            <div class="main-car-card-sidecolor"></div>
                            <div class="main-car-card-content">
                                <div class="row-100">
									<h2><a href="{{ $car['PageUrl'] }}">{{ $car['Name'] }}</a></h2>
                                </div>
                                <div class="row-100 FastIMage">
									<div id="Lazy_Car_{{ $car['ID'] }}" class="LazyUpload" data-car="{{ $car['ID'] }}" data-src="" data-href="{{ $car['PageUrl'] }}">
										<img src="/img/car_sl.png" >
									</div>
									<div class="main-cars-tech">
										<ul>
											<li>Автомат</li>
											<li>5 мест</li>
											<li>Кондиционер</li>
										</ul>
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

    </div>
    
    
 

 






<div class="about-company">
    <div class="container">
        <div class="row" style="flex-direction:row;">
            <div class="service-details">
                <h2>О КОМПАНИИ</h2>
                <h2><span>АВТОПРОКАТ</span> БИ КАРС</h2>
                <p>Мы занимаемся прокатом автомобилей в Москве и Московской области уже более 3-х лет. Мы знаем как для Вас важен хороший сервис. Поэтому аренда автомобилей в компании «Би Карс» — это просто и быстро, без лишних вопросов! </p>
                <p>Прокат машин без залога в «Би Карс» – это просто и удобно. Мы заботимся о своих клиентах и стараемся предоставить им наилучший сервис и найти подход к каждому клиенту без исключения.</p>
                <a href="/o-kompanii" class="btn-black-white-background">Подробнее</a>
            </div>
            <div id="Lazy_Car_Htop" class="service-image LazyUpload"  data-src="/img/Htop.png" data-car="Htop">
                
            </div>
        </div>
    </div>
</div>







</div>



@stop