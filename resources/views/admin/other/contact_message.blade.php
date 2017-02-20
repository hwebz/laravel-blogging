@extends('layouts.admin-master')

@section('content')
	<div class="container">
		<section class="list">
			<ul>
				@if(count($contact_messages) > 0)
					@foreach($contact_messages as $contact_message)
						<li>
							<article data-message="{{ $contact_message->body }}" data-id="{{ $contact_message->id }}" class="contact-message">
								<div class="post-info">
									<h3>{{ $contact_message->subject }}</h3>
									<span class="info">{{ $contact_message->sender }} | {{ $contact_message->created_at }}</span>
									<div class="edit">
										<nav>
											<ul>
												<li><a href="">Show message</a></li>
												<li><a href="#" class="danger">Delete</a></li>
											</ul>
										</nav>
									</div>
								</div>
							</article>
						</li>
					@endforeach
				@else
					<li>No Message</li>
				@endif
			</ul>
		</section>
		@if($contact_messages->lastPage() > 1)
			<section class="pagination">
				@if($contact_messages->currentPage() !== 1)
					<a href="{{ $contact_messages->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
				@endif
				@if($contact_messages->currentPage() !== $contact_messages->lastPage())
					<a href="{{ $contact_messages->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
				@endif
			</section>
		@endif
		<div class="modal" id="contact-message-info">
			<button class="btn" id="modal-close">Close</button>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		var token = "{{ Session::token() }}";
	</script>
	<script src="{{ URL::to('js/modal.js') }}"></script>
	<script src="{{ URL::to('js/contact_messages.js') }}"></script>
@endsection