route_create = base_url + '/company/product/ticket/boat/create';
route_show = base_url + '/company/product/ticket/boat/show/';
route_update = base_url + '/company/product/ticket/boat/update/';
route_delete = base_url + '/company/product/ticket/boat/delete/';
route_multiple_delete = base_url + '/company/product/ticket/boat/delete_in/';

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
    // $('#name').val(response.trackingnesia.name);
    $('#category').val(response.trackingnesia.category);
    $('#route').val(response.trackingnesia.route_id);
    $('#price').val(response.trackingnesia.price);
    check_orUncheck_pp(response.trackingnesia.pp);
}

function check_orUncheck_pp(id)
{
    if (id==1) {
        $('#check_pp').prop('checked', true);
        $('#pp_element').html('<input type="hidden" name="pp" value="1">');
    }else{
        $('#check_pp').prop('checked', false);
        $('#pp_element').html('<input type="hidden" name="pp" value="0">');
    }
}