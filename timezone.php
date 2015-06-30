<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

 
       $serverTimeZone = date_default_timezone_get();
       $endData = '2014-12-12 19:00:00';
       $timeZone = 'CST';
       // echo $serverTimeZone.'-----'.$timeZone.'----'.$endData; die();
       
       $changetime = new DateTime($endData, new DateTimeZone($timeZone));
       $changetime->setTimezone(new DateTimeZone($serverTimeZone));
       $serverPollEndTime =  $changetime->format('d/m/y h:i a');
       $serverCurrentTime = date('d/m/y h:i a');
      echo $serverTimeZone.'---'.$serverCurrentTime .'---'.$serverPollEndTime.' <br />';