<?php

error_reporting(E_ALL);
 ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);


$usernum = 15;
if ($usernum > 10) {
    trigger_error("Number cannot be larger than 10", E_USER_NOTICE);
}
?>