var map;
var geocoder;

function initialize(lat, lng) {
    geocoder = new google.maps.Geocoder;
    geocodeLatLng(lat, lng);

    var latlng = new google.maps.LatLng(lat, lng);

    var options = {
        zoom: 15,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        title: "Imovel",
        map: map
    });
}

function geocodeLatLng(lat, lng) {
    geocoder.geocode({'location': {lat: lat, lng: lng}}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
                console.log(results[0].formatted_address);
                $('#addr-desc').html(results[0].formatted_address);

            } else {
                console.log('Erro');
            }
        } else {
            console.log('Geocoder failed due to: ' + status);
        }
    });
}
