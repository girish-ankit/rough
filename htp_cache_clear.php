<?php
$conn = mysql_connect('192.168.0.179','root','htp@123');
mysql_select_db('artinfo_17jun',$conn);

mysql_query("truncate table cache");
mysql_query("truncate table cache_admin_menu");
mysql_query("truncate table cache_apachesolr");
mysql_query("truncate table cache_block");
mysql_query("truncate table cache_bootstrap");
mysql_query("truncate table cache_field");
mysql_query("truncate table cache_filter");
mysql_query("truncate table cache_form");
mysql_query("truncate table cache_image");
mysql_query("truncate table cache_location");
mysql_query("truncate table cache_mailchimp_user");
mysql_query("truncate table cache_menu");
mysql_query("truncate table cache_page");
mysql_query("truncate table cache_path");
mysql_query("truncate table cache_rules");
mysql_query("truncate table cache_token");
mysql_query("truncate table cache_variable");
mysql_query("truncate table cache_views");
mysql_query("truncate table cache_views_data");

?>

