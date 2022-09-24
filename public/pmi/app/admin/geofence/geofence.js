$(document).ready(function() {
    $('#geofenceTable').DataTable( {
        order: [],
        columnDefs: [
            { 
                "targets": [ 0 ],
                "orderable": false,
            }
        ],
    });
});

function show(id){
    $.ajax({
        url: base_url+'/admin/api/driver/show/'+id,
        type: 'GET',
        dataType: 'JSON',
        contentType: false,
        processData: false,
        success: function(response){
            console.log(response);            
            var id = response.trackingnesia.id;

            $('#user').val(response.trackingnesia.user_id);
            $('#name').val(response.trackingnesia.name);
            $('#tempat_lahir').val(response.trackingnesia.tempat_lahir);
            $('#tanggal_lahir').val(response.trackingnesia.tanggal_lahir);
            $('#no_sim').val(response.trackingnesia.no_sim);
            $('#masa_sim').val(response.trackingnesia.masa_sim);
            $('#telp').val(response.trackingnesia.telp);
            $('#foto_pengemudi').val(response.trackingnesia.foto_pengemudi);
            $('#foto_sim').val(response.trackingnesia.foto_sim);
            $('#foto_ktp').val(response.trackingnesia.foto_ktp);
            $('#ibutton_id').val(response.trackingnesia.ibutton_id);
            $('#status').val(response.trackingnesia.status).change();
            $('#user').val(response.trackingnesia.users).change();
            $('form').attr('action', base_url+'/admin/api/driver/update/'+id);
            // $('#foto').attr('src', base_url+'/assets/img/'+response.trackingnesia[0].foto);
        }
    });
};

function do_create(){
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = base_url + '/admin/api/driver/create';
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
                $('#alert_input').html(response.message).fadeIn().delay(5000).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.responseText);
        }
    });
};


function do_update(id){
    var formData = new FormData($('#modal_input form')[0]);
    var urlData = base_url + '/admin/api/driver/update/'+id;
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
                $('#alert_input').html(response.message).fadeIn().delay(5000).fadeOut();
            }
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
        }
    });
};

function do_delete(id){
    var urlData = base_url + '/admin/api/driver/delete/'+id;
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
            console.log(response);
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
    var checkedIds = $(".checkbox_drivers:checked").map(function() {
        return this.id;
    }).toArray();
    var urlData = base_url + '/admin/api/driver/delete_in/'+checkedIds;
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
            console.log(response);
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


var initCenter = { lat: -6.603176013975385, lng: 106.79679123090715 };

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 9,
        center: initCenter,
        mapTypeId: "roadmap",
    });
}

function createCircle() {
    var latitude = $('#lat').val();
    var longitude = $('#lng').val();
    var radius = $('#radius').val();
    var center = new google.maps.LatLng(latitude, longitude);
    // var center = new google.maps.LatLng(-6.557353, 106.771826);
    var radiuss = Math.sqrt(radius) * 100;

    cityCircle = new google.maps.Circle({
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        map,
        center: center,
        radius: radiuss,
        draggable: true,
        geodesic: true,
        editable: true,
    });

    map.setCenter(center);
    map.setZoom(18);
    $('#createCircle').hide();
    $('#clearCircle').show();
}

function clearCircle() {
    cityCircle.setMap(null);
    $('#createCircle').show();
    $('#clearCircle').hide();
}


/** Show the new coordinates for the rectangle in an info window. */
function showNewRect() {
  const ne = cityCircle.getBounds().getNorthEast();
  const sw = cityCircle.getBounds().getSouthWest();
  const latlng = cityCircle.LatLngBounds().getPosition();
  const contentString =
    "<b>Rectangle moved.</b><br>" +
    "New north-east corner: " +
    ne.lat() +
    ", " +
    ne.lng() +
    "<br>" +
    "New south-west corner: " +
    sw.lat() +
    ", " +
    sw.lng() +
    "<br>" +
    "LatLng: " +
    latlng.lat() +
    ", " +
    latlng.lng();

  // Set the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(ne);
  infoWindow.open(map);
}


// // This example requires the Drawing library. Include the libraries=drawing
// // parameter when you first load the API. For example:
// // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=drawing">
// function initMap() {
//     const map = new google.maps.Map(document.getElementById("map"), {
//         center: { lat: -34.397, lng: 150.644 },
//         zoom: 8,
//     });
//     const drawingManager = new google.maps.drawing.DrawingManager({
//         drawingMode: google.maps.drawing.OverlayType.MARKER,
//         drawingControl: true,
//         drawingControlOptions: {
//             position: google.maps.ControlPosition.TOP_CENTER,
//             drawingModes: [
//                 google.maps.drawing.OverlayType.MARKER,
//                 google.maps.drawing.OverlayType.CIRCLE,
//                 google.maps.drawing.OverlayType.POLYGON,
//                 google.maps.drawing.OverlayType.POLYLINE,
//                 google.maps.drawing.OverlayType.RECTANGLE,
//             ],
//         },
//         markerOptions: {
//             icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
//         },
//         circleOptions: {
//             fillColor: "#ffff00",
//             fillOpacity: 1,
//             strokeWeight: 5,
//             clickable: false,
//             editable: true,
//             zIndex: 1,
//         },
//     });

//     drawingManager.setMap(map);
// }