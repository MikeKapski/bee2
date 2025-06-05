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
					<div class="yeloow_header">
						<h1>Условия проката автомобилей</h1>
					</div>
					<h2 class="yeloow_header_h2">Требования к арендатору</h2>
					<div class="uslovia-content-row-list">
						<div>Минимальный возраст — 23 года</div>
						<div>Водительский стаж — не менее 3 лет</div>
						<div>Наличие постоянной регистрации</div>
					</div>

					<h3 class="yeloow_header_h3">Для физических лиц</h3>
					<div class="uslovia-content-row-list">
						<div>Общегражданский паспорт</div>
						<div>Водительское удостоверение</div>
						<div>Любой из перечисленных документов (по запросу менеджера): военный билет, загранпаспорт, кредитная или дебетовая карта, пенсионное удостоверение, страховое свидетельство ОМС.</div>
						<div>Подача автомобиля осуществляется Бесплатно в пределах МКАД, при оплате аренды авто за 4 дня и более.</div>
					</div>

					<h3 class="yeloow_header_h3">Для юридических лиц</h3>
					<div class="uslovia-content-row-list">
						<div>Карточка основных сведений о предприятии с указанием фактического адреса</div>
						<div>Копия свидетельства о регистрации</div>
						<div>Копия свидетельства о постановке на налоговый учет</div>
						<div>Копия решения участников/протокол об избрании (назначении) генерального директора</div>
						<div>Копия приказа о вступлении в должность генерального директора</div>
						<div>Доверенность от организации на право подписания договоров аренды и актов приема-передачи автомобиля, заверенная печатью предприятия и подписью генерального директора.</div>
						<div>Паспорт доверенного лица (возраст не менее 23-х лет)</div>
						<div>Водительское удостоверение (стаж не менее 3-х лет)</div>
					</div>

					<div class="ahtung_box">
						<div class="uslovia-note">* Копии документов должны быть заверены печатью предприятия и подписью генерального директора.</div>
						<div class="uslovia-note">* Документы отправлять на адрес электронной почты <a href="mailto:info@bee-cars.ru">info@bee-cars.ru</a></div>
					</div>


					<div class="yeloow_header">
						<h1>Условия аренды</h1>
					</div>

					<h3 class="yeloow_header_h3">Срок аренды</h3>
					<div class="uslovia-content-row-list">
						<div>Минимальный срок аренды автомобиля 1 сутки с момента выдачи автомобиля</div>
					</div>

					<h3 class="yeloow_header_h3">Состояние автомобиля</h3>
					<div class="uslovia-content-row-list">
						<div>Автомобиль выдаётся чистым и заправленным</div>
						<div>Арендатор обязан вернуть автомобиль в том же виде и с тем же количеством бензина в баке.</div>
					</div>

					<h3 class="yeloow_header_h3">Территория эксплуатации</h3>
					<div class="uslovia-content-row-list">
						<div>Автомобиль эксплуатируется на территории Москвы и Московской области</div>
						<div>По всей России - по согласованию с менеджером</div>
						<div>Выезд за пределы РФ - запрещен</div>
					</div>

					<h3 class="yeloow_header_h3">Суточный пробег</h3>
					<div class="uslovia-content-row-list">
						<div class="uslovia-price">Лимит суточного пробега - <span>250</span> км.</div>
						<div class="uslovia-price">Превышение установленного лимита оплачивается Арендатором из расчета <span>10</span> руб/км.</div>
					</div>
						
					<h3 class="yeloow_header_h3">Дополнительные водители</h3>
					<div class="uslovia-content-row-list">
							<div class="uslovia-price">Оформляются бесплатно при наличии соответствующих документов</div>
					</div>
						
					<h3 class="yeloow_header_h3">Факт нанесения ущерба</h3>
					<div class="uslovia-content-row-list">
						<div class="uslovia-price">Отсутствие справок из уполномоченных органов о факте нанесения ущерба имуществу Арендодателя — полное возмещение ущерба, согласно калькуляции Арендодателя</div>
					</div>
						
					<h3 class="yeloow_header_h3">Дополнительные расходы</h3>
					<div class="uslovia-content-row-list">
						<div class="uslovia-price">Топливо оплачивается из расчета <span>90</span> рублей за литр*</div>
						<div class="uslovia-price">Мойка автомобиля — <span>от 1600</span> рублей</div>
						<div class="uslovia-price">Химчистка — <span>2500</span> рублей/ одна деталь салона</div>
						<div class="uslovia-price">Комиссия за оплату штрафов нашими менеджерами <span>50</span> руб.</div>
						<div class="uslovia-note">* При отличии уровня топлива в баке в меншую сторону чем при получении автомобиля</div>
					</div>

					<div class="yeloow_header">
						<h1>Оплата</h1>
					</div>

					<h3 class="yeloow_header_h3">Оплата</h3>
					<div class="uslovia-content-row-list">
						<div>Оплата производится за весь период аренды автомобиля</div>
						<div>В случае задержки возврата автомобиля более чем на 1.5 час, Арендатор должен оплатить стоимость половины суток аренды, из расчёта 50% от действующего суточного тарифа.</div>
					</div>
					
					<h3 class="yeloow_header_h3">Форма оплаты</h3>
					<div class="uslovia-content-row-list">
						<div>Наличные</div>
						<div>Банковский перевод</div>
						<div>Пластиковые карты</div>
						<div>Возможна оплата картой вне офиса</div>
					</div>
						
					<h3 class="yeloow_header_h3">Включено в стоимость</h3>
					<div class="uslovia-content-row-list">
						<div>Страховка</div>
						<div>Техническое обслуживание автомобиля</div>
					</div>
						
					<h3 class="yeloow_header_h3">Не включено в стоимость</h3>
					<div class="uslovia-content-row-list">
						<div>Бензин</div>
						<div>Оплата платных стоянок</div>
						<div>Оплата платных дорог</div>
						<div>Оплата штрафов</div>
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