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
                        <div class="car_booking_button">
                            <div class="YelowOrd FastOrder"data-carid="{{ $CarID }}">Забронировать</div>
                        </div>
                        <div class="car_booking_ur_text">
                            Нажимая на кнопку "Забронировать" вы даете согласие на обработку персональных данных.
                            В соответствии с Политикой Конфиденциальности, а так же с условиями аренды и правилами пользования автомобилями
                        </div>
                    </div>