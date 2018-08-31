<?php

include 'connection.php';



$users = array();
for ($i = 0; $i<10; $i++) {
  $users[] = array('username' => 'user'.$i, 'i' => $i);
}

//print_r($users);
// table section for database object

$collection = $db->user;
$collection->drop();



$collection->batchInsert($users);

// close the connection to MongoDB 
$m->close();

/*

foreach ($users as $user) {
  echo $user['_id']."\n"; // populated with instanceof MongoId
}

$users = $collection->find()->sort(array('i' => 1));
foreach ($users as $user) {
    var_dump($user['username']);
}
 * 
 * 
 */

?>