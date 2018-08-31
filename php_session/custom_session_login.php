<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$db = mysqli_connect("localhost", "root", "htp@123", "test_session");

if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

include 'database_session.inc';

session_save_path("/var/www/html/login/session");
session_start();

print_r($_SESSION);
$email = '';
// Grab User submitted information
if (isset($_POST["users_email"])) {
    $email = $_POST["users_email"];
}

$pass = '';
if (isset($_POST["users_pass"])) {
    $pass = $_POST["users_pass"];
}







if ($email && $pass) {
    $result = mysqli_query($db, "SELECT uid FROM users WHERE users_email = '" . $email . "' AND users_pass = '" . $pass . "'");

    $row = mysqli_fetch_array($result);

    if ($row["uid"]) {
        $_SESSION['uid'] = $row["uid"];
        $_SESSION['users_email'] = $email;
        $_SESSION['users_pass'] = $pass;

        echo"<b>Session Save path: </b>";
        echo session_save_path();
        /*
          echo"<br /><b>Session Id: </b>";
          echo session_id();

         */
        $session_fiel_path = session_save_path() . '/sess_' . session_id();
        echo"<br /><br /><b>Session Data: </b>";
        $sessionData = @file_get_contents($session_fiel_path);
        //unserialize($sessionData);
        echo $sessionData;
    } else {
        echo"Sorry, your credentials are not valid, Please try again.";
    }
}

#######################################################################3
// Session file data fiel name is : sess_2fk4sajnc92joab82kodsr1gi0


if (isset($_SESSION['uid'])) {
    echo '<h2>Welcome uid: ' . $_SESSION['uid'] . '</h1>';
    echo '<a href="logout.php">Logout</a> <br />';
} else {
    header("Location: index.php");
}

if(isset($_GET['q'])){
    if($_GET['q'] == 'logout'){
        session_destroy();
        header("Location: index.php");
        exit();
    }
}


?>
