<?php

include 'connection.php';

// table section for database object
$collection = $db->user;

// fetch all product documents
$cursor = $collection->find();


// How many results found
$num_docs = $cursor->count();

echo '<b>Total number of douments in user collection are : </b>' . $num_docs;

// close the connection to MongoDB 
$m->close();

?>