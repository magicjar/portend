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

Route::get('/', 'HomeController@index')->name('homepage');

Auth::routes();

// Api Route
Route::group(['prefix' => 'api', 'as' => 'api.'], function(){
	Route::get('article/{article}', 'ApiController@articleEdit')->name('article.edit');
	Route::get('portfolio/{portfolio}', 'ApiController@portfolioEdit')->name('portfolio.edit');

	// Skill
	Route::get('skill', 'ApiController@skillIndex')->name('skill.index');
	Route::post('skill', 'ApiController@skillStore')->name('skill.store');
	Route::put('skill', 'ApiController@skillStore')->name('skill.update');
	Route::delete('skill/{id}', 'ApiController@skillDestroy')->name('skill.destroy');

	// Education
	Route::get('education', 'ApiController@educationIndex')->name('education.index');
	Route::post('education', 'ApiController@educationStore')->name('education.store');
	Route::put('education', 'ApiController@educationStore')->name('education.update');
	Route::delete('education/{id}', 'ApiController@educationDestroy')->name('education.destroy');

	// Experience
	Route::get('experience', 'ApiController@experienceIndex')->name('experience.index');
	Route::post('experience', 'ApiController@experienceStore')->name('experience.store');
	Route::put('experience', 'ApiController@experienceStore')->name('experience.update');
	Route::delete('experience/{id}', 'ApiController@experienceDestroy')->name('experience.destroy');

	// Testimonial
	Route::get('testimonial', 'ApiController@testimonialIndex')->name('testimonial.index');
	Route::post('testimonial', 'ApiController@testimonialStore')->name('testimonial.store');
	Route::put('testimonial', 'ApiController@testimonialStore')->name('testimonial.update');
	Route::delete('testimonial/{id}', 'ApiController@testimonialDestroy')->name('testimonial.destroy');

	// Media
	Route::post('media/upload', 'MediaController@upload')->name('media.upload');
	Route::get('media', 'MediaController@mediaIndex')->name('media.index');
	Route::put('media', 'MediaController@mediaPut')->name('media.update');
	Route::delete('media/{id}', 'MediaController@mediaDelete')->name('media.destroy');

	// Setting
	Route::put('setting', 'DashboardController@settingUpdate')->name('setting.update');


	Route::get('category', 'ApiController@categoryIndex')->name('portfolio.index');
	Route::post('category', 'ApiController@categoryStore')->name('portfolio.store');
	Route::put('category', 'ApiController@categoryStore')->name('portfolio.update');
	Route::delete('category/{category}', 'ApiController@categoryDestroy')->name('portfolio.destroy');

	Route::get('tag', 'ApiController@tagIndex')->name('tag.index');
	Route::post('tag', 'ApiController@tagStore')->name('tag.store');
	Route::put('tag', 'ApiController@tagStore')->name('tag.update');
	Route::delete('tag/{tag}', 'ApiController@tagDestroy')->name('tag.destroy');
});

// Controller Route
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){

	Route::get('/', 'DashboardController@index')->name('index');

	Route::get('about', 'DashboardController@about')->name('about');

	Route::get('resume/skill', 'DashboardController@skill')->name('skill');

	Route::get('resume/education', 'DashboardController@education')->name('education');

	Route::get('resume/experience', 'DashboardController@experience')->name('experience');

	Route::get('testimonial', 'DashboardController@testimonial')->name('testimonial');

	Route::get('article/category', 'DashboardController@articleCategory')->name('article.category');
	Route::get('article/tag', 'DashboardController@articleTag')->name('article.tag');
	Route::resource('article', 'ArticleController');

	Route::get('portfolio/category', 'DashboardController@portfolioCategory')->name('portfolio.category');
	Route::get('portfolio/tag', 'DashboardController@portfolioTag')->name('portfolio.tag');
	Route::resource('portfolio', 'PortfolioController');

	Route::get('setting', 'DashboardController@setting')->name('setting');
});
