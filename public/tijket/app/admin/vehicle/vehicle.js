$(document).ready(function() {
    $('#vehicleTable').DataTable( {
        pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
        order: [],
        columnDefs: [
            { 
                "targets": [ 0, 1, 8 ],
                "orderable": false,
            }
        ],
    });
});

function show(id){
    $.ajax({
        url: base_url+'/admin/api/vehicle/show/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);            
            // var id = response.trackingnesia[0].id;

            $('#kode_bus').val(response.trackingnesia.kode_bus);
            $('#user').val(response.trackingnesia.user_id);
            $('#nopol').val(response.trackingnesia.nopol);
            $('#thn_produksi').val(response.trackingnesia.thn_produksi);
            $('#merk_tipe').val(response.trackingnesia.merk_tipe);
            $('#no_rangka').val(response.trackingnesia.no_rangka);
            $('#no_stnk').val(response.trackingnesia.no_stnk);
            $('#masa_stnk').val(response.trackingnesia.masa_stnk);
            $('#no_kir').val(response.trackingnesia.no_kir);
            $('#masa_kir').val(response.trackingnesia.masa_kir);
            $('#bbm').val(response.trackingnesia.bbm);
            $('#status').val(response.trackingnesia.status).change();
            $('#jml_seat').val(response.trackingnesia.jml_seat);
            $('#foto').val(response.trackingnesia.foto);            
            $('#user').val(JSON.parse(response.trackingnesia.users)).change();

            // $('form').attr('action', base_url+'/admin/api/vehicle/update/'+id);
            // $('#foto').attr('src', base_url+'/assets/img/'+response.trackingnesia[0].foto);
        }
    });
};

function do_create(){
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = base_url + '/admin/api/vehicle/create';
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader_input').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader_input').hide();
        },
        success: function(response){
            console.log(response);
            if(response.status == true){
                $('#modal_input').modal('toggle');
                $('#alert').addClass('bg-success');
                $('#alert').html(response.message).fadeIn().delay(2500).fadeOut(
                    function(){
                        location.reload(true);
                    }
                );
            }else{ 
                $('#alert_input').addClass('bg-danger');
                $('#alert_input').html(response.message).fadeIn().delay(3000).fadeOut();
            }
            // alert(response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
    });
};


function do_update(id){
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = base_url + '/admin/api/vehicle/update/'+id;
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader_input').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader_input').hide();
        },
        success: function(response){
            console.log(response);
            if(response.status == true){
                $('#modal_input').modal('toggle');
                $('#alert').addClass('bg-success');
                $('#alert').html(response.message).fadeIn().delay(2500).fadeOut(
                    function(){
                        location.reload(true);
                    }
                );
            }else{ 
                $('#alert_input').addClass('bg-danger');
                $('#alert_input').html(response.message).fadeIn().delay(3000).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function do_delete(id){
    var urlData = base_url + '/admin/api/vehicle/delete/'+id;
    $.ajax({
        type: 'DELETE',
        url: urlData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader_delete').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader_delete').hide();
        },
        success: function(response){
            // console.log(response);
            if(response.status == true){
                $('#modal_confirmation').modal('toggle');
                $('#alert').addClass('bg-success');
                $('#alert').html(response.message).fadeIn().delay(3000).fadeOut(
                    function(){
                        location.reload(true);
                    }
                );
            }else{
                $('#alert').addClass('bg-danger');
                $('#alert').html(response.message).fadeIn().delay(3000).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function do_delete_check(){
    var checkedIds = $(".checkbox_vehicles:checked").map(function() {
        return this.id;
    }).toArray();
    var urlData = base_url + '/admin/api/vehicle/delete_in/'+checkedIds;
    $.ajax({
        type: 'DELETE',
        url: urlData,
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#loader_delete2').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#loader_delete2').hide();
        },
        success: function(response){
            // console.log(response);
            if(response.status == true){
                $('#modal_confirmation').modal('toggle');
                $('#alert').addClass('bg-success');
                $('#alert').html(response.message).fadeIn().delay(3000).fadeOut(
                    function(){
                        location.reload(true);
                    }
                );
            }else{
                $('#alert').addClass('bg-danger');
                $('#alert').html(response.message).fadeIn().delay(3000).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
}