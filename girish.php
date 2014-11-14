<?php
 
// for Linux
$result = shell_exec('whoami');
//$result = shell_exec('tar -xvzf /home/ankitk/Downloads/custom_registration_multi.tar.gz -C /home/ankitk/Downloads; ls -l /home/ankitk/Downloads');
//$result = shell_exec('ls -lt /home/ankitk');
//$result = shell_exec('service httpd stop');
//$result = shell_exec('svn status /var/www/html/NIIT/trunk/development/code/sites/all/themes/stability/niit_reposive');
//$result = shell_exec('ls -l /var/www/html/NIIT/trunk/development/code/sites/default/files/styles/pov/public/ | grep "apache"');
//$result = shell_exec('rm /var/www/html/NIIT/trunk/development/code/sites/default/files/styles/pov/public/vijay.jpg');
 
// for Windows
// $result = shell_exec('dir');
 
echo "<pre>$result</pre>";
 
?>
