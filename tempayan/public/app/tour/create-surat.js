/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Bootstrap Tour JS
*/



(function(){
    var tour = new Tour({
        storage : false
    });
 
    tour.addSteps([
    {
        element: 'div#blok-cari-nik',
        placement: "top",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "1. Cari NIK / Nama . . .",
        content: "Cari NIK pemohon kemudian Klik syarat-syarat dibawah.",
    },
    {
        element: 'table#table-pemohon',
        placement: "top",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "2. Informasi Pemohon",
        content: "Pastikan data pemohon yang anda pilih benar dengan melihat informasi berikut",
    },
    ]);
 
    // Initialize the tour
    tour.init();
 
 	$('a#get-tour').click( function() 
 	{
	    // Start the tour
	    tour.start();
 	})
 
}());