route_create = base_url + '/company/nahkoda/create';
route_show = base_url + '/company/nahkoda/show/';
route_update = base_url + '/company/nahkoda/update/';
route_delete = base_url + '/company/nahkoda/delete/';
route_multiple_delete = base_url + '/company/nahkoda/delete_in/';

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
    $('#name').val(response.trackingnesia.name);
    $('#telp').val(response.trackingnesia.telp);
    $('#tempat_lahir').val(response.trackingnesia.tempat_lahir);
    $('#tanggal_lahir').val(response.trackingnesia.tanggal_lahir);
    check_orUncheck_active(response.trackingnesia.active);
}