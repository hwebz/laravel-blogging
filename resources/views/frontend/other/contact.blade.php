@extends('layouts.master')

@section('title')
	Contact
@endsection

@section('styles')
	<link rel="stylesheet" href="{{ URL::to('css/form.css') }}">
@endsection

@section('content')
	<div class="container">
		@include('includes.info-box')
		<form action="{{ route('contact.send') }}" method="post" id="contact-form">
			<div class="input-group">
				<label for="name">Your Name</label>
				<input type="text" name="name" id="name" value="{{ Request::old('name') }}" placeholder="Your Name" />
			</div>
			<div class="input-group">
				<label for="email">Your Email</label>
				<input type="text" name="email" id="email" value="{{ Request::old('email') }}" placeholder="Your Email" />
			</div>
			<div class="input-group">
				<label for="subject">Subject</label>
				<input type="text" name="subject" id="subject" value="{{ Request::old('subject') }}" placeholder="Subject" />
			</div>
			<div class="input-group">
				<label for="message">Message</label>
				<textarea name="message" id="message" rows="10" placeholder="Message">{{ Request::old('message') }}</textarea>
			</div>
			<button type="submit" class="btn">Submit Message</button>
			<input type="hidden" value="{{ Session::token() }}" name="_token" />
		</form>
	</div>
@endsection