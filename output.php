<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="map_style.css">
    <title>Document</title>
</head>
<body>
<?php
 $lat = $_POST['latitude'];
 $lon = $_POST['longitude'];
//  echo $lat;
?>
<div id="map"></div>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
	<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script>
        var lat2 = <?php echo $lat; ?>; 
        var lon2 = <?php echo $lon; ?>;
        var lat;
        var lon;

        if(!navigator.geolocation){
            console.log("Your browser doesnt support geolocaton feature!")
        } else {	
            navigator.geolocation.getCurrentPosition(getposition)
        }

        function getposition(position){
        console.log(position);
        lat = position.coords.latitude;
        lon = position.coords.longitude
        L.Routing.control({
            waypoints: [
                L.latLng(lat2, lon2),
                L.latLng(lat, lon)
                ],
                addWaypoints: false,
                draggableWaypoints: false
            }).addTo(map);
        }
        var map = L.map('map').setView([23.840058810555206, 90.3575901199828], 12);
		mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'Leaflet &copy; ' + mapLink + ', contribution', maxZoom: 25 }).addTo(map);
    </script>
</body>
</html>