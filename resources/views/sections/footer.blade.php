@inject('Detect', 'App\Http\Controllers\DetectController')
	
	<footer class="bee-footer">

        <div class="footer_top padd_20_135">
            <div class="footer_adress">
                <div class="footer_header">Адрес</div>
                <div class="footer_text">
                    Москва<br>
                    Нежинская дом 5 строение 1<br>
                    Офис 72 (2-й этаж)<br>
                    метро Славянский Бульвар<br>
                    метро Минская
                </div>
                <iframe src="https://yandex.ru/sprav/widget/rating-badge/210792012207" width="150" height="50" frameborder="0"></iframe>
            </div>
            <div class="footer_phone">
                <div class="footer_header">Телефон</div>
                <div class="footer_header">Почта</div>
            </div>
            <div class="footer_time">
                <div class="footer_header">Время работы офиса</div>
                <div class="footer_text padd_b_20">Ежедневно с 10:00 до 23:00</div>
                <div class="footer_header">Техническая поддержка</div>
                <div class="footer_text">Круглосуточно</div>
            </div>
            <div class="footer_line">4</div>
        </div>
        <div class="footer_bottom padd_20_135">
            2
        </div>
    </footer>

		<div class="row-100">
			<div class="footer_top_line">
				
				<div class="footer-top-line-pos">
					<div class="ftlp-icon"></div>
					<div class="ftlp-text">
						<div class="ftlp-heading">Телефон</div>
						<div class="ftlp-text">
							<a href="tel:+74957903633" alt="Телефон проката автомобилей Би Карс">+7 (495) 790-36-33</a>
						</div>
					</div>
				</div>
				<div class="footer-top-line-pos">
					<div class="ftlp-icon"></div>
					<div class="ftlp-text">
						<div class="ftlp-heading">Почта</div>
						<div class="ftlp-text">
							<a href="mailto:info@obee-cars.ru" alt="Почта проката автомобилей Би Карс">info@bee-cars.ru</a>
						</div>
					</div>
				</div>
			</div>	
			<div class="footer_wrap">
				<? if (!$Detect->isMobile() && !$Detect->isTablet()) { ?>
				<div class="footer_left">
					<div class="footer_row_1">
						<div class="tg-description">
							
						</div>
						
					</div>
					
					
					
				</div>
				<? } ?>
				<div class="footer_right mobilehide">
					<div class="footer-callme">
						<div class="footer-callme-heading">
							<h3>Перезвоните мне!</h3>
						</div>
						<div class="footer-description">
							<p>Если у вас остались вопросы по нашему сервису.<br>Оставьте ваш телефон и мы вам перезвоним в кратчайшее время</p>
						</div>
						<div class="form-group">
							<div class="field-row"> 
								<input type="text" class="footer-input" id="callme2_phone" placeholder="+7 (xxx) xxx-xx-xx" required="required">
								<div class="form-error" id="callme2_phone_error">Необходимо заполнить поле</div>
								<div class="form-succs" id="callme2_phone_succs">Сообщение успешно отправлено</div>
							</div>
						</div>
						<div class="Mini_cube_button FooterButton">Отправить</div>
					</div>
				</div>	
			</div>
			<div class="copyright">© <?php echo date('Y'); ?> bee-cars.ru г. Москва, ул. Нежинская 5 стр. 1, оф. 72, м. Славянский Бульвар/Минская. Телефон: +7 (495) 790-36-33</div>
		</div>
	</footer>