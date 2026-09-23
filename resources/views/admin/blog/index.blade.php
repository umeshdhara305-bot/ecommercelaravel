@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
<section class="section">
<div class="section-body">
<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<div class="card">
<div class="card-header">
    <h4 class="text-center">Blog List</h4>
</div>

@if(session('success'))
<div class="alert alert-success m-3">
    {{ session('success') }}
</div>
@endif

<div class="card-body">

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach($blogs as $blog)
    <tr>
        <td>{{ $blog->id }}</td>
        <td>{{ $blog->title }}</td>
        <td>
            <img src="{{ asset('uploads/blog/'.$blog->image) }}" width="70">
        </td>
        <td>{{ $blog->status ? 'Active' : 'Inactive' }}</td>
        <td>
            <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ route('blog.delete',$blog->id) }}" 
               class="btn btn-danger btn-sm"
               onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    @endforeach
</table>

</div>
</div>

</div>
</div>
</div>
</section>
</div>

@include('admin.includes.footer')