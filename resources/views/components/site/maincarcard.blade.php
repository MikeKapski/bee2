<div class="main-car-card">
    <div class="main-car-card-content">
        <div class="row-100 FastIMage">
            <div id="Lazy_Car_{{ $CarID }}" class="LazyUpload" data-car="{{ $CarID }}" data-src="{{ $CarImage }}" data-href="{{ $PageUrl }}">
                <img src="/img/car_sl.png" />
            </div>
        </div>

        <div class="row-100">
            <h2><a href="{{ $PageUrl }}">{{ $CarName }}</a></h2>
        </div>
        <div id="CarDays_{{ $CarID }}" class="main-cars-days" data-carid="{{ $CarID }}">
            <div class="button-days-cols">Количество дней от:</div>
            <ul>
                <li data-price-value="{{ $Price_1 }}">1</li>
                <li data-price-value="{{ $Price_2 }}">5</li>
                <li data-price-value="{{ $Price_3 }}">10</li>
                <li class="active-car-card" data-price-value="{{ $Price_4 }}">30</li>
            </ul>
        </div>
        <div class="row-100 main-car-card-order-price">
            <div id="CarPrice_{{ $CarID }}" class="button-fast-order-price">
                от <span>{{ $Price_4 }} &#8381;</span> в сутки
            </div>
        </div>
        <div class="row-100 main-car-card-order-but">
            <div class="button-fast-order-but {{ $OrderAction }}" data-carid="{{ $CarID }}" data-href="{{ $PageUrl }}">
                Заказать в 1 клик
            </div>
        </div>
    </div>
</div>
