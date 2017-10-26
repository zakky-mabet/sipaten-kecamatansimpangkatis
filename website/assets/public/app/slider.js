/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
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
    * Modal Delete 
    */
    $('#get-delete-data_pembangunan').click( function() 
    {
        $('#modal-delete-pembangunan').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/data_pembangunan/delete/' + $(this).data('id'));
    });



    /*!
    * Modal Delete 
    */
    $('#get-delete-kontak').click( function() 
    {
        $('#modal-delete-kontak').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/kontak/delete/' + $(this).data('id'));
    });


    /*!
    * Modal Delete 
    */
    $('#get-delete-data').click( function() 
    {
        $('#modal-delete-data').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/data/delete/' + $(this).data('id'));
    });


     /*!
    * Modal Delete 
    */
    $('#get-delete-events').click( function() 
    {
        $('#modal-delete-events').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/events/delete/' + $(this).data('id'));
    });
    

   

    /*!
    * Modal Delete 
    */
    $('.get-delete-slider').click( function() 
    {
        $('#modal-delete-slider').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/slider/delete/' + $(this).data('id'));
    });


        /*!
    * Modal Delete 
    */
    $('.get-delete-kelurahan').click( function() 
    {
        $('#modal-delete-kelurahan').modal('show');

        $('a#btn-delete').attr('href', base_url + '/administrator/kelurahan/delete/' + $(this).data('id'));
    });

        // Delete Multiple 
    $('.get-delete-slider-multiple').click( function() {
        if( $('input[type=checkbox]').is(':checked') != '' ) 
        {
            $('#modal-delete-slider-multiple').modal('show');
        } else {
            $.notify({
                icon: 'fa fa-warning',
                message: "Tidak ada data yang dipilih."
            },{
                type: 'warning',
                allow_dismiss: true,
                delay:9000,
                    placement: {
                from: "top",
                    align: "right"
                },
            }); 
        }
    });

        // Delete Multiple 
    $('.get-delete-profil-multiple').click( function() {
        if( $('input[type=checkbox]').is(':checked') != '' ) 
        {
            $('div#modal-delete-profil-multiple').modal('show');
        } else {
            $.notify({
                icon: 'fa fa-warning',
                message: "Tidak ada data yang dipilih."
            },{
                type: 'warning',
                allow_dismiss: true,
                delay:9000,
                    placement: {
                from: "top",
                    align: "right"
                },
            }); 
        }
    });


});

