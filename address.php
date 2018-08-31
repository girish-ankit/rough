<?php

error_reporting(-1);
ini_set('display_errors', 'On');
// not locaiton name space is separed by + also there is no space between city, state and country

$address = 'Pune,Maharashtra,India';
$api_key = 'AIzaSyD4xYaZPzlbH9LrYC4k6jl0a_L81PwhVFU';

$address = 'Pune,Maharashtra,India';

@get_lat_long($address);



function get_lat_long($address){

sleep(5);

$api_key = 'AIzaSyAimn1D668liUC0W4oILf-9fESyaVNtUmA';


$region = 'US';

$url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region&key=$api_key";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_PROXYPORT, 3128);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($ch);

curl_close($ch);

$response_a = json_decode($response);

$lat = $response_a->results[0]->geometry->location->lat;

$long = $response_a->results[0]->geometry->location->lng;

$latlon = array($lat, $long);

var_dump($response_a);

//var_dump($latlon);

return $latlon;

}

?>
