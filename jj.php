<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


abstract class testParent
{
public function abc()
{
 return 'abc <br />';
}
}
class testChild extends testParent
{
public function xyz()
{
return 'xyz <br />';
}
}
$a = new testChild();
echo $a->abc();
echo $a->xyz();


?>
