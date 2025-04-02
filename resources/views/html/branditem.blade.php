@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.default')

@section('content')

@php
    $OrderAction = "FastDesctop";
@endphp

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
					
                <div class="cars-on-mainpage">
                    <h1 class="carsingle_h1"><span>Автомобили марки</span> </h1>        
                    <div class="cars-on-mainpage-wrapper">
                        @isset($BrandCars)
                            @foreach ($BrandCars as $car)
                            <div class="main-car-card">
                                    <div class="main-car-card-content">
                                        <div class="row-100 FastIMage">
                                            <div id="Lazy_Car_{{ $car['ID'] }}" class="LazyUpload" data-car="{{ $car['ID'] }}" data-src="{{ $car['CarImage'] }}" data-href="{{ $car['PageUrl'] }}">
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
                    </div>
                    <!--<div class="promo-cargo-show-all"><a href="">Посмотреть все автомобили</a></div>-->
                </div>    

                <div class="carsingle_screen">
                    <div class="carsingle_screen_full">
                        <h2 class="yeloow_header_h2">Похожие предложения</h2>
                        <div class="similar_wrap">
                        @isset($SimilarCars)
                            @foreach ($SimilarCars as $car)
                            <div class="main-car-card">
                                    <div class="main-car-card-content">
                                        <div class="row-100 FastIMage">
                                            <div id="Lazy_Car_{{ $car['ID'] }}" class="LazyUpload" data-car="{{ $car['ID'] }}" data-src="{{ $car['CarImage'] }}" data-href="{{ $car['PageUrl'] }}">
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