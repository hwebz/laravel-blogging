@extends('layouts.admin-master')

@section('styles')
	<link rel="stylesheet" href="{{ URL::to('css/form.css') }}">
@endsection

@section('content')
	<div class="container">
		@include('includes.info-box')
		<form action="{{ route('admin.blog.post.create') }}" method="post">
			<div class="input-group">
				<label for="title">Title</label>
				<input type="text" name="title" id="title" {{ $errors->has('title') ? 'class=has-error' : ''}} value="{{ Request::old('title') }}" placeholder="Title">
			</div>
			<div class="input-group">
				<label for="author">Author</label>
				<input type="text" name="author" id="author" {{ $errors->has('author') ? 'class=has-error' : ''}} value="{{ Request::old('author') }}" placeholder="Author">
			</div>
			<div class="input-group">
				<label for="category_select">Add Categories</label>
				<select name="category_select" id="category_select">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
				<button type="button" class="btn">Add Category</button>
				<div class="added-categories">
					<ul>
						
					</ul>
				</div>
				<input type="hidden" name="categories" id="categories">
			</div>
			<div class="input-group">
				<label for="body">Body</label>
				<textarea name="body" id="body" {{ $errors->has('body') ? 'class=has-error' : ''}} rows="12">{{ Request::old('body') }}</textarea>
			</div>
			<input type="hidden" name="_token" value="{{ Session::token() }}">
			<button type="submit" class="btn">Create Post</button>
		</form>
	</div>
@endsection

@section('scripts')
	<script src="{{ URL::to('js/posts.js') }}"></script>
@endsection