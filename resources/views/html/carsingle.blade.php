@inject('Detect', 'App\Http\Controllers\DetectController')

@extends('layouts.default')

@section('content')

    <div class="defaultpage padd_0_135">
        <div class="htmlpageblock padd_0_135">

            <div class="Breadrumps">
                {!! $BreadCrumps !!}
            </div> 
            
            <div class="carsingle_screen">
                <div class="carsingle_screen_left">
                    1
                </div>
                <div class="carsingle_screen_right">
                    <h1 class="carsingle_h1"><span>Аренда</span> {{ $CarInfo['Name'] }}</h1>
                    <div class="carsingle_text">
                        {{ $CarInfo['CarTextShort'] }}
                    </div>
                </div>
            </div>

            <div class="carsingle_screen">
                <div class="carsingle_screen_left">
                    3
                </div>
                <div class="carsingle_screen_right">
                    4
                </div>
            </div>
        
        </div>
    
    </div>
      
@stop