<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);




if(!isset($_COOKIE['my_test'])){
setcookie('my_test', 'This is demo data of cookie set', time()+120);
}else{
 echo 'cookie is set';
}
echo '<pre>';
print_r($_COOKIE);
echo '</pre>';




?>
