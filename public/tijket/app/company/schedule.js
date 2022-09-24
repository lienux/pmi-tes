route_create = base_url + '/company/schedule/create';
route_show = base_url + '/company/schedule/show/';
route_update = base_url + '/company/schedule/update/';
route_delete = base_url + '/company/schedule/delete/';
route_multiple_delete = base_url + '/company/schedule/delete_in/';

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
    $('#time_start').val(response.trackingnesia.time_from);
    $('#time_end').val(response.trackingnesia.time_to);
    $('#boat').val(response.trackingnesia.boat_id);
    $('#route').val(response.trackingnesia.route_id);
    check_orUncheck_active(response.trackingnesia.active);
}