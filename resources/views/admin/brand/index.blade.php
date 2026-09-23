@include('admin.includes.header');
@include('admin.includes.sidebar');
     <!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h4>View Brand</h4>

              <!-- Search -->
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">

                  <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Brand Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </tr>

                  @foreach($brands as $brand)
                  <tr>
                    <td>{{ $brand->id }}</td>

                    <!-- Logo -->
                    <td>
                      @if($brand->brand_logo)
                        <img src="{{ asset('uploads/brand/'.$brand->brand_logo) }}" width="60">
                      @else
                        No Image
                      @endif
                    </td>

                    <td>{{ $brand->brand_name }}</td>

                    <td>{{ $brand->brand_description }}</td>

                    <td>
                      @if($brand->status == 1)
                        <div class="badge badge-success">Active</div>
                      @else
                        <div class="badge badge-danger">Inactive</div>
                      @endif
                    </td>

                    <td>
                      <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-primary">Edit</a>
                    </td>

                    <td>
                      <a href="{{ route('brand.delete', $brand->id) }}"
                         onclick="return confirm('Are you sure?')"
                         class="btn btn-danger">
                         Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach

                </table>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>
</div>
      </div>
    @include('admin.includes.footer');