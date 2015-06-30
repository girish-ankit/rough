<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (!extension_loaded('imagick')) {
    echo 'imagick not installed';
} else {
    if (isset($_GET['q'])) {

        $imgId = $_GET['q'];
    } else {
        $imgId = 0;
    }



    $pdf_file = 'pdf/NIIT-Cloud-final3_0.pdf';
    $save_to = "images/";

    /** page count * */
    $image = new Imagick("{$pdf_file}");
    $count = $image->getNumberImages();
    if ($count > $imgId) {
        generateImage($pdf_file, $imgId, $save_to);
    } else {
        echo 'pdf has been finished';
    }

    /** page count * */
}

function generateImage($pdf_file, $imgId, $save_to) {


    $pdf_file_arr = explode('/', $pdf_file);
    $pdfname = $pdf_file_arr[count($pdf_file_arr) - 1];
    $pdfnameArr = explode('.', $pdfname);
    $ImageFileName = $save_to . $pdfnameArr[0] . '_' . $imgId . '.jpg';

    // echo  $ImageFileName;


    $img = new imagick();

    $img->setResolution(200, 200);

//read the pdf
    $img->readImage("{$pdf_file}[{$imgId}]");

//reduce the dimensions - scaling will lead to black color in transparent regions
    $img->scaleImage(800, 0);

//set new format
    $img->setImageFormat('jpg');

// -flatten option, this is necessary for images with transparency, it will produce white background for transparent regions
    $img = $img->flattenImages();

//save image file
    //  $img->writeImages($ImageFileName, false);
    // print_r($img); die();
    //echo the jpg image
    // header("Content-type: image/" . $img->getImageFormat());
//echo $img; 

    ob_start();
    $thumbnail = $img->getImageBlob();
    echo $thumbnail;
    $contents = ob_get_contents();
    //$len1 = ob_get_length();
    ob_end_clean();

    // echo $len1;

    echo "<img src='data:image/jpg;base64," . base64_encode($contents) . "' />";
}

?>
