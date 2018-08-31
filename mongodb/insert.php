<?php

include 'connection.php';

// table section for database object

$collection = $db->node;

$document = array(
    "title" => "MongoDB",
    "description" => "database",
    "likes" => 100,
    "url" => "http://www.tutorialspoint.com/mongodb/",
    "by", "tutorials point"
);
$collection->insert($document);

// close the connection to MongoDB 
$m->close();
?>