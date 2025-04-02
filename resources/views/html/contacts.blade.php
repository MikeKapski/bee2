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