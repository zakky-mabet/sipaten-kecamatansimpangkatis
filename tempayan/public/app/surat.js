/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$('#select-syarat').select2();

	$('.get-delete-surat').click( function() {
		$('#modal-delete-surat').modal('show');
		$('a#btn-delete').attr('href', base_url + '/surat/delete/' + $(this).data('id'));
	});

	// Delete Multiple User
	$('.get-delete-surat-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-surat-multiple').modal('show');
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


	// pass in your custom templates on init
//	$('#text-editor').wysihtml5();
});