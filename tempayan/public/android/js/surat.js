


$(document).ready( function() 
{
  $('.modal-dialog').modal({
      	dismissible: true, 
      	opacity: .5, 
      	inDuration: 300, 
      	outDuration: 200,
      	startingTop: '4%', 
      	endingTop: '10%', 
      	ready: function(modal, trigger) { 
      		var status = $(trigger).data('status');

      		if(status === 'approve')
      		{
      			$('h5#get-heading').html( "Verifikasi pengajuan surat ini?" );
      		} else {
      			$('h5#get-heading').html( "Tolak pengajuan surat ini?" );
      		}

      		$('a#set-button').attr('href', base_url + "/surat/set/" + $(trigger).data('id') + "/" + status );
      	}
    });


});