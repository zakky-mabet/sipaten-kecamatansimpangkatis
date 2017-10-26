/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    	event.preventDefault();
    	$(this).ekkoLightbox();
	});

});