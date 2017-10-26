document.addEventListener('DOMContentLoaded', function () 
{
  	if ( ! Notification ) {
    	alert('Sistem TEMPAYAN ini memerlukan notifikasi, mohon aktifkan fitur notifikasi browser anda.'); 
    	return;
  	}

  	if (Notification.permission !== "granted")
    	Notification.requestPermission();
});

/* AUDIO */
var source = base_path + "/sound/arpeggio.mp3";

var audio = document.createElement("audio");

audio.load()

audio.addEventListener("load", function() {
  audio.play();
}, true);

audio.src = source;

/* Notifikasi */

var pusher = new Pusher('1a905dd0d0ea1304adbd');

var socketId = null;

var create_surat = pusher.subscribe(my_channel);

var verifikasi = pusher.subscribe('create_surat');


create_surat.bind('notifikasi-buat-surat', function(data) {

	audio.play();

	Push.create('Pemberitahuan TEMPAYAN!', {
		body: data.message,
		icon: data.icon,
		onClick: function () {
			window.location.assign(data.target_url);
			this.close();
		}
	});
});



create_surat.bind('notifikasi-status', function(data) {

	audio.play();

	Push.create('Pemberitahuan TEMPAYAN!', {
		title:"TEMPAYAN",
		body: data.message,
		icon: data.icon,
		onClick: function () {
			window.location.assign(base_url + '/surat_keluar/get/' + data.param);
			this.close();
		}
	});
});