/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS,
*/

jQuery(function($) {

	$('.get-delete-employee').click( function() {
		$('#modal-delete-employee').modal('show');
		$('a#btn-delete').attr('href', base_url + '/employee/delete/' + $(this).data('id'));
	});

	// Delete Multiple User
	$('.get-delete-employee-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-employee-multiple').modal('show');
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

	$('.set-akses').click( function() 
	{
		var pegawai = $(this).data('id');

		$('input[name="pegawai"]').val(pegawai);

		$('#modal-set-akses').modal('show');
	});
	
});