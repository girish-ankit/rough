<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
?>
<html> 
<head> 

<script language="JavaScript" type="text/javascript">
function makeFrame(URL) { 
var domeUrl = 'http://online.verypdf.com/app/reader/web/viewer.html?url=';
var myUrl  = 'http://htpdev.joinceo.com/public/'
var pdfUrl = URL;
var options = '&noprint=1&noopen=1&nodownload=1'

var fullUrl = domeUrl+myUrl+pdfUrl+options;

//alert(fullUrl);

   ifrm = document.createElement("IFRAME"); 
   ifrm.setAttribute("src", 'http://htpdev.joinceo.com/public/test-1.pdf'); 
   ifrm.style.width = 800+"px"; 
   ifrm.style.height = 800+"px"; 
   document.body.appendChild(ifrm); 

} 
</script> 
</head> 
<body>
<p>Welcome to pdf site</p>
<?php  
$UrlARR = array('test-1.pdf', 'test-2.pdf', 'test-2.pdf'); 
if(isset($_GET['q'])){
$key = $_GET['q'];
if (array_key_exists($key,$UrlARR)){
?>
<p><a href="javascript:void(0)" onMouseDown="makeFrame('<?php echo $UrlARR[1]?>')">GO! </a></p> 
<?php
}else{
echo 'File doesn\'t exits';
}
}

?>



</body> 
</html> 
