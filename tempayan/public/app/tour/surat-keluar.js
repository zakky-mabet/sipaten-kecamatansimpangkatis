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
        element: 'div#blok-filter',
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Blok Penyaringan",
        content: "Gunakan berbagai penyaringan data berikut untuk memudahkan pencarian data yang anda inginkan. Kemudian Klik Filter dan Reset untuk kembali.",
    },
    {
        element: 'div#blok-show-page',
        placement: "top",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "Jumlah Tampilan",
        content: "Anda juga bisa menentukan berapa banyak data yang akan ditampilkan.",
    },
    {
        element: 'div#blok-output',
        placement: "top",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "Format Keluaran",
        content: "Gunakan Tombol berikut untuk format laporan yang anda inginkan.",
    }
    ]);
 
    // Initialize the tour
    tour.init();
 
 	$('a#get-tour').click( function() 
 	{
	    // Start the tour
	    tour.start();
 	})
 
}());