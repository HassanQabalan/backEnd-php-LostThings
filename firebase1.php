<?php
echo "connection sucsses...."	;
$host = "http://track-kids.com";
$db_user = "Mohammad";
$db_password = "azazazazazazazaz";
$db_name = "trackkid_my_database";

$con = mysql_connect ($host,$db_user,$db_password,$db_name);
if ($con){
	echo "connection sucsses...."	;
}else{
	echo "Not sucsses......";}
?>