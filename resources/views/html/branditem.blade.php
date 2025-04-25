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
                    <h1 class="carsingle_h1"><span>Автомобили марки</span> {{ $BrandName }}</h1>        
                    <div class="cars-on-mainpage-wrapper">
                        @isset($BrandCars)
                            @foreach ($BrandCars as $car)

                            @include('components.site.maincarcard', [
                                'CarID'       => $car['ID'],
                                'CarName'     => $car['Name'],
                                'CarImage'    => $car['CarImage'],
                                'PageUrl'     => $car['PageUrl'],
                                'OrderAction' => $OrderAction,
                                'Price_1'     => $car['Price_1'],
                                'Price_2'     => $car['Price_2'],
                                'Price_3'     => $car['Price_3'],
                                'Price_4'     => $car['Price_4']
                            ])

                            @endforeach
                        @endisset
                    </div>
                    <!--<div class="promo-cargo-show-all"><a href="">Посмотреть все автомобили</a></div>-->
                </div>    

                @if(!empty($SimilarCars))
                <div class="carsingle_screen">
                    <div class="carsingle_screen_full">
                        <h2 class="yeloow_header_h2">Похожие предложения</h2>
                        <div class="similar_wrap">
                        @isset($SimilarCars)
                            @foreach ($SimilarCars as $car)

                            @include('components.site.maincarcard', [
                                'CarID'       => $car['ID'],
                                'CarName'     => $car['Name'],
                                'CarImage'    => $car['CarImage'],
                                'PageUrl'     => $car['PageUrl'],
                                'OrderAction' => $OrderAction,
                                'Price_1'     => $car['Price_1'],
                                'Price_2'     => $car['Price_2'],
                                'Price_3'     => $car['Price_3'],
                                'Price_4'     => $car['Price_4']
                            ])

                            @endforeach
                        @endisset
                        </div>
                    </div>
                </div>
                @endif
						
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