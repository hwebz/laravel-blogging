<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
	'uses' => 'PostController@getBlogIndex',
	'as' => 'blog.index'
]);

Route::get('/blog', [
	'uses' => 'PostController@getBlogIndex',
	'as' => 'blog.index'
]);

Route::get('/blog/{post_id}&{end}', [
	'uses' => 'PostController@getSinglePost',
	'as' => 'blog.single'
]);

Route::get('/about', function() {
	return view('frontend.other.about');
})->name('blog.about');

Route::get('/contact', [
	'uses' => 'ContactMessageController@getContactIndex',
	'as' => 'blog.contact'
]);

Route::post('/contact/sendmail', [
	'uses' => 'ContactMessageController@postSendMessage',
	'as' => 'contact.send'
]);

Route::get('/admin/login', [
	'uses' => 'AdminController@getLogin',
	'as' => 'admin.login'
]);

Route::post('/admin/login', [
	'uses' => 'AdminController@postLogin',
	'as' => 'admin.login'
]);

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function() {
	Route::get('/', [
		'uses' => 'AdminController@getIndex',
		'as' => 'admin.index'
	]);

	Route::get('/logout', [
		'uses' => 'AdminController@getLogout',
		'as' => 'admin.logout'
	]);

	Route::get('/blog/posts/create', [
		'uses' => 'PostController@getCreatePost',
		'as' => 'admin.blog.create_post'
	]);

	Route::post('/blog/posts/create', [
		'uses' => 'PostController@postCreatePost',
		'as' => 'admin.blog.post.create'
	]);

	Route::get('/blog/posts', [
		'uses' => 'PostController@getPostIndex',
		'as' => 'admin.blog.post.index'
	]);

	Route::get('/blog/post/{post_id}&{end}', [
		'uses' => 'PostController@getSinglePost',
		'as' => 'admin.blog.post'
	]);

	Route::get('/blog/post/{post_id}/edit', [
		'uses' => 'PostController@getUpdatePost',
		'as' => 'admin.blog.post.edit'
	]);

	Route::post('/blog/post/update', [
		'uses' => 'PostController@postUpdatePost',
		'as' => 'admin.blog.post.update'
	]);

	Route::get('/blog/post/{post_id}/delete', [
		'uses' => 'PostController@getDeletePost',
		'as' => 'admin.blog.post.delete'
	]);

	Route::get('/blog/categories', [
		'uses' => 'CategoryController@getCategoryIndex',
		'as' => 'admin.blog.category.index'
	]);

	Route::post('/blog/category/create', [
		'uses' => 'CategoryController@postCreateCategory',
		'as' => 'admin.blog.category.create'
	]);

	Route::post('/blog/category/update', [
		'uses' => 'CategoryController@postUpdateCategory',
		'as' => 'admin.blog.category.update'
	]);

	Route::get('/blog/category/{category_id}/delete', [
		'uses' => 'CategoryController@getDeleteCategory',
		'as' => 'admin.blog.category.delete'
	]);

	Route::get('/contact/messages', [
		'uses' => 'ContactMessageController@getContactMessageIndex',
		'as' => 'admin.contact.index'
	]);

	Route::get('/contact/message/{message_id}/delete', [
		'uses' => 'ContactMessageController@getDeleteContactMessage',
		'as' => 'admin.contact.delete'
	]);
});