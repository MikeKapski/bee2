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
		<link rel="shortcut icon" href="/favicon/favicon.ico" />
		<link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
		<link rel="manifest" href="/favicon/site.webmanifest">
		<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		
		
			
		<!-- main style -->
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="stylesheet" type="text/css" href="/css/kh.css" />

			

	</head>
	<body>
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
		<script type="text/javascript" src="/js/script.js"></script>  
		
		<script type="text/javascript" src="https://cloudpbx.beeline.ru/app/cabinet/app/pub/callmenow/mpbx-cmn-frame.js?externalId=6932bb12-76bd-4017-b0db-3c27d849a069-210720628&theme=2&color=3"></script>

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

	</body>
</html>