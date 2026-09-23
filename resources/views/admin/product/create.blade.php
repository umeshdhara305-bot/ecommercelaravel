@include('admin.includes.header');
@include('admin.includes.sidebar');

<div class="main-content">
<section class="section">
<div class="section-body">

<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<div class="card">
<div class="card-header">
<h4 class="text-center">ADD PRODUCT</h4>
</div>

<!-- ✅ FORM START -->
<form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
@csrf

<div class="card-body">

<!-- Product Name -->
<div class="form-group">
<label>Product Name</label>
<input type="text" class="form-control" name="product_name" placeholder="Enter product name" required>
</div>

<!-- Category -->
<div class="form-group">
<label>Category</label>
<select class="form-control" name="category_id" required>
<option value="">Select Category</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
@endforeach
</select>
</div>

<!-- Brand -->
<div class="form-group">
<label>Brand</label>
<select class="form-control" name="brand_id" required>
<option value="">Select Brand</option>
@foreach($brands as $brand)
<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
@endforeach
</select>
</div>

<!-- Price -->
<div class="form-group">
<label>Price</label>
<input type="text" class="form-control" name="price" placeholder="Enter price">
</div>

<!-- Image -->
<div class="form-group">
<label>Product Image</label>
<input type="file" class="form-control" name="image">
</div>

<!-- Description -->
<div class="form-group">
<label>Description</label>
<textarea class="form-control" name="description" rows="3"></textarea>
</div>

<!-- Status -->
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
<div class="form-group mt-3">
    <label>
        <input type="checkbox" name="featured" value="1">
        Featured Item
    </label>
</div>

<div class="form-group mt-3">
    <label>
        <input type="checkbox" name="recommended" value="1">
        Recommended Item
    </label>
</div>

</div>

<div class="card-footer text-right">
<button class="btn btn-primary mr-1" type="submit">Add Product</button>
</div>

</form>
<!-- ✅ FORM END -->

</div>

</div>
</div>

</div>
</section>
</div>
@include('admin.includes.footer');
