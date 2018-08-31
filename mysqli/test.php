<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$db = mysqli_connect("localhost", "root", "htp@123", "test_session");
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}


$email = 'a@a.com';
$pass = '1234';

$result = mysqli_query($db, "SELECT uid FROM users WHERE users_email = '" . $email . "' AND users_pass = '" . $pass . "'");
//print_r($result); die();
$row = mysqli_fetch_array($result);
print_r($row);
?>