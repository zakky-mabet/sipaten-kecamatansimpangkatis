/*!
* @author 	: Vicky Nitinegoro <pkpvicky@gmail.com>
* @package 	: Jquery, Bootstraps JS, Tautocomplete, Bootstrap Notify, Datatables
*/
$(document).ready(function () {

	$('input#generate-bilangan').keyup( function() 
	{
	     $.post( base_url + '/surat_keluar/generate_bilangan/', { angka: $(this).val() }, function(bilangan) 
	     {
	     	if(bilangan != false)
	     		$('i#return-terbilang').html("Kurang lebih " + bilangan + " Meter Persegi");
	     });
	});

    var cari_pengikut = $("#cari-pengikut").tautocomplete({
        width: "700px",
        columns: ['NIK', 'NAMA', 'JNS KELAMIN','ALAMAT'],
        norecord: "NIK atau Nama tidak ditemukan!",
        placeholder: "Cari NIK / Nama penduduk ..",
        ajax: {
            url: base_url + "/create_surat/penduduk",
            type: "GET",
            data: function () {
                return [{ test: cari_pengikut.searchdata() }];
            },
            success: function (data) {
                            
                var filterData = [];

                var searchData = eval("/" + cari_pengikut.searchdata() + "/gi");

                $.each(data, function (i, v) {
                    if (v.nik.search(new RegExp(searchData)) != -1) {
                        filterData.push(v);
                    }
                    if (v.nama.search(new RegExp(searchData)) != -1) {
                        filterData.push(v);
                    }
                });
                return filterData;
            }
        },
        onchange: function () 
        {	
			$.get( base_url + '/penduduk/get/' + cari_pengikut.id(), function(data) 
			{
			    $('div#modal-input-status-hubungan').modal('show');

			    $('span#nama-pengikut').html(data.nama + ' (' + data.nik + ')');
			    
			    document.getElementById('status-pengikut').focus();
			    
			    $("form#form-input-status").submit( function(event) 
			    {
			    	event.preventDefault();

				  	var $form = $( this ),
				    	set_status = $form.find("input[name='status']").val();

				    $.post( base_url + '/create_surat/add_pengikut/', { 
				    	id: cari_pengikut.id(), 
				    	nama : data.nama,
				    	jns_kelamin : data.jns_kelamin,
						tmp_tgl_lahir : data.tmp_tgl_lahir,
						nik : data.nik,
				    	status: set_status 
				    } ).done(function( response )  {
				  		$('div#modal-input-status-hubungan').modal('hide');

				    	table_items.ajax.reload();
				  	});
			    });
			});
        }
    });

    /*!
    * Get Data Pengikut
    */
    var url = ( $('#data-pengikut').data('type') === 'create' ) ? '/create_surat' : '/surat_keluar',
   	table_items = $('#data-pengikut').DataTable({ 
        "processing": true, 
        "paging": false,
        "ordering": false,
        "info": false,
        "bInfo": false,
        "searching": false,
        "ajax": {
           "url": base_url + url + "/get_pengikut/" + $('#data-pengikut').data('id'),
       	},
	  	"columns": [
	  		{ className: "text-center"}, 
	  		null,
	  		{ width:'170' },
	  		null,
	  		{ className: "text-center", width:'150' },
	  		{ className: "text-center", width:'90' }
	  	],
   	});

   	/*!
	* Delete Data Pengikut
   	*/
   	$('#data-pengikut tbody').on( 'click', 'a.show-pengikut', function () 
    {
    	var param = $(this).data('id');

		$.get( base_url + '/create_surat/remove_pengikut/' + param, function(data) 
		{
			table_items.ajax.reload();
		});    	
    }).on( 'click', 'a.delete-pengikut', function () {
    	var param = $(this).data('id')
    		key = $(this).data('key');

		$.get( base_url + '/surat_keluar/remove_pengikut/' + param + '/' + key, function(data) 
		{
			table_items.ajax.reload();
		});    	
    });
});


