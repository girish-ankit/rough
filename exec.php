<?php
 
// for Linux
//$result = shell_exec('whoami');
//$result = shell_exec('tar -xvzf /home/ankitk/Downloads/custom_registration_multi.tar.gz -C /home/ankitk/Downloads; ls -l /home/ankitk/Downloads');
//$result = shell_exec('ls -lt /home/ankitk');
//$result = shell_exec('service httpd stop');
//$result = shell_exec('svn status /var/www/html/NIIT/trunk/development/code/sites/all/themes/stability/niit_reposive');
//$result = shell_exec('ls -l /var/www/html/NIIT/trunk/development/code/sites/default/files/styles/pov/public/ | grep "apache"');
//$result = shell_exec('rm /var/www/html/NIIT/trunk/development/code/sites/default/files/styles/pov/public/vijay.jpg');
 
// for Windows
// $result = shell_exec('dir');
$input = 'testfile.wav';
$output = 'manu.mp3';
 
$fileName = 'audio.mp3';

//$result = shell_exec('ffmpeg -i '.$fileName.' -acodec libmp3lame -y '.$fileName);
$result = shell_exec('ffmpeg -i '.$input.' -acodec libmp3lame -y '.$output);

echo "<pre>$result</pre>";
 
?>
