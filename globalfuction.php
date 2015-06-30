<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
$i= 0;
function a()
{
    global $i;
    $i++;
    function b()
    {
        global $i;
        echo $i.' I am b <br />';
    }
    function c()
    {
        global $i;
        echo $i.' I am c <br >';
    }
    
    echo $i.' I am a <br >';
}
echo 'calling <b>a()</b> function<br />';
a();
echo 'calling <b>b()</b> function<br />';
b();
echo 'calling <b>c()</b> function<br />';
c();


function test() 
{
  function myTest() 
  {
   echo  "Hello Dad <br />";
  } 
}

echo 'calling <b>test()</b> function<br />';
//test();
echo 'calling <b>myTest()</b> function<br />';
myTest();

class CMyTestClass
{
  public function test1() // method of CMyTestClass
  {
    function myTest1() // This declaration will be global! Why?
    {
      echo  "Hello Mom <br />" ;
    } 
  }
}

$ak = new CMyTestClass();
echo 'calling <b>test1()</b> function of class CMyTestClass<br />';
$ak->test1();
echo 'calling <b>myTest1()</b> function of class CMyTestClass<br />';
myTest1();


