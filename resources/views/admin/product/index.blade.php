@include('admin.includes.header');
@include('admin.includes.sidebar');

<div class="main-content">
<section class="section">

<div class="card">
<div class="card-header">
<h4>View Products</h4>

<a href="{{ route('product.create') }}" class="btn btn-primary">+ Add Product</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card-body">
<table class="table table-striped">

<tr>
<th>ID</th>
<th>Image</th>
<th>Name</th>
<th>Category</th>
<th>Brand</th>
<th>Price</th>
<th>Status</th>
<th>Action</th>
<th>Featured</th>
<th>Recommended</th>
</tr>

@foreach($products as $product)
<tr>
<td>{{ $product->id }}</td>

<td>
@if($product->image)
<img src="{{ asset('uploads/products/'.$product->image) }}" width="60">
@endif
</td>

<td>{{ $product->product_name }}</td>

<td>{{ $product->category->cat_name ?? '' }}</td>

<td>{{ $product->brand->brand_name ?? '' }}</td>

<td>{{ $product->price }}</td>

<td>
@if($product->status == 1)
<span class="badge badge-success">Active</span>
@else
<span class="badge badge-danger">Inactive</span>
@endif
</td>
<td>
    @if($product->featured)
        <span class="badge bg-success">Yes</span>
    @else
        <span class="badge bg-secondary">No</span>
    @endif
</td>

<td>
    @if($product->recommended)
        <span class="badge bg-success">Yes</span>
    @else
        <span class="badge bg-secondary">No</span>
    @endif
</td>

<td>
<a href="{{ route('product.edit',$product->id) }}" class="btn btn-warning btn-sm">Edit</a>

<a href="{{ route('product.delete',$product->id) }}"
onclick="return confirm('Are you sure?')"
class="btn btn-danger btn-sm">Delete</a>
</td>

</tr>
@endforeach

</table>
</div>
</div>

</section>
</div>
@include('admin.includes.footer');