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
        element: 'div#blok-cari-surat',
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Blok Pencarian Surat",
        content: "Cari rekam jejak sebuah surat dengan memasukkan Nomor Surat.",
    },
    {
        element: 'div#timeline',
        placement: "right",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "Garis Waktu",
        content: "Histori pembuatan surat mulai dari PATEN hingga sampai pada petugas verifikasi.",
    },
    {
        element: 'table.blok-dokumen',
        placement: "left",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "Infomasi Dokumen",
        content: "Detail Infomasi Dokumen dan Respon masyarakat terhadap pelayanan.",
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