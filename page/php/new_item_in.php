<?php
	$dbhost = 'localhost';
	$dbuser = '40343232';
	$dbpass = '40343232';
	$dbname = '40343232';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($dbname);


	$sqlvalue = $_GET['value'];
	$sqllongitude = $_GET['longitude'];
	$sqllatitude = $_GET['latitude'];

	$value = "INSERT INTO `Map_in`(`title`, `x`, `y`, `contents`) VALUES ('遊客','$sqllatitude','$sqllongitude','$sqlvalue')";
	mysql_query($value) or die("無法送出".mysql_error());
?>
<script>
	javascript:location.replace("../map_project1/map_in.html");
</script>
