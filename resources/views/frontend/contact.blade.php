 @extends('frontend.layout')

@section('content')
 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">

	    				<h2 class="title text-center">Get In Touch</h2>
	    				

<form id="contactForm" class="contact-form row">
    @csrf

    <div class="form-group col-md-6">
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group col-md-12">
        <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subject">
        @error('subject')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group col-md-12">
        <textarea name="message" class="form-control" rows="8" placeholder="Your Message Here">{{ old('message') }}</textarea>
        @error('message')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="form-group col-md-12">
        <input type="submit" class="btn btn-primary pull-right" value="Submit">
    </div>
	<div id="successMessage" class="alert alert-success" style="display:none;"></div>

<div id="errorMessage" class="alert alert-danger" style="display:none;"></div>

</form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>{{ $setting->site_name ?? 'E-Shopper Inc.' }}</p>
<p>{{ $setting->address ?? '' }}</p>
<p>{{ $setting->city ?? '' }}, {{ $setting->country ?? '' }}</p>
<p>Mobile: {{ $setting->mobile ?? '' }}</p>
<p>Fax: {{ $setting->fax ?? '' }}</p>
<p>Email: {{ $setting->email ?? '' }}</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	@endsection
@push('scripts')
<script>
$(document).ready(function(){

    $('#contactForm').submit(function(e){

        e.preventDefault();

        $.ajax({

            url: "{{ route('contact.submit') }}",
            type: "POST",
            data: $('#contactForm').serialize(),

            success: function(response){

                $('#successMessage').html(response.message).show();

                $('#errorMessage').hide();

                $('#contactForm')[0].reset();

            },

            error: function(xhr){

                $('#successMessage').hide();

                if(xhr.status == 422){

                    let errors = xhr.responseJSON.errors;

                    let errorText = "";

                    $.each(errors, function(key, value){

                        errorText += value[0] + "<br>";

                    });

                    $('#errorMessage').html(errorText).show();

                }else{

                    $('#errorMessage').html("Something went wrong.").show();

                }

            }

        });

    });

});
</script>
@endpush