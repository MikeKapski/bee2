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
                
                
               
               
            </ul>
        </div>
    </div>
    @php } @endphp	
        
    @php if ($Detect->isMobile() || $Detect->isTablet()) { @endphp
        
    <div class="index_top_block_mobile">
       
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