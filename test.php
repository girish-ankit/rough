<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);




function a() {
    $j = 0;
    
    function b() {
        global  $j;
        $j++;
       echo $j . ' I  am b <br />';
    }

    function c() {
         global  $j;
         $j++;
      echo $j . ' I  am c <br >';
    }

    echo $j . ' I am a <br >';
}

echo 'calling <b>a()</b> function<br />';
a();
echo 'calling <b>b()</b> function<br />';
b();
echo 'calling <b>c()</b> function<br />';
c();

b();
c();
