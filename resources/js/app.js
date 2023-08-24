import './bootstrap';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);



window.hideAllPoints = function () {
    let pointElements = [...document.getElementsByClassName('service-point')];
    pointElements.forEach(el => {
        el.classList.add('hidden')
    })
    let mapEl = document.getElementById('map')
    mapEl.scrollIntoView();
}

window.switchLang = (value) => {
    let currentUrl = window.location.pathname;
    let elements = currentUrl.split('/');
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
            position: { lat: parseFloat(point.lat), lng: parseFloat(point.lng) },
            map,
            title: point.title,
            icon: (point.status === 'active') ? markActivePath : markDisabledPath,
        });
        marker.addListener("click", () => {
            hideAllPoints()
            let elementToShow = document.getElementById('point-id-' + point.id)

            elementToShow.classList.remove('hidden')
            elementToShow.scrollIntoView()
        });

        markers.push(marker)
    })

    const markerCluster = new markerClusterer.MarkerClusterer({ map, markers });
}
window.copyToClipboard = function (url) {
    navigator.clipboard.writeText(url);
    alert("Copied: " + url);
}
window.toggleMenu = function () {
    document.getElementById('mobile-menu').classList.toggle('hidden')

    document.querySelectorAll('.menu-button-icon').forEach(el => {
        el.classList.toggle('hidden')
    })
}
