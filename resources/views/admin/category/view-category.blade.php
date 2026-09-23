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
                    <h4>View Category</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>id</th>
                          <th>Category Name</th>
                          <th>Category Description</th>
                          <th>Status</th>
                          <th>EDIT</th>
                          <th>DELETE</th>
                        </tr>
                      @foreach($categories as $cat)
<tr>
  <td>{{ $cat->id }}</td>

  <td>{{ $cat->cat_name }}</td>

  <td>{{ $cat->cat_description }}</td>

  <td>
    @if($cat->status == 1)
      <div class="badge badge-success">Active</div>
    @else
      <div class="badge badge-danger">Inactive</div>
    @endif
  </td>

  <td>
    <a href="{{ url('category/edit/'.$cat->id) }}" class="btn btn-primary">Edit</a>
  </td>

  <td>
    <a href="{{ url('category/delete/'.$cat->id) }}"
       onclick="return confirm('Are you sure?')"
       class="btn btn-danger">Delete</a>
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
     @include('admin.includes.footer');