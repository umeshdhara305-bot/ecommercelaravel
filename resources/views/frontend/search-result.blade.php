@if($products->count())

<ul class="list-group">

@foreach($products as $product)

<li class="list-group-item">

    <a href="#" style="display:block;text-decoration:none;color:#333;">
        {{ $product->product_name }}
        <span class="pull-right">
            ₹{{ $product->price }}
        </span>
    </a>

</li>

@endforeach

</ul>

@else

<div class="list-group-item">
    No Products Found
</div>

@endif