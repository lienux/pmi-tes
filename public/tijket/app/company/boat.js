route_create = base_url + '/company/boat/create';
route_show = base_url + '/company/boat/show/';
route_update = base_url + '/company/boat/update/';
route_delete = base_url + '/company/boat/delete/';
route_multiple_delete = base_url + '/company/boat/delete_in/';

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

// $('.time_start').clockTimePicker();
// $('.time_end').clockTimePicker();
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
    $('#kode_boat').val(response.trackingnesia.kode_boat);
    $('#merk_tipe').val(response.trackingnesia.merk_tipe);
    $('#thn_produksi').val(response.trackingnesia.thn_produksi);
    $('#licence_plate').val(response.trackingnesia.licence_plate);
    $('#seat').val(response.trackingnesia.jumlah_seat);
    $('#bbm').val(response.trackingnesia.jumlah_bbm);
    check_orUncheck_active(response.trackingnesia.operation_status);
}