@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
<section class="section">
<div class="section-body">

<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<div class="card">
<div class="card-header">
<h4 class="text-center">EDIT CATEGORY</h4>
</div>

<!-- ✅ ERROR MESSAGE -->
@if ($errors->any())
<div class="alert alert-danger m-3">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- ✅ FORM START -->
<form method="POST" action="{{ url('category/update/'.$category->id) }} novalidate">
@csrf

<div class="card-body">

<!-- Category Name -->
<div class="form-group">
<label>Category Name</label>
<input type="text"
       class="form-control @error('cat_name') is-invalid @enderror"
       name="cat_name"
       value="{{ $category->cat_name }}">

@error('cat_name')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>

<!-- Category Description -->
<div class="form-group">
<label>Category Description</label>
<input type="text"
       class="form-control @error('cat_description') is-invalid @enderror"
       name="cat_description"
       value="{{ $category->cat_description }}">

@error('cat_description')
<div class="text-danger">{{ $message }}</div>
@enderror
</div>

<!-- Status -->
<div class="form-group">
<label>Status</label>
<select class="form-control" name="status">
    <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
    <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
</select>
</div>

</div>

<div class="card-footer text-right">
<button type="submit" class="btn btn-primary">Update Category</button>
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