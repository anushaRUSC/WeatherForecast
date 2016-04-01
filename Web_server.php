<?php
   define("KEY", "AIzaSyCg3NZQa8r767-gYNJnvBWbV87g9FlPywM");
    define("KEY2", "4987de84eb76f7d6827a38704e79fafd");

    $address = $_GET["address"];
    $city    = $_GET["city"];
    $state = $_GET["state"];
    $base_url = "https://maps.googleapis.com/maps/api/geocode/xml?address=";
    $request_url = $base_url . urlencode($address) . "," . urlencode($city) . "," .urlencode($state) . "&key=" . KEY ;
    $xml = simplexml_load_file($request_url) or die("url not loading");

    $status = $xml->status;
    $lat = $xml->result->geometry->location->lat;
    $lng = $xml->result->geometry->location->lng;
    $degreeUnit="";
    if($_GET["degree"]=="fahrenheit")
     $degreeUnit="us";
     else
         $degreeUnit="si";

$forecast_url = "https://api.forecast.io/forecast/" . KEY2 . "/" . $lat . "," . $lng . "?units=".$degreeUnit."&exclude=flags" ;

    $json = file_get_contents($forecast_url);
    echo $json;
?>