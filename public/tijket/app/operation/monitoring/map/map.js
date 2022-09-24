var initCenter = { lat: -6.603176013975385, lng: 106.79679123090715 };

function initMap() {
    map = new google.maps.Map(document.getElementById("live-map"), {
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
    var radiuss = Math.sqrt(radius) * 100;

    const cityCircle = new google.maps.Circle({
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
}