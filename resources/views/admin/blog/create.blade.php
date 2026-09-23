@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<div class="card">
<div class="card-header">
    <h4 class="text-center">ADD BLOG</h4>
</div>

<form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
@csrf

<div class="card-body">

<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" required>
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
</div>

<div class="form-group">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select>
</div>

</div>

<div class="card-footer text-right">
    <button class="btn btn-primary">Add Blog</button>
</div>

</form>

</div>
</div>
</div>
</div>
</section>
</div>

@include('admin.includes.footer')