@extends('layouts.admin-master')

@section('content')
	<div class="container">
		@include('includes.info-box')
		<section id="post-admin">
			<a href="{{ route('admin.blog.create_post') }}" class="btn">New Post</a>
		</section>
		<section class="list">
			<ul>
				@if(count($posts) > 0)
					@foreach($posts as $post)
						<li>
						<article>
							<div class="post-info">
								<h3>{{ $post->title }}</h3>
								<span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
								<div class="edit">
									<nav>
										<ul>
											<li><a href="{{ route('admin.blog.post', ['post_id' => $post->id, 'end' => 'admin']) }}">View Post</a></li>
											<li><a href="{{ route('admin.blog.post.edit', ['post_id' => $post->id]) }}">Edit</a></li>
											<li><a href="{{ route('admin.blog.post.delete', ['post_id' => $post->id]) }}" class="danger">Delete</a></li>
										</ul>
									</nav>
								</div>
							</div>
						</article>
					</li>
					@endforeach
				@else
					<li>No Posts</li>
				@endif
			</ul>
		</section>
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