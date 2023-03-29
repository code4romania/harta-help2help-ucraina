import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

let map = null
let markers = []
let myLatLng = {lat: 46.218160, lng: 25.158008};


function getInfoContent(point) {
    console.log(point);
    return `
 <div class="px-1.5 py-1.5 w-[250px]">
 <div class="image"> logo</div>
    <p class="my-2 flex ">
            ${point.city.name}, ${point.county.name}
        </p>
        <p class="text-xl">${point.name.ro}</p>
        <p class="text-xl"> ${point.project_name}</p>
        <p class="text-sm">Oferit de: {point.ngo.name.ro}</p>
        <p class="text-sm">Domenii de intervenție:  {point.ngo.name.ro}</p>
        <p class="text-sm">Tip beneficiar: :  {point.ngo.name.ro}</p>
        <p class="text-sm">${point.status}</p>
        <p class="text-sm">Cum poate fi accesat serviciul:{point.status}</p>

    `;

}

window.initMap = () => {

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });


    points.forEach((point) => {
        let infoWindow = new google.maps.InfoWindow({
            content: getInfoContent(point),
            maxWidth: 400,
            ariaLabel: point.project_name,
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
    const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });
}
