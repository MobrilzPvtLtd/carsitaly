@extends('frontend.layouts.services-app')

@section('title')
    {{ app_name() }}
@endsection
@section('services-content')
<div class="site-wrapper">
	<div class="row page-title">
		<div class="container clear-padding text-center flight-title">
			<h3>CONTACT US</h3>
			<h4 class="thank">Let's Get Connected</h4>
		</div>
	</div>

	<div class="row contact-address">
		<div class="container clear-padding">
			<div class="text-center">
				<h2>GET IN TOUCH</h2>
				<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</h5>
				<div class="space"></div>
				<div class="col-md-4 col-sm-4">
					<i class="fa fa-map-marker"></i>
					<p>Street #42, Burbank, LA</p>
				</div>
				<div class="col-md-4 col-sm-4">
					<i class="fa fa-envelope-o"></i>
					<p><a href="mailto:your@email.com">your@email.com</a></p>
				</div>
				<div class="col-md-4 col-sm-4">
					<i class="fa fa-phone"></i>
					<p>+91 1234567890</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container clear-padding">
			<div class="col-md-6 col-sm-6">
				<iframe class="contact-map" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7004.508557808304!2d77.3867335!3d28.6221402!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185cd1dfd0044e5d%3A0xabac6fbb0ef99df!2sZOHOBO!5e0!3m2!1sen!2sin!4v1707890666826!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="col-md-6 col-sm-6 contact-form">
                {{-- @include('flash::alert-message') --}}
				<div class="col-md-12">
					<h2>DROP A MESSAGE</h2>
					<h5>Drop Us a Message</h5>
				</div>
				<form action="{{ route('contact-submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="source" value="contactForm">
					<div class="col-md-6 col-sm-6">
						<input type="text" name="name" required class="form-control" placeholder="Your Name">
					</div>
					<div class="col-md-6 col-sm-6">
						<input type="email" name="email" required class="form-control" placeholder="Your Email">
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<input type="number" name="mobile" required class="form-control" placeholder="Your Phone Number">
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<textarea class="form-control" rows="5" id="comment" name="message" placeholder="Your Message"></textarea>
					</div>
					<div class="clearfix"></div>
					<div class="text-center">
						<button type="submit" class="btn btn-default submit-review">SEND YOUR MESSAGE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
