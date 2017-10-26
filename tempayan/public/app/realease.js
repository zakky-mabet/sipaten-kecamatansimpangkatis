var converter = new showdown.Converter();

$(document).ready( function() 
{
	$.get('https://api.github.com/repos/nitinegoro/sipaten/releases', function(data) 
	{
		var content = '';

		$.each( data, function( key, value ) 
		{
			var date = new Date( value.created_at ); 

			content += '<li><span>' + value.name + '</span><br>';
			content += '<div class="time-release">Diterbitkan ' + jQuery.timeago( date ) + '</div>';
			content += '<div class="body-release">' + converter.makeHtml(value.body) + '</body></li>';
                     
		});

		$('ul#release-list').html( content );
	})
});
