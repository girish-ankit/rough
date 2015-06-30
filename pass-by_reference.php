<?php
$var = 5;

function withoutrefereche($var){
   $var = $var +5 ;
   return $var;
}

echo withoutrefereche($var);
echo '<br />';
echo $var;
echo '<br />';

function withrefereche(&$var){
   $var = $var +10 ;
   return $var;
}

echo withrefereche($var);
echo '<br />';
echo $var;
echo '<br />';
?>