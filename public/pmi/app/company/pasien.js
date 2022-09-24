route_create = base_url + '/company/pasien/create';
route_show = base_url + '/company/pasien/show/';
route_update = base_url + '/company/pasien/update/';
route_delete = base_url + '/company/pasien/delete/';
route_multiple_delete = base_url + '/company/pasien/delete_in/';

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

$(document).ready(function() {
    $('#dataTable').DataTable();
} );

// (function () {
//     'use strict'

//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.querySelectorAll('.needs-validation')

//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//         form.addEventListener('submit', function (event) {
//             if (!form.checkValidity()) {
//                 event.preventDefault()
//                 event.stopPropagation()
//             }

//             form.classList.add('was-validated')
//         }, false)
//     })
// })()


// Example starter JavaScript for disabling form submissions if there are invalid fields
// (function () {
//     'use strict'

//     // Fetch all the forms we want to apply custom Bootstrap validation styles to
//     var forms = document.querySelectorAll('.needs-validation')

//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//         form.addEventListener('submit', function (event) {
//             if (!form.checkValidity()) {
//                 event.preventDefault()
//                 event.stopPropagation()
//             }

//             form.classList.add('was-validated')
//         }, false)
//     })
// })()

$( function() {
    $( "#tgl_lahir" ).datepicker({
        changeMonth: true,
        changeYear: true,
        showAnim: 'slideDown'
    });
} );

/* CUSTOM JS ARIX Dibuat blur supaya keyboard di mobile tidak tampil*/
function datePick(x) {
    document.activeElement.blur();
}







function inserttoform(response){
    $('#kode_pasien').val(response.pmi.kode_pasien);
    $('#nama').val(response.pmi.nama);
    $('#alamat').html(response.pmi.alamat);
    $('#golongan_darah').val(response.pmi.gol_darah);
    $('#rhesus').val(response.pmi.rhesus);
    $('#kelamin').val(response.pmi.kelamin);
    $('#keluarga').val(response.pmi.keluarga);
    $('#tgl_lahir').val(response.pmi.tgl_lahir);
    $('#telp').val(response.pmi.tlppasien);
    $('#umur').val(response.pmi.umur);
    // check_orUncheck_active(response.pmi.operation_status);
}

    
// //INIT FOR CAR RENT
// function init() {
//     //rent date                        
//     $("#tDate").datepicker({
//         //settings  +1d untuk hari besok
//         startDate: "+1d"
//     })
//     //Time Picker
//     $('input.time-pick').timepicker({
//         minuteStep: 15,
//         showInpunts: false
//     })
//     //Set Default Value Date Picker  +1d untuk hari besok
//     //$('input.date-pick').datepicker('setDate', '+1d');
//     //$('input.date-pick').datepicker('setDate', '8 May 2022');
//     //$('input.date-pick').datepicker('setStartDate', '8 May 2022');
//     $('input.date-pick').datepicker('setDate', '10 Jun 2022');
//     $('input.date-pick').datepicker('setStartDate', '10 Jun 2022');
// }


// START SELECT DATE -----------------------

//Check Return Date cannot prior depart date
// $('#tgl').datepicker({
// });
// $("#check_id").datepicker({
//     //settings  +1d untuk hari besok
//     startDate: "+1d"
//     //setStartDate: "5 May 2022"
// }).on('changeDate', function(ev) {
//     //Get actual date objects from both
//     var dt1 = $('#check_id').data('datepicker').viewDate;
//     var dt2 = $('#check_out').data('datepicker').viewDate;
//     if (dt2 < dt1) {
//         //If #dateEnd is before #dateStart, set #dateEnd to #dateStart
//         $('#check_out').datepicker('update', $('#check_id').val());
//     }
//     //Always limit #dateEnd's starting date to #dateStart's value
//     $('#check_out').datepicker('setStartDate', $('#check_id').val());
// });

// $( function() {
//     $( "#datepicker" ).datepicker("option", "showAnim", "slideDown");
//     // $( "#anim" ).on( "change", function() {
//     //     $( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
//     // });
// } );

// $("#check_out").datepicker({
//     //settings
//     startDate: $('#check_id').val()
// })

//Set Default Value Date Picker  +1d untuk hari besok
//$('input.date-pick').datepicker('setDate', '+1d');
//$('input.date-pick').datepicker('setDate', '8 May 2022');
// $('input.date-pick').datepicker('setStartDate', '8 May 2022');
// $('input.date-pick').datepicker('setDate', '10 Jun 2022');
// $('input.date-pick').datepicker('setStartDate', '10 Jun 2022');



/* disable field return date bila tiket sekali jalan */

// function fieldDisabled(checkbox) {
//     if (document.getElementById("checkbox1").checked == false) {
//         document.getElementById("check_out").setAttribute("disabled", "disabled");
//         document.getElementById("col_check_out").style.display = "none";
//         document.getElementById("div_date").classList.add("col-12");

//     } else {
//         document.getElementById("check_out").removeAttribute("disabled");
//         document.getElementById("col_check_out").style.display = "block";
//         document.getElementById("div_date").classList.remove("col-12");
//         document.getElementById("div_date").classList.add("col-6");
//     }
// }


function checkboxOut(checkbox) {
    if (document.getElementById("checkbox_checkout").checked == true) {
        $('#roundtrip').prop('checked', true);
        document.getElementById("check_out").removeAttribute("disabled");
        $('#check_out').val('');

    } else {
        $('#one_way').prop('checked', true);
        document.getElementById("check_out").setAttribute("disabled", "true");
        $('#check_out').val('disabled');
    }
}

function radio(checkbox) {
    if (document.getElementById("one_way").checked == true) {
        document.getElementById("check_out").setAttribute("disabled", "true");
        $('#checkbox_checkout').prop('checked', false);
        $('#check_out').val('disabled');

    } else {
        document.getElementById("check_out").removeAttribute("disabled");
        $('#checkbox_checkout').prop('checked', true);
        $('#check_out').val('');
    }
}


//END SELECT DATE -----------------------

//Button Pesan Sekarang bayar nanti.
$('#booknow').on('click', function() {
    $('html, body').animate({
        scrollTop: 0
    }, scrollSpeed);
    return false;
});


/* Refresh Page Jika Tombol Back di Tekan */
window.addEventListener("pageshow", function(event) {
    var historyTraversal = event.persisted ||
        (typeof window.performance != "undefined" &&
            window.performance.navigation.type === 2);
    if (historyTraversal) {
        // Handle page restore.
        window.location.reload();
    }
});

function checkOrigin() {
    var ddl = document.getElementById("origin");
    var selectedValue = ddl.options[ddl.selectedIndex].value;
    if (selectedValue == "selectorigin") {
        alert("Pilih Pelabuhan Keberangkatan!");
        return false;
    }
}

function openMap(origin, destination) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("maplink").innerHTML = this.responseText;
            $('#map-port').modal({
                show: true
            });
        }
    };
    xmlhttp.open("GET", "inc/mapRoute.php?origin=" + origin + "&destination=" + destination, true);
    xmlhttp.send();
}







/*!
 * ######################################################
 * SEARCH
 * ######################################################
 * */
function btn_pulau(event,id,name) {
    Cookies.set('from_island', name);
    var target = event.target || event.srcElement;
    var buttonList = document.querySelectorAll(".btnPulau");
    buttonList.forEach(function(button) {
        if (button === target && !button.classList.contains("active")) {
            return button.classList.add("active");
        }
        return button.classList.remove("active");
    });

    $('#pelabuhan, #destination').empty();
    $('#pelabuhan').append("<option selected disabled value=''>Pilih Pelabuhan</option>");          
    $('#destination').append("<option selected disabled value=''>Pilih Tujuan</option>"); 

    $.ajax({
        url: base_url+'/api/ali/pelabuhan/byPulau/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);         
            createList_fromHarbor(response.tijket);
        }
    });
}

function createList_fromHarbor(d) {
    for(index in d){
        var 
        id = d[index].id,
        nama = d[index].name

        var 
        a =
        "<option value="+id+">"+nama+"</option>";
        $('#pelabuhan').append(a); 
    }        
};

function opt_fromHarbor(id) {
    var name = $( ".opt_fromHarbor option:selected" ).text();
    Cookies.set('from_harbor', name)
    // alert($id);
    $('#destination').empty();
    $('#destination').append("<option selected disabled value=''>Pilih Tujuan");

    $.ajax({
        url: base_url+'/api/ali/tujuan/byFrom/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);            
            createList_toHarbor(response.tijket);
        }
    });
}

function opt_toHarbor(id) {
    var island = $('.opt_toHarbor :selected').parent().attr('label');
    var harbor = $( ".opt_toHarbor option:selected" ).text();
    // alert(label)
    Cookies.set('to_island', island);
    Cookies.set('to_harbor', harbor);
}

function createList_toHarbor(d) {
    for(index in d){
        pulau = d[index].pulau_name;
        pelabuhan_tujuan = d[index].pelabuhan_tujuan;

        var a = "<optgroup label='"+pulau+"''>";
        var b = "</optgroup>";
        var c = '';

        for(index in pelabuhan_tujuan){
            var pelabuhan_id = pelabuhan_tujuan[index].id;
            var pelabuhan_name = pelabuhan_tujuan[index].name;
            c += "<option value='"+pelabuhan_id+"'>"+pelabuhan_name+"</option>";
        }

        $('#destination').append(a+c+b);
    }        
};

function removeCookie() {
    Cookies.remove('from_island');
    Cookies.remove('from_harbor');
}