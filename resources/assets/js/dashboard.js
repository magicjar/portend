/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./dashboard-bootstrap');

window.Vue = require('vue');
window.Dropzone = require('dropzone');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('avatar-component', require('./components/Avatar.vue'));
Vue.component('articleindex-component', require('./components/ArticleIndex.vue'));
Vue.component('articlecreate-component', require('./components/ArticleCreate.vue'));
Vue.component('media-component', require('./components/Media.vue'));
Vue.component('skill-component', require('./components/Skill.vue'));
Vue.component('education-component', require('./components/Education.vue'));
Vue.component('experience-component', require('./components/Experience.vue'));
Vue.component('testimonial-component', require('./components/Testimonial.vue'));
Vue.component('mediamodal-component', require('./components/MediaModal.vue'));
Vue.component('category-component', require('./components/Category.vue'));
Vue.component('tag-component', require('./components/Tag.vue'));
Vue.component('portfolioindex-component', require('./components/PortfolioIndex.vue'));
Vue.component('portfoliocreate-component', require('./components/PortfolioCreate.vue'));
Vue.component('portfoliomedia-component', require('./components/PortfolioMedia.vue'));

let baseUrl = document.head.querySelector('meta[name="base-url"]');

Vue.prototype.$baseUrl = baseUrl.content;

Vue.filter('truncate', (text, stop, clamp) => {
	return text.slice(0, stop) + (stop < text.length ? clamp || '...' : '')
})

export const bus = new Vue();

const app = new Vue({
    el: '#app'
});


/**
 * Custom Javascript
 *
 *
 */

// Collapse sidebar and active state
$(function () {
	'use strict'

	if($('.sidebar .nav-link').hasClass('active')){
	    $('.active').siblings('.collapse').addClass('show');
	    $('.active').removeClass('collapsed');
	};

	$('[data-toggle="offcanvas"], .overlay').on('click', function () {
		$('.sidebar').toggleClass('collapse show');
		$('.overlay').toggleClass('fade show d-block');
	})

	feather.replace();
});