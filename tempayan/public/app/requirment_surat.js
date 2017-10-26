/*!
* @author Vicky Nitinrgoro <pkpvicky@gmail.com>
* @package Jquery, Bootstraps JS, Tautocomplete, Bootstrap Notify
*/

$(document).ready(function () {
    var input_cari_nik = $("#cari-nik").tautocomplete({
        width: "700px",
        columns: ['NIK', 'NAMA', 'JNS KELAMIN','ALAMAT'],
        norecord: "NIK atau Nama tidak ditemukan!",
        placeholder: "Cari NIK / Nama penduduk ..",
        ajax: {
            url: base_url + "/create_surat/penduduk",
            type: "GET",
            data: function () {
                return [{ test: input_cari_nik.searchdata() }];
            },
            success: function (data) {
                            
                var filterData = [];

                var searchData = eval("/" + input_cari_nik.searchdata() + "/gi");

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
        onchange: function () {

            $("#cari-nik").attr('placeholder', input_cari_nik.text());

            $('input[name="nik"]').val(input_cari_nik.text());

            $('input[name="ID"]').val(input_cari_nik.id());

            select_penduduk(input_cari_nik.id());
        }
    });


    /*!
    * Checklis Syarat Surat
    */
    $('input#log_surat_check').click( function() 
    {
        var param = $('input[name="ID"]').val();

        var category = $('input[name="kategori-surat"]').val();

        if($("#cari-nik").val() === '')
        {
            $.notify({
                title: '<strong><i class="fa fa-warning"></i> Perhatian!</strong><br>',
                message: "Mohon Masukkan NIK penduduk!"
            },{ 
                type: 'warning',
                offset: 80,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
            });

            $(this).removeAttr('checked');
        } else {
            console.log( $(this).is(':checked'));
            var form_asal  = $("#form-insert-requirement");
            
            var form    = getFormData(form_asal);

            var param = $('input[name="ID"]').val();

            var category = $('input[name="kategori-surat"]').val();

            if( $(this).is(':checked') === true ) 
            {
                $.post( base_url + "/create_surat/insert_log_surat", form, function( data ) 
                {
                    if(data.status === true)
                    {
                        $('div#dialog-lanjutkan').modal('show');

                        $('a#button-lanjutkan').attr('href', base_url + '/create_surat/create/' + category + '/' + param);
                    } 
                });
            }
        }
    });

    /*!
    * Button Save Histori
    */
    $('button#button-reset').click( function() 
    {
        if($("#cari-nik").val() === '')
        {
            $.notify({
                title: '<strong><i class="fa fa-warning"></i> Perhatian!</strong><br>',
                message: "Mohon Masukkan NIK penduduk, dan Persyaratan penerbitan surat!"
            },{ 
                type: 'warning',
                offset: 80,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounceOut'
                },
                placement: {
                    from: "top",
                    align: "center"
                },
            });
        } else {
            $('div#dialog-delete-history').modal('show');

            var param = $('input[name="nik"]').val();

            var category = $('input[name="kategori-surat"]').val();

            $('a#button-delete-history').attr('href', base_url + '/create_surat/delete_history/' + param + '/' + category);
        }
    });
});

function select_penduduk(param) 
{
    var category = $('input[name="kategori-surat"]').val();

    $.get( base_url + "/create_surat/penduduk/" + param + '?surat=' + category, function( data ) 
    {
        $('td#data-nik').html(data.nik);
        $('td#data-nama').html(data.nama);
        $('td#data-tgl-lahir').html(data.tgl_lahir);
        $('td#data-jns-kelamin').html(data.jns_kelamin);
        $('td#data-alamat').html(data.alamat);

        $('td#data-agama').html(data.agama);
        $('td#data-status-kawin').html(data.status_kawin);
        $('td#data-kewarganegaraan').html(data.kewarganegaraan);

        $.each( data.syarat_surat, function( key, value ) 
        {
            var test = $('input[type="checkbox"].syarat-' + value.id).attr({ 
                checked:true, 
                onClick: 'delete_syarat("'+value.id+'")'
            });
        });

        if(data.status === true)
        {
            $('div#dialog-lanjutkan').modal('show');

            $('a#button-lanjutkan').attr('href', base_url + '/create_surat/create/' + category + '/' + param);
        } else {
            if(data.syarat_surat)
            {
                $.notify({
                    message: data.nama + " sudah pernah datang sebelumnya, lanjutkan proses pengajuan"
                },{ 
                    type: 'info',
                    offset: 80,
                    animate: {
                        enter: 'animated fadIn',
                        exit: 'animated fadeOut'
                    },
                    placement: {
                        from: "top",
                        align: "center"
                    },
                }); 
            }
        }


    });

}

function delete_syarat(param) 
{
    var form_asal  = $("#form-insert-requirement");
            
    var form    = getFormData(form_asal);

    var category = $('input[name="kategori-surat"]').val();

    $.post( base_url + "/create_surat/delete_syarat/" + param, form);
}


(function($) {


})(jQuery);