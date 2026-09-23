@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="main-content">
<section class="section">
<div class="section-body">

<div class="row">
<div class="col-12 col-md-12 col-lg-12">

<div class="card">
<div class="card-header">
<h4 class="text-center">SETTINGS</h4>
</div>

<!-- ✅ SUCCESS MESSAGE -->
@if(session('success'))
<div class="alert alert-success m-3">
    {{ session('success') }}
</div>
@endif

<!-- ✅ FORM START -->
<form method="POST" action="{{ route('settings.update') }}">
@csrf

<div class="card-body">

<!-- Site Name -->
<div class="form-group">
<label>Site Name</label>
<input type="text" class="form-control" name="site_name"
       value="{{ $setting->site_name ?? '' }}">
</div>

<!-- Address -->
<div class="form-group">
<label>Address</label>
<textarea class="form-control" name="address" rows="2">{{ $setting->address ?? '' }}</textarea>
</div>

<!-- City -->
<div class="form-group">
<label>City</label>
<input type="text" class="form-control" name="city"
       value="{{ $setting->city ?? '' }}">
</div>

<!-- Country -->
<div class="form-group">
<label>Country</label>
<input type="text" class="form-control" name="country"
       value="{{ $setting->country ?? '' }}">
</div>

<!-- Mobile -->
<div class="form-group">
<label>Mobile</label>
<input type="text" class="form-control" name="mobile"
       value="{{ $setting->mobile ?? '' }}">
</div>

<!-- Fax -->
<div class="form-group">
<label>Fax</label>
<input type="text" class="form-control" name="fax"
       value="{{ $setting->fax ?? '' }}">
</div>

<!-- Email -->
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email"
       value="{{ $setting->email ?? '' }}">
</div>

</div>

<div class="card-footer text-right">
<button class="btn btn-primary">Update Settings</button>
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