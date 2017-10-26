/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$('.get-delete-desa').click( function() {
		$('#modal-delete-desa').modal('show');
		$('a#btn-delete').attr('href', base_url + '/desa/delete/' + $(this).data('id'));
	});

	// Delete Multiple User
	$('.get-delete-desa-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-desa-multiple').modal('show');
		} else {
			$.notify({
				icon: 'fa fa-warning',
				message: "Tidak ada data yang dipilih."
			},{
				type: 'warning',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		}
	});
	
});