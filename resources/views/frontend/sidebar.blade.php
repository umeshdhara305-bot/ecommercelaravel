<div class="col-sm-3">
    <div class="left-sidebar">

        <h2>Category</h2>

        <div class="panel-group category-products" id="accordian">

            @foreach($categories as $category)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                                    <a href="{{ route('category.products', $category->id) }}">
    {{ $category->cat_name }}
</a>
                        </h4>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="brands_products">
            <h2>Brands</h2>

            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">

                    @foreach($brands as $brand)
                  <li>
    <a href="{{ route('brand.products', $brand->id) }}">
        <span class="pull-right">
            ({{ $brand->products->count() }})
        </span>
        {{ $brand->brand_name }}
    </a>
</li>
                    @endforeach

                </ul>
            </div>
        </div>

        <div class="price-range">
            <h2>Price Range</h2>

            <div class="well text-center">
                <input
                    type="text"
                    class="span2"
                    value=""
                    data-slider-min="0"
                    data-slider-max="600"
                    data-slider-step="5"
                    data-slider-value="[250,450]"
                    id="sl2">

                <br>

                <b class="pull-left">$0</b>
                <b class="pull-right">$600</b>
            </div>
        </div>

        <div class="shipping text-center">
            <img src="{{ asset('assets/frontend/images/home/shipping.jpg') }}"
                 class="img-responsive"
                 alt="">
        </div>

    </div>
</div>