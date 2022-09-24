function modal_create(){
    $('#btn_submit').attr('onClick','do_create()');
    $('#modal_input').modal('show');
    $('#form_input input').val('');
    $('#check_active').prop('checked', true);
    $('#user').val('').change();
    $('#stop').val('').change();
    $('#operator').val('').change();
}

function modal_edit(id){
    $('#btn_submit').attr('onClick','do_update('+id+')');
    $('#modal_input').modal('show');
    show(id);
}

function modal_delete(id)
{
    $('#modal_confirmation').modal('show');
    $('#btn_delete').attr('onClick','do_delete('+id+');');
}

function modal_delete_check()
{
    $('#modal_confirmation').modal('show');
    $('#btn_delete').attr('onClick','do_delete_check();');
}

function active_checked()
{
    if ($('#check_active').is(':checked')) {
        $('#active').val(1);
    }else{
        $('#active').val(0);
    }
}

function element_active()
{
    if ($('#check_active').is(':checked')) {
        $('#active_element').html('<input type="hidden" name="active" value="1">');
        // $('#active').val(1);
    }else{
        // $('#active').val(0);
        $('#active_element').html('<input type="hidden" name="active" value="0">');
    }
}

function check_orUncheck_active(id)
{
    if (id==1) {
        $('#check_active').prop('checked', true);
    }else{
        $('#check_active').prop('checked', false);
    }
}

// function detail_baris(id)
// {
//     var element = $('#baris'+id);
//     if (element.is(":hidden")) {
//         $('.baris_hide').hide();
//         element.show();
//     }else{
//         element.hide();
//     }
// }


function create_()
{

}

function update_($id)
{
    
}


function delete_($id)
{
    
}

function delete_mulitple()
{
    
}