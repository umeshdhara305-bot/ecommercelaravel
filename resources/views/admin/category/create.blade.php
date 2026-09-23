@include('admin.includes.header');
@include('admin.includes.sidebar');

      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo"> /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="{{ route('admin.dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">FresherIndian</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Categories</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('category.create') }}">Add Category</a></li>
                <li><a class="nav-link" href="{{ route('category.view') }}">View Category</a></li>
              </ul>
            </li>
               <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="layout"></i><span>Brand</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('brand.create') }}">Add Brand</a></li>
                <li><a class="nav-link"href="{{ route('brand.index') }}">View Brand</a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
       <section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif              
          <div class="card-header">
             
            <h4 class="text-center">ADD CATEGORY</h4>
          </div>

          <!-- ✅ FORM START -->
          <form method="POST" action="{{ url('category/store') }}" novalidate>
            @csrf

            <div class="card-body">

              <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" name="cat_name" required value="{{ old('cat_name') }}">

                 @error('cat_name')
        <span style="color: red;">{{ $message }}</span>
    @enderror
              </div>

              <div class="form-group">
                <label>Category Description</label>
                <input type="text" class="form-control" name="cat_description" required value="{{ old('cat_description') }}">
                           @error('cat_description')
        <span style="color: red;">{{ $message }}</span>
    @enderror
              </div>

              <!-- ✅ STATUS FIELD -->
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
                </select>
              </div>

            </div>

            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
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