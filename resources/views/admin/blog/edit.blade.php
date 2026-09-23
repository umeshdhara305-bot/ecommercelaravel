@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">

          <div class="card">
            <div class="card-header">
              <h4 class="text-center">EDIT BLOG</h4>
            </div>

            <form method="POST" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
              @csrf

              <div class="card-body">

                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" name="title"
                         value="{{ $blog->title }}" required>
                </div>

                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description">{{ $blog->description }}</textarea>
                </div>

                <div class="form-group">
                  <label>Current Image</label><br>
                  @if($blog->image)
                    <img src="{{ asset('uploads/blog/'.$blog->image) }}" width="80">
                  @else
                    No Image
                  @endif
                </div>

                <div class="form-group">
                  <label>Change Image</label>
                  <input type="file" class="form-control" name="image">
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status">
                    <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>

              </div>

              <div class="card-footer text-right">
                <button class="btn btn-primary">Update Blog</button>
              </div>

            </form>

          </div>

        </div>
      </div>
    </div>
  </section>
</div>

@include('admin.includes.footer')