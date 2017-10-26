/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Artyom.js
*/

jQuery(function($) {

	$('button.get-speech').click( function() 
	{
		audio_speech($('textarea[name="option[audio_speech]"]').val());
	})
});


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