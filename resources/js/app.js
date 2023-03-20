import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);

var map = null
var markers = []
var myLatLng = { lat: 46.218160, lng: 25.158008 };

window.initMap = () => {

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });

    for(let i in points){
        let marker = new google.maps.Marker({
            position: { lat: parseFloat(points[i].lat), lng: parseFloat(points[i].lng) },
            map,
            title: points[i].title,
        });
        markers.push(marker)
    }

    initAutocomplete()
}
