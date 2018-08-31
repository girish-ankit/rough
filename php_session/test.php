<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

include 'memcache_set_get.php';

$id = '5678';
$key = 'csess_' . $id;
$value = array('fname' => 'girish', 'lname' => 'kumar');

custom_mem($key, 'set', $value);

$output = custom_mem($key, 'get');

print_r($output);

echo '<br />';

$newvalue = array('fname' => 'girish', 'lname' => 'thakur');

 custom_mem($key, 'update', $newvalue);

$newoutput = custom_mem($key, 'get');

print_r($newoutput);

//custom_mem($key, 'delete');

//$newoutput2 = custom_mem($key, 'get');

//print_r($newoutput2);



?>