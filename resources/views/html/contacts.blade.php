@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.default')

@section('content')

    <div class="defaultpage padd_0_135">
        <div class="htmlpageblock">

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
                        <div class="contacts_page_image hidemobile">
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
                            <div class="mess_block phone_icon">
                                <a href="tel:+74957903633" alt="Прокат автомобилей bee-cars.ru">+7 (495) 790-36-33</a>
                                <div class="phone_block">Единый многоканальный:</div>
                            </div>
                            <div class="mess_block whatsapp_icon">
                                <a href="https://wa.me/74957903633">WhatsApp</a>
                            </div>
                            <div class="mess_block telegram_icon">
                                <a href="https://t.me/beecars1">Telegram</a>
                            </div>
                            <div class="mess_block email_call">
                                <a href="mailto:info@bee-cars.ru">info@bee-cars.ru</a>
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
                    
                    <div class="black_header">
						<h2>Реквизиты компаний</h2>
					</div>
					
					<div class="black_text">
                        Карточка предприятия
                        <div class="table_2_column">
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Полное Наименование</div>
                                <div class="table_2_column_value">Общество с ограниченной ответственностью «БИ КАРС»</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Сокращенное наименование</div>
                                <div class="table_2_column_value">ООО «БИ КАРС»</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Юридический адрес</div>
                                <div class="table_2_column_value">119501, Россия, г. Москва, Нежинская ул., дом 5, стр. 1, помещение 72</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Почтовый адрес</div>
                                <div class="table_2_column_value">119501, Россия, г. Москва, Нежинская ул., дом 5, стр. 1, помещение 72</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Телефон/факс</div>
                                <div class="table_2_column_value">+7 (495) 790 36 33<br>+7 (968) 688 14 76</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">ИНН/КПП</div>
                                <div class="table_2_column_value">9731003518/772901001 </div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">ОГРН</div>
                                <div class="table_2_column_value">1187746539100</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Расчётный счет</div>
                                <div class="table_2_column_value">40702 810 0 3800 0191386</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Корреспондентский счет</div>
                                <div class="table_2_column_value">30101 810 4 0000 0000225</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">БИК банка</div>
                                <div class="table_2_column_value">044525225</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Банк</div>
                                <div class="table_2_column_value">ПАО Сбербанк</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Отделение Банка</div>
                                <div class="table_2_column_value">г. Москва, ул. Никулинская, 25</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Директор</div>
                                <div class="table_2_column_value">Вергазова Татьяна Александровна.<br>Действует на основании Устава</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Система налогообложения</div>
                                <div class="table_2_column_value">Упрощённая. Не являемся плательщиком НДС.</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Веб-сайт</div>
                                <div class="table_2_column_value">www.bee-cars.ru</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">E-mail</div>
                                <div class="table_2_column_value">info@bee-cars.ru</div>
                            </div>
                        
                        </div>
                        
                        Карточка предприятия
                        <div class="table_2_column">
                            
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Полное Наименование</div>
                                <div class="table_2_column_value">Индивидуальный предприниматель<br>Вергазов Сергей Сергеевич</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Сокращенное наименование</div>
                                <div class="table_2_column_value">ИП Вергазов С. С.</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Юридический адрес </div>
                                <div class="table_2_column_value">143083, Россия, Московская обл., г. Одинцово, пос. Барвиха, д. 28, кв. 46</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Почтовый адрес</div>
                                <div class="table_2_column_value">119501, Россия, г. Москва, Нежинская ул., дом 5, стр. 1, помещение 2</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Телефон/факс</div>
                                <div class="table_2_column_value">+79096300051</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">ИНН</div>
                                <div class="table_2_column_value">772983540938</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">ОГРНИП</div>
                                <div class="table_2_column_value">321508100016331</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">ОКПО</div>
                                <div class="table_2_column_value">2005005398</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Расчётный счет</div>
                                <div class="table_2_column_value">40802810100001804344</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Корреспондентский счет</div>
                                <div class="table_2_column_value">30101810145250000974</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">БИК банка</div>
                                <div class="table_2_column_value">044525974</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Банк</div>
                                <div class="table_2_column_value">АО «Тинькофф Банк»</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Отделение Банка</div>
                                <div class="table_2_column_value">Москва, 123060, 1-й Волоколамский проезд, д. 10, стр. 1</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">Директор</div>
                                <div class="table_2_column_value">Вергазов Сергей Сергеевич</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">E-mail</div>
                                <div class="table_2_column_value">S6300051@yandex.ru</div>
                            </div>
                            <div class="table_2_column_row">
                                <div class="table_2_column_head">СБИС Идентификатор ЭДО</div>
                                <div class="table_2_column_value">2BE98ffd5bcf162490c97d736fb096fc158</div>
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