<?php

include 'connection.php';

$collection = $db->books;


// now update the document
$collection->update(array("title" => "PHP Cookbook"), array('$set' => array("title" => "PHP Cookbook Updated")));

// now display the updated document
$cursor = $collection->find();
// iterate cursor to display title of documents

foreach ($cursor as $document) {
    echo $document["title"] . "<br />";
}
