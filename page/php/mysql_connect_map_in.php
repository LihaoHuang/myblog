<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
		$dbhost = '140.130.35.62:8082';
		$dbuser = '40343232';
		$dbpass = '40343232';
		$dbname = '40343232';
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');
		mysqli_query($conn, "SET NAMES 'utf8'");
		// mysql_select_db($dbname);

		$sql = "SELECT * FROM  `Map_in`";
		$result = mysqli_query($conn, $sql) or die('MySQL query error');

		$i = 0;
		while($row = mysqli_fetch_array($result))
		{
			$px[$i] = $row['x'];
			$py[$i] = $row['y'];
			$ptitle[$i] = $row['title'];
			$pcontents[$i] = $row['contents'];
			$i = $i+1;
		}
		$pnumber = count($px);
?>