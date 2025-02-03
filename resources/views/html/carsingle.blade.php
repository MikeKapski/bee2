@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.default')

@section('content')

    <div class="defaultpage padd_0_135">
        <div class="htmlpageblock padd_0_135">

            <div class="Breadrumps">
                {!! $BreadCrumps !!}
            </div> 
            
            <div class="carsingle_screen">
                <div class="carsingle_screen_left">
                    <img src="{{ $CarInfo['CarImage'] }}"/>
                </div>
                <div class="carsingle_screen_right">
                    <h1 class="carsingle_h1"><span>Аренда</span> {{ $CarInfo['Name'] }}</h1>
                    <div class="carsingle_text">
                        {{ $CarInfo['CarTextShort'] }}
                    </div>
                    <div class="car_booking">
                        <div class="car_booking_header">Мой заказ</div>
                        <div class="car_booking_dates">
                            <div class="car_booking_dates_item">
                                <label>Дата начала</label>
                                <input class="InputOnWhiteTextaR" type="text" id="DaysCalendarStart">
                            </div>
                            <div class="car_booking_dates_item">
                                <label>Дата окончания</label>
                                <input class="InputOnWhiteTextaR" type="text" id="DaysCalendarFinish">
                            </div>
                        </div>
                        <div class="car_booking_name">
                            <label>Имя</label>
                            <input class="InputOnWhiteTextaR" id="OrderName" type="text">
                        </div>
                        <div class="car_booking_phone">
                            <label>Телефон</label>
                            <input class="InputOnWhiteTextaR" id="OrderPhone" placeholder="+7 (xxx) xxx-xx-xx" type="text">
                        </div>
                        <div class="car_booking_options">

                        </div>
                        <div class="car_booking_detail">

                        </div>
                        <div class="car_booking_button">
                            <div class="YelowOrd FastOrderSingle" data-pod="2" data-carid="{{ $CarInfo['ID'] }}">Забронировать</div>
                        </div>
                        <div class="car_booking_ur_text">
                            Нажимая на кнопку "Забронировать" вы даете согласие на обработку персональных данных.
                            В соответствии с Политикой Конфиденциальности, а так же с условиями аренды и правилами пользования автомобилями
                        </div>
                    </div>
                </div>
            </div>

            <div class="carsingle_screen">
                <div class="carsingle_screen_left">
                    <h2 class="yeloow_header_h2">Технические характеристики</h2>
                    <div class="car_advantage">
                        <div class="car_advantage_heading">
                            <div>Комплектация</div>
                            <div>Размеры</div>
                            <div>Расход топлива</div>
                            <div>Двигатель</div>
                        </div>
                        <div class="car_advantage_values">
                            <div>
                                @foreach($CarInfo['CarAdvantageSite'] as $advantage)
                                    @if($advantage->car_advantage->GroupID == 6)
                                        <div class="info-listitem-li">
											{{$advantage->car_advantage->Name}}
                                            @if(!empty($advantage->AdvantageValue)) 
												<span>{!! $advantage->AdvantageValue !!}</span>
											@endif
										</div>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                @foreach($CarInfo['CarAdvantageSite'] as $advantage)
                                    @if($advantage->car_advantage->GroupID == 5)
                                        <div class="info-listitem-li">
											{{$advantage->car_advantage->Name}}
                                            @if(!empty($advantage->AdvantageValue)) 
												<span>{!! $advantage->AdvantageValue !!}</span>
											@endif
										</div>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                @foreach($CarInfo['CarAdvantageSite'] as $advantage)
                                    @if($advantage->car_advantage->GroupID == 4)
                                        <div class="info-listitem-li">
											{{$advantage->car_advantage->Name}}
                                            @if(!empty($advantage->AdvantageValue)) 
												<span>{!! $advantage->AdvantageValue !!}</span>
											@endif
										</div>
                                    @endif
                                @endforeach
                            </div>
                            <div>
                                @foreach($CarInfo['CarAdvantageSite'] as $advantage)
                                    @if($advantage->car_advantage->GroupID == 1)
                                        <div class="info-listitem-li">
											{{$advantage->car_advantage->Name}}
                                            @if(!empty($advantage->AdvantageValue)) 
												<span>{!! $advantage->AdvantageValue !!}</span>
											@endif
										</div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carsingle_screen_right">
                    
                </div>
            </div>

            <div class="carsingle_screen">
                <div class="carsingle_screen_full">
                    <h2 class="yeloow_header_h2">Похожие предложения</h2>
                </div>
            </div>
        
        </div>
    
    </div>
      
@stop