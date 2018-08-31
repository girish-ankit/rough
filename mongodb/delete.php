<?php

$newvalue = TRUE;
error_reporting(E_ALL);
ini_set('display_errors', $newvalue);
ini_set('display_startup_errors', $newvalue);

include 'connection.php';

$collection = $db->books;

// now remove the document
$collection->remove(array("price" => 800));


// now display the available documents
$cursor = $collection->find();
// iterate cursor to display title of documents

foreach ($cursor as $document) {
    echo'<li><b>Book Title: </b>' . $document['title'] . '<b> Book Author: </b>' . $document['author'] . '<b> Book Price: </b>' . $document['price'] . '</li>';
}
?>
