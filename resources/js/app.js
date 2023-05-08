import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

window.showList = function ()
{
    let showListButton = document.getElementById('show-services-list');
    let showMapButton = document.getElementById('show-services-map');
    let mapEl = document.getElementById('services-map')
    let el = document.getElementById('services-list')
    el.classList.remove('hidden')
    mapEl.classList.add('hidden');
    showMapButton.classList.remove('bg-orange1')
    showListButton.classList.remove('bg-white')
    showListButton.classList.add('bg-orange1')
}
window.showMap = function ()
{
    let showListButton = document.getElementById('show-services-list');
    let showMapButton = document.getElementById('show-services-map');
    let mapEl = document.getElementById('services-map')
    let el = document.getElementById('services-list')
    el.classList.add('hidden')
    mapEl.classList.remove('hidden');
    showMapButton.classList.add('bg-orange1')
    showListButton.classList.add('bg-white')
    showListButton.classList.remove('bg-orange1')
}
window.hideAllPoints=function (){
    let pointElements = [...document.getElementsByClassName('point-services')]
    pointElements.forEach(el=>{
        el.classList.add('hidden')
    })
    let mapEl = document.getElementById('map')
    mapEl.scrollIntoView();
}
window.switchLang = value => {
    let currentUrl =  window.location.pathname;
    let elements =currentUrl.split('/');
    elements[1] = value;
    window.location = elements.join('/') + window.location.search;
};
window.initMap = () => {

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });


    points.forEach((point) => {
        let marker = new google.maps.Marker({
            position: {lat: parseFloat(point.lat), lng: parseFloat(point.lng)},
            map,
            title: point.title,
            icon: (point.status === 'active') ? markActivePath : markDisabledPath,
        });
        marker.addListener("click", () => {
            hideAllPoints()
            console.log('point-id-'+point.id)
            let elementToShow=document.getElementById('point-id-'+point.id)

            elementToShow.classList.remove('hidden')
            elementToShow.scrollIntoView()
        });
        markers.push(marker)

    })
    const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });
}
window.copyToClipboard = function (el) {
    navigator.clipboard.writeText( el.dataset.url);
    alert("Copied: " + el.dataset.url);
}
