route_create = base_url + '/company/route/create';
route_show = base_url + '/company/route/show/';
route_update = base_url + '/company/route/update/';
route_delete = base_url + '/company/route/delete/';
route_multiple_delete = base_url + '/company/route/delete_in/';

// $(document).ready(function() {
//     $('#routeTable').DataTable( {
//         order: [],
//         columnDefs: [
//             { 
//                 "targets": [ 0, 1, 6 ],
//                 "orderable": false,
//             }
//         ],
//     });
// });

(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
    .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()

$('.time_start').clockTimePicker();
$('.time_end').clockTimePicker();
// $('.time_start').clockTimePicker({
//     duration: true,
//     durationNegative: true,
//     precision: 5,
//     i18n: {
//         cancelButton: 'Abbrechen'
//     },
//     onAdjust: function(newVal, oldVal) {
//         //...
//     }
// });

function inserttoform(response){
    $('#pulau_asal').val(response.trackingnesia.pulau_asal);
    pelabuhanAsalByPulau(response);
    $('#name').val(response.trackingnesia.name);
    $('#distance').val(response.trackingnesia.distance);
    check_orUncheck_active(response.trackingnesia.active);
}


$('#pulau_asal').on('change', function() {
    var pulau_id = $(this).val();
    // alert(pulau_id);
    if (pulau_id=='') {
        // $('#alert_detail_kontrak').html('');
        // $('#alert_detail_kontrak').hide();
        $('#pelabuhan_asal').empty();
        $('#pelabuhan_asal').append("<option selected disabled value=''>Choose...</option>");
    }else{
        $('#pelabuhan_asal').empty();
        $('#pelabuhan_asal').append("<option selected disabled value=''>Choose...</option>");
        $.ajax({
            url: base_url+'/company/pelabuhan/byPulau/'+pulau_id,
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(e) {
                // $('#loader-modal-kontrak').show();
                if(e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            complete: function(){
                // $('#loader-modal-kontrak').hide();
            },
            success: function(response){
                // console.log(response);

                for(index in response.trackingnesia){
                    var 
                    id = response.trackingnesia[index].id,
                    nama = response.trackingnesia[index].name

                    var 
                    a =
                    "<option value="+id+">"+nama+"</option>";
                    $('#pelabuhan_asal').append(a); 
                }

                pulauWhereIn(pulau_id);
            }
        });            
    }
});

function pelabuhanAsalByPulau(responsePulau) {    
    $('#pelabuhan_asal').empty();
    $('#pelabuhan_asal').append("<option selected disabled value=''>Choose...</option>");
    $.ajax({
        url: base_url+'/company/pelabuhan/byPulau/'+responsePulau.trackingnesia.pulau_asal,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            // $('#loader-modal-kontrak').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            // $('#loader-modal-kontrak').hide();
        },
        success: function(response){
            // console.log(response);

            for(index in response.trackingnesia){
                var 
                id = response.trackingnesia[index].id,
                nama = response.trackingnesia[index].name

                var 
                a =
                "<option value="+id+">"+nama+"</option>";
                $('#pelabuhan_asal').append(a); 
            }

            $('#pelabuhan_asal').val(responsePulau.trackingnesia.from_id);

            pulauTujuan_WhereIn(responsePulau);
        }
    });
}

function pulauWhereIn(id) {
    $.ajax({
        url: base_url+'/company/pulau/NotIn/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            // $('#loader-modal-kontrak').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            // $('#loader-modal-kontrak').hide();
        },
        success: function(response){
            // console.log(response);

            $('#pulau_tujuan').empty();
            $('#pulau_tujuan').append("<option selected disabled value=''>Choose...</option>");

            for(index in response.trackingnesia.data){
                var 
                id = response.trackingnesia.data[index].id,
                nama = response.trackingnesia.data[index].name

                var 
                a =
                "<option value="+id+">"+nama+"</option>";
                $('#pulau_tujuan').append(a); 
            }
        }
    });
}


function pulauTujuan_WhereIn(responsePulau) {
    $.ajax({
        url: base_url+'/company/pulau/NotIn/'+responsePulau.trackingnesia.pulau_asal,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            // $('#loader-modal-kontrak').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            // $('#loader-modal-kontrak').hide();
        },
        success: function(response){
            // console.log(response);

            $('#pulau_tujuan').empty();
            $('#pulau_tujuan').append("<option selected disabled value=''>Choose...</option>");

            for(index in response.trackingnesia.data){
                var 
                id = response.trackingnesia.data[index].id,
                nama = response.trackingnesia.data[index].name

                var 
                a =
                "<option value="+id+">"+nama+"</option>";
                $('#pulau_tujuan').append(a); 
            }

            $('#pulau_tujuan').val(responsePulau.trackingnesia.pulau_tujuan);

            pelabuhanTujuanByPulau(responsePulau);
        }
    });
}


function pelabuhanTujuanByPulau(responsePulau) {    
    $('#pelabuhan_tujuan').empty();
    $('#pelabuhan_tujuan').append("<option selected disabled value=''>Choose...</option>");
    $.ajax({
        url: base_url+'/company/pelabuhan/byPulau/'+responsePulau.trackingnesia.pulau_tujuan,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            // $('#loader-modal-kontrak').show();
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            // $('#loader-modal-kontrak').hide();
        },
        success: function(response){
            // console.log(response);

            for(index in response.trackingnesia){
                var 
                id = response.trackingnesia[index].id,
                nama = response.trackingnesia[index].name

                var 
                a =
                "<option value="+id+">"+nama+"</option>";
                $('#pelabuhan_tujuan').append(a); 
            }

            $('#pelabuhan_tujuan').val(responsePulau.trackingnesia.to_id);
        }
    });
}


$('#pulau_tujuan').on('change', function() {
    var pulau_id = $(this).val();
    // alert(pulau_id);
    if (pulau_id=='') {
        $('#pelabuhan_tujuan').empty();
        $('#pelabuhan_tujuan').append("<option selected disabled value=''>Choose...</option>");
    }else{
        $('#pelabuhan_tujuan').empty();
        $('#pelabuhan_tujuan').append("<option selected disabled value=''>Choose...</option>");
        $.ajax({
            url: base_url+'/company/pelabuhan/byPulau/'+pulau_id,
            type: 'GET',
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function(e) {
                // $('#loader-modal-kontrak').show();
                if(e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=UTF-8')
                }
            },
            complete: function(){
                // $('#loader-modal-kontrak').hide();
            },
            success: function(response){
                // console.log(response);

                for(index in response.trackingnesia){
                    var 
                    id = response.trackingnesia[index].id,
                    nama = response.trackingnesia[index].name

                    var 
                    a =
                    "<option value="+id+">"+nama+"</option>";
                    $('#pelabuhan_tujuan').append(a); 
                }
            }
        });            
    }
});