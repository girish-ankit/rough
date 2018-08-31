<?php

$xmlfile = 'http://localhost/rough/xml_to_json/skipta-doctorunitepcp.xml';

function json_prepare_xml($domNode) {
  foreach ($domNode->childNodes as $node) {
    if ($node->hasChildNodes()) {
      json_prepare_xml($node);
    } else {
      if ($domNode->hasAttributes() && strlen($domNode->nodeValue)) {
        $domNode->setAttribute("nodeValue", $node->textContent);
        $node->nodeValue = "";
      }
    }
  }
}

function show_josn_data($value, $i) {
  $value_arr = (array) $value;
  $output = '';
  
  $output = '<h1>****** Record Number:'.$i.' *************</h1>';
  $output .= '<br /> <b>job-id: </b>' . $value_arr['job-id'];
  $output .= '<br /> <b>managed-by-board: </b>' . $value_arr['managed-by-board'];
  $output .= '<br /> <b>employer-id: </b>' . $value_arr['employer-id'];
  $output .= '<br /> <b>employer-job-id: </b>' . $value_arr['employer-job-id'];
  $output .= '<br /> <b>date-posted: </b>' . $value_arr['date-posted'];
  $output .= '<br /> <b>title: </b>' . $value_arr['title'];
  $output .= '<br /> <b>hec-job-tagline: </b>' . $value_arr['hec-job-tagline'];
  $output .= '<br /> <b>category: </b>' . $value_arr['category'];
  $output .= '<br /> <b>industry: </b>' . $value_arr['industry'];
  
  $output .= '<h3>Job Status Info:</h3>';
  
  $output .= '<br /> <b>status-full-time: </b>' . $value_arr['status-full-time'];
  $output .= '<br /> <b>status-part-time: </b>' . $value_arr['status-part-time'];
  $output .= '<br /> <b>status-permanent: </b>' . $value_arr['status-permanent'];
  $output .= '<br /> <b>status-temporary: </b>' . $value_arr['status-temporary'];
  $output .= '<br /> <b>status-full-time: </b>' . $value_arr['status-contract'];
  
  $output .= '<h3>Employer Info:</h3>';
  
  $output .= '<br /> <b>employer-name: </b>' . $value_arr['employer-name'];
  $output .= '<br /> <b>employer-email: </b>' . $value_arr['employer-email'];
  $output .= '<br /> <b>employer-email2: </b>' . $value_arr['employer-email2'];
  echo '<br />';
  $output .= '<br /> <b>internal-job-url </b>' . $value_arr['internal-job-url'];
  $output .= '<br /> <b>internal-apply-url: </b>' . $value_arr['internal-apply-url'];
  
  $output .= '<h3>Location Info:</h3>';
  
  $location = (array) $value_arr['location'];
  $output .= '<br /> <b>region-id: </b>' . $location['region-id'];
  $output .= '<br /> <b>city: </b>' . $location['city'];
  $output .= '<br /> <b>state: </b>' . $location['state'];
  $output .= '<br /> <b>country: </b>' . $location['country'];
  echo '<br />';
  $output .= '<br /> <b>internal-apply-url: </b>' . $value_arr['internal-apply-url'];
  $employer_additional_info = (array) $value_arr['employer-additional-info'];
   echo '<br />';
  $output .= '<br /> <b>employer-additional-info: </b>' .$employer_additional_info['@attributes']->nodeValue;
  $tagline = (array) $value_arr['tagline'];
  $output .= '<br /> <b>description: </b>' . $tagline['@attributes']->nodeValue;
  $descriptoin = (array) $value_arr['description'];
  $output .= '<br /> <b>tagline: </b>' . $descriptoin['@attributes']->nodeValue;


  echo $output;
//  echo '<pre>';
//  print_r($value_arr);
//  die();
}

$dom = new DOMDocument();
$dom->loadXML(file_get_contents($xmlfile));
json_prepare_xml($dom);
$sxml = simplexml_load_string($dom->saveXML());
$json = json_decode(json_encode($sxml));
$job_object = $json->job;

$job_object_cnt = count($job_object);

if ($job_object_cnt > 0) {
  $i=1;
  foreach ($job_object as $value) {
    show_josn_data($value, $i);
    $i++;
  }
}
?>
