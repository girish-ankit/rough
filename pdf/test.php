<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$pdf = 'NIIT-Cloud-final.pdf[2]';
$image = new Imagick($pdf);
$image->resizeImage( 200, 200, imagick::FILTER_LANCZOS, 0);
$image->setImageFormat( "png" );
//$image->writeImage('newfilename.png');
$thumbnail = $image->getImageBlob();

echo "<img src='data:image/png;base64, ".base64_encode($thumbnail)."' alt='Image 1' /><br />";




?>