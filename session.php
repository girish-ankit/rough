<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();

echo '<b>'.session_name().'</b>';
session_name('ankit');
echo '<b>'.session_name().'</b>';


if(!isset($_SESSION['test_session'])){
$_SESSION['test_session'] = 'This is demo data of session';
}else{
echo 'Session is set';
}

echo '<pre>';
print_r($_SESSION);
echo '</pre>';
session_destroy();




?>
