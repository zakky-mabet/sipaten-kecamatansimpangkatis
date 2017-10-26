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
        element: 'div#block-new-password',
        placement: "top",
	  	animation: true,
	  	container: "body",
	  	backdrop: false,
	  	backdropContainer: 'body',
        title: "1. Ganti Password",
        content: "Ini adalah field untuk mengganti password lama anda dengan yang baru.",
    },
    {
        element: 'div#block-new-password-again',
        placement: "top",
        animation: true,
        container: "body",
        backdrop: false,
        backdropContainer: 'body',
        title: "2. Ulangi Password",
        content: "Ulangi Password baru yang telah anda masukkan",
    },
    {
        element: 'div#block-new-password-old',
        placement: "top",
        animation: true,
        container: "body",
        backdrop: false,
        backdropContainer: 'body',
        title: "3. Masukkan Password lama",
        content: "Masukkan Password lama anda untuk menjamin keamanan data anda.",
    },
    {
        element: 'button#button-simpan',
        placement: "top",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "4. Simpan",
        content: "Klik tombol simpan untun menyimpan perubahan",
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