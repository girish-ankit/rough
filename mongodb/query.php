<?php

include 'connection.php';

$books = array();

$books[] = array('title' => 'PHP Cookbook', 'author' => 'ankit kumar', 'price' => 300);
$books[] = array('title' => 'Mysql Cookbook', 'author' => 'ankit singh', 'price' => 200);
$books[] = array('title' => 'Java Cookbook', 'author' => 'ram kumar', 'price' => 100);
$books[] = array('title' => 'Linux Cookbook', 'author' => 'deepak sign', 'price' => 500);
$books[] = array('title' => 'Mysql Cookbook', 'author' => 'ankit kumar', 'price' => 800);
$books[] = array('title' => 'Javascript Cookbook', 'author' => 'thakur ankit', 'price' => 700);
$books[] = array('title' => 'Mongodb Cookbook', 'author' => 'rohit', 'price' => 100);

$collection = $db->books;
$collection->drop();
$collection->batchInsert($books);

$cursor = $collection->find(array('author' => 'ankit kumar'));

echo '<ul>';

foreach ($cursor as $document) {
    // print_r($document); die();
    echo'<li><b>Book Title: </b>'.$document['title'].'<b> Book Author: </b>'.$document['author'].'<b> Book Price: </b>'.$document['price'].'</li>';
  
}

echo '</ul>';

// close the connection to MongoDB 
$m->close();

?>