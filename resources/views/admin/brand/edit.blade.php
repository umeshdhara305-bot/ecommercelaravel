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
              <h4 class="text-center">EDIT BRAND</h4>
            </div>

            <!-- ✅ FORM START -->
            <form method="POST" action="{{ route('brand.update', $brand->id) }}" enctype="multipart/form-data">
              @csrf

              <div class="card-body">

                <!-- Brand Name -->
                <div class="form-group">
                  <label>Brand Name</label>
                  <input type="text" class="form-control" name="brand_name"
                         value="{{ $brand->brand_name }}" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                  <label>Brand Description</label>
                  <input type="text" class="form-control" name="brand_description"
                         value="{{ $brand->brand_description }}">
                </div>

                <!-- Current Logo -->
                <div class="form-group">
                  <label>Current Logo</label><br>
                  @if($brand->brand_logo)
                    <img src="{{ asset('uploads/brand/'.$brand->brand_logo) }}" width="80">
                  @else
                    No Image
                  @endif
                </div>

                <!-- Change Logo -->
                <div class="form-group">
                  <label>Change Logo</label>
                  <input type="file" class="form-control" name="brand_logo">
                </div>

                <!-- Status -->
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>

              </div>

              <div class="card-footer text-right">
                <button class="btn btn-primary" type="submit">Update Brand</button>
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