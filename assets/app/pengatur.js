/*!
* @author Teitra Mega Team <teitramega@gmail.com>
* @package Jquery, Bootstraps JS,
*/


$(function () {

    $('table').tableCheckbox({
        selectedRowClass: 'warning',
        checkboxSelector: 'td:first-of-type input[type="checkbox"],th:first-of-type input[type="checkbox"]',
        isChecked: function($checkbox) {
            return $checkbox.is(':checked');
        }
    });
    
	 $('[data-toggle="tooltip"]').tooltip(); 
});


 setTimeout(function () {
     $('.alert').remove();
 }, 4500);


jQuery(function($) {

    /*!
    * Jquery time ago
    */
    jQuery("time.timeago").timeago();


    /*!
    * Ekko Light-box
    */
    $(document).on('click', '[data-toggle="lightbox"]', function(event) 
    {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
    

    /*!
    * Modal Delete Pengguna
    */
    $('.get-delete-penguna').click( function() 
    {
        $('#modal-delete-penguna').modal('show');

        $('a#btn-delete').attr('href', base_url + '/pengaturan/delete/' + $(this).data('id'));
    });

    /*!
    * Modal Delete Penduduk
    */
    $('.get-delete-penduduk').click( function() 
    {
        $('#modal-delete-penduduk').modal('show');

        $('a#btn-delete').attr('href', base_url + '/penduduk/delete/' + $(this).data('id'));
    });
});