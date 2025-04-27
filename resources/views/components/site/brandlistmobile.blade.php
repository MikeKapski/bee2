<div class="mobiletooer">
    <h2>Наш парк авто</h2>
    <div class="car_brands_list">

        <div class="dropdown">
            <button class="dropdown-button">Выберите марку</button>
            <ul class="dropdown-menu">
                @foreach ($CarsBrands as $brand)
                <li>
                    <div class="car_brands_list_item" data-BrandPageID="{{ $brand->BrandPageID }}">
                        <div class="car_brands_list_item_logo">
                            <img src="{{ $brand->BrandLogo }}">
                        </div>
                        <div class="car_brands_list_item_name">
                            {{ $brand->BrandName }}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

         
    </div>
</div>
