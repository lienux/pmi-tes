// setTimeout(function() {
//     $('.alert').fadeOut('fast');
// }, 5000);

function clear_form(){
    $('input').val('');
    clear_input_form();
}

// function modal_create(){
//     kode_pasien();
//     $('#btn_submit').attr('onClick','do_create()');
//     $('#modal_input').modal('show');
//     // $('#form_input input').val('');
//     $('#check_active').prop('checked', true);
//     element_active();
//     // pp_active();
//     // $('#user').val('').change();
//     // $('#stop').val('').change();
//     // $('#operator').val('').change();
// }

function kode_pasien(){
    const d1 = new Date();
    // console.log(d1);

    // converting to number
    const result = d1.getTime();
    // console.log(result);

    $('#kode_pasien').val(result);
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

// function element_active()
// {
//     if ($('#check_active').is(':checked')) {
//         $('#active_element').html('<input type="hidden" name="active" value="1">');
//         // $('#active').val(1);
//     }else{
//         // $('#active').val(0);
//         $('#active_element').html('<input type="hidden" name="active" value="0">');
//     }
// }

function pp_active()
{
    if ($('#check_pp').is(':checked')) {
        $('#pp_element').html('<input type="hidden" name="pp" value="1">');
    }else{
        $('#pp_element').html('<input type="hidden" name="pp" value="0">');
    }
}

function check_orUncheck_active(id)
{
    if (id==1) {
        $('#check_active').prop('checked', true);
        $('#active_element').html('<input type="hidden" name="active" value="1">');
    }else{
        $('#check_active').prop('checked', false);
        $('#active_element').html('<input type="hidden" name="active" value="0">');
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