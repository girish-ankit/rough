<?php

#######################################################################
########################### BASIC #####################################
#######################################################################

// DB Connection
// mysqli('hostname', 'username', 'password', 'database name');
$db = new mysqli('localhost', 'root', 'htp@123', 'angular_api');

if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

// SELECT QUERY

$sql = "SELECT * FROM `friends` ";

$result = $db->query($sql);

if (!$result) {
    die('There was an error in the query [' . $db->error . ']');
}

// Output results:

while ($row = $result->fetch_assoc()) {
    echo $row['first_name'] . ' ' . $row['last_name'] . '<br />';
}

// Total Number of records:
echo 'Total results: ' . $result->num_rows . '<br />';

//Move inside recordset
$result->data_seek(2);

while ($row = $result->fetch_assoc()) {
    echo $row['first_name'] . ' ' . $row['last_name'] . '<br />';
}

// Free memory:

/*
 * When you finished the current result set, it is optional but make a habit to free up system resources by using following code:
 */

$result->free();

// Escaping string:

/*
 * Before inserting the data into database we have to escape special characters (NUL (ASCII 0), \n, \r, \, ‘, “, and Control-Z ) 
 * from string values (mainly to prevent SQL injection). You should use real_escape_string method like as below:
 */

$data = $db->real_escape_string('My name is "Khan"');
echo $data.'<br />';

// We have an alias function of it, which is shorter:

$db->escape_string('My name is "Khan"');

// close a connection after using the database use following method:

$db->escape_string('My name is "Khan"');


#######################################################################
########################### ADVACE #####################################
#######################################################################

// Prepared Statements

/*
 * A prepared statements is a precompiled SQL statement that can be executed multiple times by sending the data to the server. Prepared statements basically work by you using a ? placeholder where
 *  you want to substitute in a string, integer or double. Prepared statements don’t substitute the value into the SQL so the issues with SQL injections are mostly removed.
 */

// The statement template is created by the application and sent to the DBMS. Some parameters are left unspecified by placeholders “?” like as below:

/*
 * performance: parameterized queries with prepared statements reduces the database load,reusing access plans that were already prepared .
 * 
 * security: using prepared statements, there is no need to escape user input. Binding parameters, the driver doesthe work for you. This is an ideal method to avoid SQL Injection attacks.
 */

$stmt = $db->prepare("SELECT `last_name` FROM `friends` WHERE `fid` = ? AND `first_name` LIKE ?");

/* Prepare statement */

if($stmt === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
}

$fid = 2;
$first_name = '%ri%';

/* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
$stmt->bind_param('is', $fid, $first_name);

/* Execute statement */
$stmt->execute();

//Output results
/*
 * Now we will bind the output variable $out_name using bind_result() method which will assign the result to variable. So we will use:
 */

$stmt->bind_result($out_name);
while($stmt->fetch()){
    echo $out_name . '<br />';
}

//Close statement:
/*
 * After accessing the result we should free stored result memory for the statement using free_result() method.
 */

$stmt->free_result();

 
?>