function show(id){
    $.ajax({
        url: route_show + id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            // console.log(response);            
            var id = response.pmi.id;

            inserttoform(response);
        }
    });
};

function do_create(){
    // element_active();
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = route_create;
    $.ajax({
        type: 'POST',
        url: urlData,
        dataType: 'JSON',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function(e) {
            $('#modal_loader_input').show()
            if(e && e.overrideMimeType) {
                e.overrideMimeType('application/jsoncharset=UTF-8')
            }
        },
        complete: function(){
            $('#modal_loader_input').hide();
        },
        success: function(response){
            // console.log(response);
            // alert(response);
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
                $('#alert_input').html(response.message).fadeIn().delay(5000).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
    });
};


// function do_update(id){
//     // element_active();
//     var formData = new FormData($('#modal_input form')[0]);
//     var urlData = route_update + id;
//     $.ajax({
//         type: 'POST',
//         url: urlData,
//         dataType: 'JSON',
//         data: formData,
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#modal_loader_input').show()
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#modal_loader_input').hide();
//         },
//         success: function(response){
//             // console.log(response);
//             if(response.status == true){
//                 $('#modal_input').modal('toggle');
//                 $('#alert').addClass('bg-success');
//                 $('#alert').html(response.message).fadeIn().delay(2500).fadeOut(
//                     function(){
//                         location.reload(true);
//                     }
//                 );
//             }else{ 
//                 $('#alert_input').addClass('bg-danger');
//                 $('#alert_input').html(response.message).fadeIn().delay(5000).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// };

// function do_delete(id){
//     var urlData = route_delete + id;
//     $.ajax({
//         type: 'DELETE',
//         url: urlData,
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#modal_loader_delete').show()
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#modal_loader_delete').hide();
//         },
//         success: function(response){
//             // console.log(response);
//             if(response.status == true){
//                 $('#modal_confirmation').modal('toggle');
//                 $('#alert').addClass('bg-success');
//                 $('#alert').html(response.message).fadeIn().delay(3000).fadeOut(
//                     function(){
//                         location.reload(true);
//                     }
//                 );
//             }else{
//                 $('#alert').addClass('bg-danger');
//                 $('#alert').html(response.message).fadeIn().delay(3000).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// };

// function do_delete_check(){
//     var checkedIds = $(".checkbox_multiple_delete:checked").map(function() {
//         return this.id;
//     }).toArray();
//     var urlData = route_multiple_delete + checkedIds;
//     $.ajax({
//         type: 'DELETE',
//         url: urlData,
//         dataType: 'JSON',
//         contentType: false,
//         processData: false,
//         beforeSend: function(e) {
//             $('#modal_loader_delete').show();
//             if(e && e.overrideMimeType) {
//                 e.overrideMimeType('application/jsoncharset=UTF-8')
//             }
//         },
//         complete: function(){
//             $('#modal_loader_delete').hide();
//         },
//         success: function(response){
//             // console.log(response);
//             if(response.status == true){
//                 $('#modal_confirmation').modal('toggle');
//                 $('#alert').addClass('bg-success');
//                 $('#alert').html(response.message).fadeIn().delay(3000).fadeOut(
//                     function(){
//                         location.reload(true);
//                     }
//                 );
//             }else{
//                 $('#alert').addClass('bg-danger');
//                 $('#alert').html(response.message).fadeIn().delay(3000).fadeOut();
//             }
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
//         alert(xhr.responseText);
//         }
//     });
// }