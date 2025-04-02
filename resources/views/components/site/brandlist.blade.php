
    <h2>Наш парк авто</h2>
    <div class="car_brands_list">
          @foreach ($CarsBrands as $brand)
               <div class="car_brands_list_item" data-BrandPageID="{{ $brand->BrandPageID }}">
                    <div class="car_brands_list_item_logo">
                         <img src="{{ $brand->BrandLogo }}">
                    </div>
                    <div class="car_brands_list_item_name">
                         {{ $brand->BrandName }}
                    </div>
               </div>
          @endforeach
    </div>
