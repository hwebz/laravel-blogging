@extends('layouts.master')

@section('title')
	{{ $post->title }}
@endsection

@section('content')
	<div class="container">
		<article>
			<h1>{{ $post->title }}</h1>
			<span class="subtitle">{{ $post->author}} | {{ $post->created_at }}</span>
			<p>{{ $post->body }}</p>
		</article>
	</div>
@endsection