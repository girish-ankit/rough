<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
include 'database_session.inc';
session_start();
session_destroy();

header("Location: index.php");
exit();
?>