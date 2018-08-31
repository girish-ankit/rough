<?php
    $array["a"] = "Foo";
    $array["b"] = "Bar";
    $array["c"] = "Baz";
    $array["d"] = "Wom";

    $str = serialize($array);
    $strenc = urlencode($str);
    print $str . "<br />";
    print $strenc . "<br />";
    
    $arr = unserialize(urldecode($strenc));
    print_r($arr);
?>