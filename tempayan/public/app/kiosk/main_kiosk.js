/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Artyom JS
*/

jQuery(function($) {

	$('a.get-people-modal').click( function() 
	{
		audio.play();

		var jawaban = $(this).data('answer');

		$.get( base_url + "/get_people_in_day", function(result) 
		{
			$('ul#list-people').html(result);
			
			$('div#select-name').modal('show');

			$('ul#list-people > li').on( 'click', function(oper_jawaban) 
			{
				audio.play();

				var service = $(this).data('service'),
					name 	= $(this).data('name'),
					surat 	= $(this).data('people'),
					answer = jawaban;

				$('div#modal-confirm').modal('show');

				$('strong#name-people').html( name );

				$('strong#name-service').html( service );

				$('button.send-feedback').click( function() 
				{
					$.post( base_url + '/create', {
						answer : answer,
						surat : surat
					}, function(res) {
						if(res.status == true) 
						{
							$('div#select-name, div#modal-confirm').modal('hide');
							audio_speech( textAudio );
							$('div#modal-thank').modal('show');
						}
					});
				});
			}); /* End ul > li */
		}); /* End Get XHR */
	});


	$('button.close, a[data-dismiss="modal"], button.btn').click( function() 
	{
		audio.play();
	});

	$('button.close-thank').click( function() 
	{
		window.location.reload();
	});

	var source = base_path +  "/public/sound/click1.wav";
	var audio = document.createElement("audio");
	audio.load()
	audio.addEventListener("load", function() {
	  audio.play();
	}, true);
	audio.src = source;

	function audio_speech(message) 
	{
	    artyom.initialize({
	        lang:"id-ID",
	        debug:true,
	        continuous:true,
	        listen:false
	    }).then(function(){
	        console.log("Artyom has been correctly initialized");
	    }).catch(function(){
	        console.error("An error occurred during the initialization");
	    });

	    if (artyom.speechSupported()) {

	        var text = message;

	        if (text) 
	        {
	            var lines = text.split("\n").filter(function (e) {
	                return e
	            });
	            var totalLines = lines.length - 1;

	            for (var c = 0; c < lines.length; c++) {
	                var line = lines[c];
	                if (totalLines == c) {
	                    artyom.say(line, {
	                        onEnd: function () {

	                        }
	                    });
	                } else {
	                    artyom.say(line);
	                }
	            }
	        }
	    } else {
	        alert("Your browser cannot talk !");
	    }
	}


});