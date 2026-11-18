<div class="fast_car_booking">
    <div class="car_booking_header">Заказ Автомобиля</div>
                        
    <div class="car_booking_name">
        <label>Имя</label>
        <input class="InputOnWhiteTextaR OrderNameFast" id="OrderNameFast" type="text">
        <div class="InputOnWhiteTextaRError">Необходимо заполнить поле</div>
    </div>
                        <div class="car_booking_phone">
                            <label>Телефон</label>
                            <input class="InputOnWhiteTextaR OrderPhoneFast" id="OrderPhoneFast" placeholder="+7 (xxx) xxx-xx-xx" type="text">
                            <div class="InputOnWhiteTextaRError">Необходимо заполнить поле</div>
                        </div>
                        @include('components.site.bookingconsent')
                        <div class="car_booking_button">
                            <button type="button" class="YelowOrd FastOrder" data-carid="{{ $CarID }}" disabled>Забронировать</button>
                        </div>
                    </div>
