<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
$days = cal_days_in_month(CAL_GREGORIAN, 2, 2024);
echo $days; // output : 29
echo '<br />';
echo date('Y');
echo '<pre>';
print_r(cal_info());
echo '</pre>';


?>
