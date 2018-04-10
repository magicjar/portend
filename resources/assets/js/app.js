require('./app-bootstrap');


/**
 * Custom Javascript
 *
 *
 */

// Collapse sidebar and active state
$(function () {
	'use strict'

	feather.replace();

	if($('.sidebar .nav-link').hasClass('active')){
	    $('.active').siblings('.collapse').addClass('show');
	};

	$('[data-toggle="offcanvas"]').on('click', function () {
		$('.sidebar').toggleClass('collapse show')
	})
});