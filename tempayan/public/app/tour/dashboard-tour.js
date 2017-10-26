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
        element: "aside.main-sidebar",
        placement: "right",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Navigasi Utama",
        content: "Menu Navigasi Utama Pada sistem",
    },
    {
        element: "div#block-stats-penduduk",
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Jumlah Penduduk",
        content: "Ini adalah jumlah keseluruhan penduduk dalam database",
    },
    {
        element: "div#block-stats-desa",
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Jumlah Desa / Kelurahan",
        content: "Ini adalah jumlah keseluruhan Desa / Kelurahan pada kecamatan Koba",
    },
    {
        element: "div#block-stats-surat-keluar",
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Jumlah Dokumen Surat Keluar",
        content: "Ini adalah jumlah Dokumen Surat Keluar pada database",
    },
     {
        element: "div#block-stats-pengguna-sistem",
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Jumlah Pengguna Sistem",
        content: "Ini adalah jumlah pengguna sistem",
    },
     {
        element: "div#block-tombol-surat-keterangan",
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Shortcut Surat Keterangan",
        content: "Anda dapat membuat pengajuan surat Keterangan melalui beberapa shorcut ini",
    },
     {
        element: "div#block-tombol-surat-perizinan",
        placement: "bottom",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Shortcut Surat perizinan",
        content: "Anda dapat membuat pengajuan surat Perizinan melalui beberapa shorcut ini",
    },
     {
        element: "div.block-chart-surat-keluar",
        placement: "top",
	  	animation: true,
	  	container: "body",
	  	backdrop: true,
	  	backdropContainer: 'body',
        title: "Grafik Data Surat Keluar",
        content: "Data ini dibuat secara otomatis melalui data dokumen surat keluar.",
    },
     {
        element: ".date-time",
        placement: "top",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "Filter Tanggal",
        content: "Anda dapat memfilter tanggal mulai hingga batas tanggal yang ditentukan.",
    },
     {
        element: "#tombol-filter",
        placement: "top",
        animation: true,
        container: "body",
        backdrop: true,
        backdropContainer: 'body',
        title: "Filter Tanggal",
        content: "Kemudian Klik tombol filter, dan Tombol reset untuk kembali ke setingan awal yaitu 1 minggu terakhir.",
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