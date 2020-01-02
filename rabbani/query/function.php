<?php

	$host = "localhost";
	$uname = "root";
	$pw = "";
	$dbName = "db_rabbani";
	$connect = mysqli_connect($host, $uname, $pw, $dbName);

function query($query)
{
	global $connect;
	$result = mysqli_query($connect, $query);
	$rows = [];
	 while ( $data = mysqli_fetch_assoc($result) ) {
	 	$rows[] = $data;
	 }

	return $rows;
	
}

	
?>