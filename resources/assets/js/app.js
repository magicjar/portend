
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.Dropzone = require('dropzone')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('about-component', require('./components/About.vue'));
Vue.component('articleindex-component', require('./components/ArticleIndex.vue'));
Vue.component('articlecreate-component', require('./components/ArticleCreate.vue'));
Vue.component('skill-component', require('./components/Skill.vue'));
Vue.component('education-component', require('./components/Education.vue'));
Vue.component('experience-component', require('./components/Experience.vue'));
Vue.component('testimonial-component', require('./components/Testimonial.vue'));
Vue.component('mediamodal-component', require('./components/MediaModal.vue'));
Vue.component('category-component', require('./components/Category.vue'));
Vue.component('tag-component', require('./components/Tag.vue'));
Vue.component('portfoliocreate-component', require('./components/PortfolioCreate'));
Vue.component('portfoliomedia-component', require('./components/PortfolioMedia'));

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
if($('.sidebar .nav-link').hasClass('active')){
    $('.active').siblings('.collapse').addClass('show');
};

$(function () {
	'use strict'

	$('[data-toggle="offcanvas"]').on('click', function () {
		$('.sidebar').toggleClass('collapse show')
	})
})