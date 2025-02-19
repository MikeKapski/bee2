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
                            <div class="InputOnWhiteTextaRError">Необходимо заполнить поле</div>
                        </div>
                        <div class="car_booking_phone">
                            <label>Телефон</label>
                            <input class="InputOnWhiteTextaR" id="OrderPhone" placeholder="+7 (xxx) xxx-xx-xx" type="text">
                            <div class="InputOnWhiteTextaRError">Необходимо заполнить поле</div>
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
                    <div class="tabs_mini_wrapper">
                        <div class="tabs_btn_container">
                            <button class="button live" data-id="tab1">Стоимость аренды</button>
                            <button class="button" data-id="tab2">Условия аренды</button>
                        </div>
                        <div class="tabs-content">
                            <div class="content live" id="tab1">
                                <div class="car_prices">
                                    <div class="car_day">
                                        <div class="car_day_head">1-2 дня</div>
                                        <div class="car_day_kmlimit">250 км. пробега включено</div>
                                        <div class="car_day_price">{{ $CarInfo['Price_1'] }} &#8381;</div>
                                    </div>
                                    <div class="car_day">
                                        <div class="car_day_head">+5 дней</div>
                                        <div class="car_day_kmlimit">1250 км. пробега включено</div>
                                        <div class="car_day_price">{{ $CarInfo['Price_2'] }} &#8381;</div>
                                    </div>
                                    <div class="car_day">
                                        <div class="car_day_head">+10 дней</div>
                                        <div class="car_day_kmlimit">2500 км. пробега включено</div>
                                        <div class="car_day_price">{{ $CarInfo['Price_3'] }} &#8381;</div>
                                    </div>
                                    <div class="car_day">
                                        <div class="car_day_head">+30 дней</div>
                                        <div class="car_day_kmlimit">7500 км. пробега включено</div>
                                        <div class="car_day_price">{{ $CarInfo['Price_4'] }} &#8381;</div>
                                    </div>
                                </div>
                            </div>
                            <div class="content" id="tab2">
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
                        </div>
                    </div>
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