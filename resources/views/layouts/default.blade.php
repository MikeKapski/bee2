	<!--@inject('Menu', 'App\Http\Controllers\MenuController')-->
	
	@php /*$AllMenu = $Menu -> ReturnMenuAllCategoriesAndPositions();*/ @endphp


<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="yandex-verification" content="fbd1dd50fda03d38" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title>Автопрокат Bee-cars.ru - Посуточная аренда автомобилей в Москве</title>
		<meta name="keywords" content="аренда автомобилей, аренда автомобилей в Москве" />
		<meta name="description" content="Посуточная аренда автомобилей в Москве" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
		
		<!-- google font -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700,900&amp;subset=cyrillic&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
		
		<!-- yandex maps -->
		<link rel="preconnect" href="//api-maps.yandex.ru">
		<link rel="dns-prefetch" href="//api-maps.yandex.ru">
		
		<link rel="preconnect" href="//yastatic.net">
		<link rel="dns-prefetch" href="//yastatic.net">
		
		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
		<link rel="icon" type="image/svg+xml" href="/img/favicon/favicon.svg" />
		<link rel="shortcut icon" href="/img/favicon/favicon.ico" />
		<meta name="apple-mobile-web-app-title" content="BeeCars" />
		<link rel="manifest" href="/site.webmanifest">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
			
		<!-- main style -->
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		
			

	</head>
	<body>
		<!-- OrderPopUp -->
		<div class="PopUpWrapper">
			<div class="PopUpContainer">
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
                            <div class="YelowOrd FastOrder" data-carid="1">Забронировать</div>
                        </div>
                        <div class="car_booking_ur_text">
                            Нажимая на кнопку "Забронировать" вы даете согласие на обработку персональных данных а так же соглашатесь.
                            с <a href="/policy" target="_blank">Политикой Конфиденциальности</a> и с <a href="/uslovia-prokata" target="_blank">условиями аренды и правилами пользования автомобилями</a>
                        </div>
                </div>
				<div class="PopUpClose"></div>
			</div>
		</div>
		<div id='wrap_all' class="centrall_wrapper">	
			<!--header -->
			@include('sections.header')
			
				@yield('content')
			
			@include('sections.footer')
			
		</div>
   

		<!-- jquery  -->
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" id="ymap_lazy" async data-src="https://api-maps.yandex.ru/2.1/?&apikey=dd10c1e6-ca5c-4224-b946-6c3a4a5548a6&lang=ru_RU&load=package.standard"></script>
		<script defer src="/js/lightslider.min.js"></script>		
		<script defer src="/js/jquery.jscrollpane.min.js"></script>		
		<!--<script defer src="https://cdn.jsdelivr.net/npm/moment@2.29.1/locale/ru.js"></script>-->
		<script type="text/javascript" src="/js/script.js"></script>  
		
		@stack('scripts')	
		
		<!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();
           for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
           k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        
           ym(49189252, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/49189252" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
		<script src="https://myreviews.dev/widget/dist/index.js" defer></script>
		<script>
			(function (){
			var myReviewsInit = function () {
				new window.myReviews.BlockWidget({
				uuid: "f2682b01-bcde-4fd1-9cd7-9a0c4c83dc8d",
				name: "g98744146",
				additionalFrame:"none",
				lang:"ru",
				widgetId: "1"
				}).init();

			};
			if (document.readyState === "loading") {
			document.addEventListener('DOMContentLoaded', function () {
				myReviewsInit()
			})
			} else {
			myReviewsInit()
			}
			})()
		</script>
	</body>
</html>