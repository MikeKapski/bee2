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
						<h1>Контакты</h1>
					</div>       

                    <div class="contacts_page">
                        <div class="contacts_page_image">
                            <img src="/img/maps_contatc2.png">
                        </div>
                        <div class="contacts_page_text">
                            <div class="contacts_item_working">Мы работаем с 10:00 до 22:00  без выходных</div>
                            <div class="contacts_item_working_text">
                                <span>Москва</span><br>
                                Нежинская дом 5 строение 1<br>
                                Первый этаж, офис 1<br>
                                метро Славянский Бульвар<br>
                                метро Минская
                            </div>
                        </div>    
                    </div>

                    <div class="black_header">
						<h2>Доставим автомобиль по любому адресу в Москве</h2>
					</div>
                    <div class="black_text">
                        Би-карс Прокат автомобилей в Москве. Все наши офисы расположены в легкодоступных местах и очень удобны для любого клиента! Аренда авто без водителя возможна на срок от 1 суток. Взять машину напрокат вы сможете по 2 документам (паспорт и права). Аренда машины в Москве возможна так же с водителем на срок от 3 часов. При желании мы доставим авто по любому адресу в Москве, в аэропорт или на вокзал.
                    </div>

                    <div class="defbuttons_wrap padd_20_10">
                        <a href="/" class="defbuttons">Перейти к выбору авто</a>
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