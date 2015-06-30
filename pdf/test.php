<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$pdf = 'NIIT-Cloud-final3_0.pdf[0]';
$image = new Imagick($pdf);
$image->resizeImage( 200, 200, imagick::FILTER_LANCZOS, 0);
$image->setImageFormat( "png" );
 $thumbnail = $image->getImageBlob();
echo "<img src='image/png;base64,".base64_encode($thumbnail)."' /><br />";

?>