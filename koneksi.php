<?php
$host 		= mysql_connect("localhost","root","");
$db 		= mysql_select_db("pppptk");
$base 		= "http://".$_SERVER['HTTP_HOST'];
$url  		= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/';
$base_url	= $base.$url;

function antiinjection($data){
  $cleaner = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $cleaner;
}
?>