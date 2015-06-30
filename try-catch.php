<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

//create function with an exception
function checkNum($number) {
    if ($number > 1) {
        throw new Exception("Value must be 1 or below");
    }
    return true;
}

//trigger exception in a "try" block
try {
    checkNum(2);
    //If the exception is thrown, this text will not be shown
    echo 'If you see this, the number is 1 or below';
}

//catch exception
catch (Exception $e) {
    echo 'Message: ' . $e->getMessage().'<br/>';
}

// second demo

function get_db_connection() {
    throw new Exception('Could not connect to database');
}

function update_email($username, $email) {
    try {
        $conn = get_db_connection();
       // $conn->update("UPDATE user SET email = '$email' WHERE username = '$username'");
    } catch (Exception $e) {
        throw new Exception('Failed to save email [' . $email . '] for user [' . $username . ']', 0, $e);
    }
}

try {
    update_email('myusername', 'newmail@foo.com');
} catch (Exception $e) {
    echo($e->getMessage() . '').'<br/>';
   while ($e = $e->getPrevious())
       echo('Caused by: ' . $e->getMessage() . '' . $e->getTraceAsString() . '').'<br/>';
}
?>