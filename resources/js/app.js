import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

let map = null
let markers = []
let myLatLng = {lat: 46.218160, lng: 25.158008};


function getInfoContent(point) {

}

window.initMap = () => {

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });


    points.forEach((point) => {
        let infoWindow = new google.maps.InfoWindow({
            content: getInfoContent(point),
            ariaLabel: point.service,
        });
        let marker = new google.maps.Marker({
            position: {lat: parseFloat(point.lat), lng: parseFloat(point.lng)},
            map,
            title: point.title,
            icon: (point.status === 'active') ? markActivePath : markDisabledPath,
        });
        marker.addListener("click", () => {
            infoWindow.open({
                anchor: marker,
                map,
            });
        });
        markers.push(marker)
    })
}
