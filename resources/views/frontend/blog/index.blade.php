@extends('layouts.master')

@section('title')
	Welcome to my site
@endsection

@section('content')
	<div class="container">
		@include('includes.info-box')
		@foreach($posts as $post)
			<div class="blog-post">
				<h3>{{ $post->title }}</h3>
				<span class="subtitle">{{ $post->author }} | {{ $post->created_at }}</span>
				<p>{{ $post->body }}</p>
				<a href="{{ route('admin.blog.post', ['post_id' => $post->id, 'end' => 'frontend']) }}">Read more</a>
			</div>
		@endforeach
		@if($posts->lastPage() > 1)
			<section class="pagination">
				@if($posts->currentPage() !== 1)
					<a href="{{ $posts->previousPageUrl() }}"><span class="fa fa-caret-left"></span></a>
				@endif
				@if($posts->currentPage() !== $posts->lastPage())
					<a href="{{ $posts->nextPageUrl() }}"><span class="fa fa-caret-right"></span></a>
				@endif
			</section>
		@endif
	</div>
@endsection