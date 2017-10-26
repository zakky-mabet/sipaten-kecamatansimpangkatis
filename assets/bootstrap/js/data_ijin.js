$.get(base_url + '/utama/get_prosedur_ijin', function(response) 
{
	if(response.status)
	{
		var data = response.data;
		$('a#title-1').html(data.title);
		$('div#body-1').html(data.description);

	}

});



