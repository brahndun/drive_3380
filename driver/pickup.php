<?php
$title = "Rider Pickup";
$userrole = "Driver";
include "../login/misc/pagehead.php";
?>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<style>
    #map {
        top: 0%;
        height: 100%;
    }

    #wrapper {
        left: 0;
        right: 0;
        top: 52px;
        bottom: 15px;
        position: absolute;
    }

    #content {
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        overflow: auto;
        position: absolute;
    }

    #footer {
        bottom: 0;
        right: 0;
        left: 0;
        position: absolute;
        width: 100%;
        text-align: center;
        font-size: 11px;
    }

    html,
    body {
        font-family: 'Roboto';
    }
</style>
<?php require '../login/misc/pullnav.php'; ?>
</head>

<body>
    <script>
        location.href = "../drive.php";
    </script>
    <!-- <script src="../js/backendMap.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>
    <div class="container">
        <div id="wrapper">
            <div id="content">
                <div id="map"></div>
                <script>
                    var map, infoWindow;

                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {
                                lat: 30.4133,
                                lng: -91.1800
                            },
                            zoom: 14
                        });
                        infoWindow = new google.maps.InfoWindow;
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };
                                addMarker(pos, map, '<?php echo $_SESSION['username'] ?>' + ' driver');
                                map.setCenter(pos);
                            }, function() {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                    }

                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
                        infoWindow.open(map);
                    }
                </script>

            </div>
        </div> -->
        <div id="footer">
            <header style="color:#b3b3b3">Copyright &#169 2019 Drive</header>
        </div>
</body>

</html> 