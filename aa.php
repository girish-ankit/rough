<?php
print_r($_SERVER);

$cdata = '<object width="560" height="340" "="">
      <param name="allowfullscreen" value="true">
      <param name="allowscriptaccess" value="always">
      <param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=114651815&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1">
      <embed src="http://vimeo.com/moogaloop.swf?clip_id=114651815&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1&amp;autoplay=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="645" height="560" wmode="transparent">
      <param name="wmode" value="transparent">
      </object>';

$cdata = preg_replace("(width=\"560\")", "width=\"460\"", $cdata);
$cdata = preg_replace("(height=\"340\")", "height=\"260\"", $cdata);
$cdata = preg_replace("(width=\"645\")", "width=\"460\"", $cdata);
$cdata = preg_replace("(height=\"560\")", "height=\"260\"", $cdata);
$cdata = preg_replace("(autoplay=1)", "autoplay=0", $cdata);
//print $cdata;
?>

