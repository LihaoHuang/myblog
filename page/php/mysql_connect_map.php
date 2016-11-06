<?php
		$dbhost = 'localhost';
		$dbuser = '40343232';
		$dbpass = '40343232';
		$dbname = '40343232';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db($dbname);

		$sql = "SELECT * FROM  `Map`";
		$result = mysql_query($sql) or die('MySQL query error');

		$i = 0;
		while($row = mysql_fetch_array($result))
		{
			$px[$i] = $row['x'];
			$py[$i] = $row['y'];
			$ptitle[$i] = $row['title'];
			$pcontents[$i] = $row['contents'];
			$i = $i+1;
		}
		$pnumber = count($px);
?>