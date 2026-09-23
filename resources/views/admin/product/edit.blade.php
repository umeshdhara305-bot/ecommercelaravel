@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
<section class="section">
<div class="section-body">

<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<div class="card">
<div class="card-header">
<h4 class="text-center">EDIT PRODUCT</h4>
</div>

<!-- ✅ FORM START -->
<form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
@csrf

<div class="card-body">

<!-- Product Name -->
<div class="form-group">
<label>Product Name</label>
<input type="text" class="form-control" name="product_name"
       value="{{ $product->product_name }}" required>
</div>

<!-- Category -->
<div class="form-group">
<label>Category</label>
<select class="form-control" name="category_id" required>
@foreach($categories as $cat)
<option value="{{ $cat->id }}"
    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
    {{ $cat->cat_name }}
</option>
@endforeach
</select>
</div>

<!-- Brand -->
<div class="form-group">
<label>Brand</label>
<select class="form-control" name="brand_id" required>
@foreach($brands as $brand)
<option value="{{ $brand->id }}"
    {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
    {{ $brand->brand_name }}
</option>
@endforeach
</select>
</div>

<!-- Price -->
<div class="form-group">
<label>Price</label>
<input type="text" class="form-control" name="price"
       value="{{ $product->price }}">
</div>

<!-- Image -->
<div class="form-group">
<label>Product Image</label><br>

@if($product->image)
<img src="{{ asset('uploads/products/'.$product->image) }}" width="80" class="mb-2">
@endif

<input type="file" class="form-control" name="image">
</div>

<!-- Description -->
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="description" rows="3">{{ $product->description }}</textarea>
</div>

<!-- Status -->
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
<option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
<option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
</select>
</div>
<div class="form-group mt-3">
    <label>
        <input type="checkbox"
               name="featured"
               value="1"
               {{ $product->featured ? 'checked' : '' }}>
        Featured Item
    </label>
</div>

<div class="form-group mt-3">
    <label>
        <input type="checkbox"
               name="recommended"
               value="1"
               {{ $product->recommended ? 'checked' : '' }}>
        Recommended Item
    </label>
</div>

</div>

<div class="card-footer text-right">
<button class="btn btn-primary">Update Product</button>
</div>

</form>
<!-- ✅ FORM END -->

</div>

</div>
</div>

</div>
</section>
</div>

@include('admin.includes.footer')