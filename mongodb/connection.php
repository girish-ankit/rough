<?php

// connects to localhost on port 27017 by default
$m = new MongoClient();

##########  NOTE: // connects to 192.168.25.190 on port 50100 #################3

/*
 *  $m = new MongoClient("mongodb://192.168.25.190:50100");
 */

//  database selection for mongo db object

$db = $m->php_test;
?>