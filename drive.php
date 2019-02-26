<?php
session_start();
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
    <head>
      <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <style>
            #map
            {
                top: 0%;
                height: 100%;
            }
        html, body
        {
            background-color: #606060;
            font-family: 'Roboto';
            font-size: 22px;
            margin: 0;
            padding: 0;
        }
        #header
        {
            position: absolute;
        }
        #wrapper
        {
            left: 0px;
            top: 0px;
            bottom:15px;
            right: 0;
            position: absolute;
        }
        #content
        {
            top: 38px;
            bottom: 0px;
            overflow: auto;
            position: absolute;
            left: 0;
            right: 0;
        }
        #footer
        {
            bottom: 0;
            right: 0;
            left: 0;
            position: absolute;
            width:100%;
            text-align: center;
            font-size: 11px;
        }
        .topnav
        {
            background-color: #333;
            overflow: hidden;
        }
        .topnav a
        {
            float: left;
            color: #F7F7F7;
            text-align: center;
            padding: 10px 16px;
            text-decoration: none;
            font-size: 15px;
            font-weight: 900;
        }
        .topnav a:hover
        {
            background-color: #E2B448;
            color: black;
        }
        .topnav a.active
        {
            background-color: #E2B448;
            color: white;
        }
        .Navbtn
        {
            border: none;
            background-color: inherit;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
            border-radius: 10px;
        }
        </style>
        <script src ="js/backendMap.js"></script>
   		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPATtzniskBsjq15BYelpSyuIAWxjvPO0&callback=initMap"
    async defer></script>
    </head>
    <body>
        <div id="header"><header style="color:#b3b3b3 "></header></div>
            <div id="wrapper">
                <div class="topnav">
                    <a href="splash" style="padding-right:8px;padding-left:8px;padding-top:2px;padding-bottom:0px"><img src="assets/driveLOGOalt.svg" alt="Drive" style="padding-top:0px;padding-bottom:0px;width:32px;height:32px;"></a>
                    <?php if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true): ?>
                        <a href="login/register">Find a Ride</button>
                    <?php else: ?>
                        <a href="ride">Find a Ride</button>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true): ?>
                        <a href="login/register">Drive?</button>
                    <?php else: ?>
                        <a href="driver">Drive?</button>
                    <?php endif; ?>
                    <?php if(!isset($_SESSION["loggedin"])||$_SESSION["loggedin"]!==true): ?>
                        <a href="login/register"style="float: right;">Login</button></a>
                    <?php else: ?>
                        <a href="login/profile"style="float: right;">Profile</button></a>
                    <?php endif; ?>
                </div>
                <div id="content">
                    <div id="map"></div>
                </div>
            </div>
        <div id="footer"><header style="color:#b3b3b3">Copyright &#169 2019 Drive LLC.</header></div>
    </body>
</html>