<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>tes bhumi varta technology</title>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
              integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
              crossorigin=""/>

        <style>
            #mapid { height: 100vh}
        </style>
    </head>
    <body>

        <div id="mapid"></div>

    </body>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
    <script type="text/javascript">
        var mymap = L.map('mapid').setView([-8.2394556, 111.8311231], 7);


        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        }).addTo(mymap);

        L.marker([-7.5394556, 111.8311231]).addTo(mymap)
            .bindPopup('You clicked marker: 2');
        L.marker([-7.5394556, 111.5311231]).addTo(mymap)
            .bindPopup('You clicked marker: 2');
        L.marker([-7.5394556, 111.2311231]).addTo(mymap)
            .bindPopup('You clicked marker: 2');

        L.marker([-7.9394556, 111.8311231]).addTo(mymap)
            .bindPopup('You clicked marker: 2')
            .openPopup();
        L.marker([-7.9394556, 111.5311231]).addTo(mymap)
            .bindPopup('You clicked marker: 2');
        L.marker([-7.9394556, 111.2311231]).addTo(mymap)
            .bindPopup('You clicked marker: 2');
    </script>


</html>
