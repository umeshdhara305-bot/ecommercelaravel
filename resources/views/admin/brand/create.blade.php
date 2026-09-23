@include('admin.includes.header');
@include('admin.includes.sidebar');
      <!-- Main Content -->
      <div class="main-content">
       <section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">Brand</h4>
          </div>

          <!-- ✅ FORM START -->
    <div class="card-header">
  <h4 class="text-center">ADD BRAND</h4>
</div>

<!-- ✅ FORM START -->
<form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
  @csrf

  <div class="card-body">

    <!-- Brand Name -->
    <div class="form-group">
      <label>Brand Name</label>
      <input type="text" class="form-control" name="brand_name" required>
    </div>

    <!-- Brand Description -->
    <div class="form-group">
      <label>Brand Description</label>
      <input type="text" class="form-control" name="brand_description">
    </div>

    <!-- Brand Logo -->
    <div class="form-group">
      <label>Brand Logo</label>
      <input type="file" class="form-control" name="brand_logo">
    </div>

    <!-- Status -->
    <div class="form-group">
      <label>Status</label>
      <select class="form-control" name="status">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>

  </div>

  <div class="card-footer text-right">
    <button class="btn btn-primary mr-1" type="submit">Add Brand</button>
  </div>

</form>
<!-- ✅ FORM END -->
          <!-- ✅ FORM END -->

        </div>
      </div>
    </div>
  </div>
</section>
      </div>
    @include('admin.includes.footer');