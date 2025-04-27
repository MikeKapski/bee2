	<!--@inject('Menu', 'App\Http\Controllers\MenuController')-->
	
	@php /*$AllMenu = $Menu -> ReturnMenuAllCategoriesAndPositions();*/ @endphp


<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="yandex-verification" content="fbd1dd50fda03d38" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<title>Автопрокат Bee-cars.ru - Админка</title>
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
        <link rel="stylesheet" type="text/css" href="/css/cms.css" />
		
			

	</head>
	<body>
		<div id='wrap_all' class="centrall_wrapper">	
			
			@yield('content')
			
		</div>
   

		<!-- jquery  -->
		<script type="text/javascript" src="/js/jquery.min.js"></script>
		<script type="text/javascript" src="/js/cms.js"></script>  
		
		@stack('scripts')	
		

	</body>
</html>