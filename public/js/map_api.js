function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(33.6518, 73.1566),
        zoom: 5,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}