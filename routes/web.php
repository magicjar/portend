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

	Route::get('article-category', 'ApiController@articleCategoryIndex')->name('category.article.index');
	Route::post('article-category', 'ApiController@articleCategoryStore')->name('category.article.store');
	Route::put('article-category', 'ApiController@articleCategoryStore')->name('category.article.update');
	Route::delete('article-category/{id}', 'ApiController@articleCategoryDestroy')->name('category.article.destroy');

	Route::get('article-tag', 'ApiController@articleTagIndex')->name('tag.article.index');
	Route::post('article-tag', 'ApiController@articleTagStore')->name('tag.article.store');
	Route::put('article-tag', 'ApiController@articleTagStore')->name('tag.article.update');
	Route::delete('article-tag/{id}', 'ApiController@articleTagDestroy')->name('tag.article.destroy');

	Route::get('portfolio-category', 'ApiController@portfolioCategoryIndex')->name('category.portfolio.index');
	Route::post('portfolio-category', 'ApiController@portfolioCategoryStore')->name('category.portfolio.store');
	Route::put('portfolio-category', 'ApiController@portfolioCategoryStore')->name('category.portfolio.update');
	Route::delete('portfolio-category/{id}', 'ApiController@portfolioCategoryDestroy')->name('category.portfolio.destroy');

	Route::get('portfolio-tag', 'ApiController@portfolioTagIndex')->name('tag.portfolio.index');
	Route::post('portfolio-tag', 'ApiController@portfolioTagStore')->name('tag.portfolio.store');
	Route::put('portfolio-tag', 'ApiController@portfolioTagStore')->name('tag.portfolio.update');
	Route::delete('portfolio-tag/{id}', 'ApiController@aportfolioTagDestroy')->name('tag.portfolio.destroy');

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
	Route::get('setting', 'ApiController@settingIndex')->name('setting.index');
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
});
