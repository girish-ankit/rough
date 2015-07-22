<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
session_start();
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"] == '') {
    echo '<strong>Incorrect verification code.</strong>';
} else {
    // add form data processing code here 
    echo '<strong>Verification successful.</strong>';
};
?>