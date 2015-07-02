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
    echo 'Message: ' . $e->getMessage() . '<br/>';
    echo "Message: " . $e->getMessage(). "<br/>"; 
    echo "File: " . $e->getFile(). "<br/>"; 
    echo "Line: " . $e->getLine(). "<br/>"; 
    echo "Trace: \n" . $e->getTraceAsString(). "<br/>"; 
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
    echo($e->getMessage() . '') . '<br/>';
    while ($e = $e->getPrevious())
        echo('Caused by: ' . $e->getMessage() . '' . $e->getTraceAsString() . '') . '<br/>';
}


##################################### TRY/CATCH for OOPS ################################

class Tweet {

    protected $id;
    public $text;

    public function __construct($id, $text) {
        $this->id = $id;
        $this->text = $text;
    }

    public function __get($property) {

        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            throw new Exception("Variable " . $property . " has not been declared and can not be get.", 1);
        }
    }

}

$tt = new Tweet(123, 'hello world');



try {

    echo $tt->ankit; // 'hello world'
} catch (Exception $e) {

    echo 'Caught exception: ', $e->getMessage(), "\n";
}
?>