<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
$url = "Travel&Transportation";
$urlen = urlencode($url);
echo  $urlen;
echo '<br />';
$urlde = urldecode($urlen);
echo  $urlde;
echo '<br />';

?>
