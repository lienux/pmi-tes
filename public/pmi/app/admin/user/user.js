$(document).ready(function() {
    $('#userTable').DataTable( {
        order: [],
        columnDefs: [
            { 
                "targets": [ 0,5 ],
                "orderable": false,
            }
        ],
    });
});

// function modal_create(){
//     $('#btn_submit').attr('onClick','do_create()');
//     $('#modal_input').modal('show');
//     $('#form_input input').val('');
// }

// function modal_edit(id){
//     $('#btn_submit').attr('onClick','do_update('+id+')');
//     $('#modal_input').modal('show');
//     show(id);
// }

// function modal_delete(id)
// {
//     $('#modal_confirmation').modal('show');
//     $('#btn_delete').attr('onClick','do_delete('+id+');');

//     // $.ajax({
//     //     url: base_url + 'vehicle/get/'+id,
//     //     type: 'GET',
//     //     dataType: 'JSON',
//     //     contentType: false,
//     //     processData: false,        
//     //     success: function(response){
//     //         // console.log(response);
//     //         var nama = response.ngajingoding[0].kode_bus
//     //         // $('#telp').val(response.ngajingoding[0].telp);
//     //         // $('#sim').val(response.ngajingoding[0].no_sim);
//     //         // $('#masa_sim').val(response.ngajingoding[0].masa_sim);

//     //         $('#data_untuk_hapus').html(nama);
//     //     }
//     // });
// }

// function modal_delete_check()
// {
//     $('#modal_confirmation').modal('show');
//     $('#btn_delete').attr('onClick','do_delete_check();');
// }

$('#row_parent').hide();
function sh_parent()
{
    if ($('#level').val()==2 || $('#level').val()==3) {
        $('#row_parent').show();
    }else{
        $('#row_parent').hide();
    }
}


function show(id){
    $.ajax({
        url: base_url+'/admin/api/user/show/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);            

            $('#name').val(response.trackingnesia.name);
            $('#email').val(response.trackingnesia.email);
            $('#level').val(response.trackingnesia.level_id).change();
            $('#parent').val(response.trackingnesia.parent).change();
            $('#status').val(response.trackingnesia.status).change();
            $('form').attr('action', base_url+'/admin/api/user/update/'+id);
            if (response.trackingnesia.level_id==2 || response.trackingnesia.level_id==3) {
                $('#row_parent').show();
            }else{
                $('#row_parent').hide();
            }
            check_orUncheck_active(response.trackingnesia.active);
            // $('#foto').attr('src', base_url+'/assets/img/'+response.trackingnesia[0].foto);
        }
    });
};

function do_create(){
    element_active();    
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = base_url + '/admin/api/user/create';
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
            // console.log(response);
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


function do_update(id){
    element_active();
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = base_url + '/admin/api/user/update/'+id;
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
            // console.log(response);
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
    var urlData = base_url + '/admin/api/user/delete/'+id;
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
    var checkedIds = $(".checkbox_users:checked").map(function() {
        return this.id;
    }).toArray();
    var urlData = base_url + '/admin/api/user/delete_in/'+checkedIds;
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