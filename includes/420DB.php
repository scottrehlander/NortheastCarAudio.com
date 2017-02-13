<?php

	function getDBConnection()
	{
		$dbServer = "db1552.perfora.net";
		$dbName = "db251011027";
		$dbUser = "dbo251011027";
		$dbPassword = "7JbuDQyJ";
		
		$con = mysql_connect($dbServer, $dbUser, $dbPassword);
		if(!$con)
			die(mysql_error());
			
		mysql_select_db($dbName, $con);

		return $con;
	}
	
	function getNavigation($con)
	{
		$sql = "SELECT * FROM Navigation";
	
		$result = prepareCommand($sql, $con);
		
		return $result;
	}
	
	function getAlbums($con)
	{
		$sql = "SELECT * FROM Albums";
		
		$result = prepareCommand($sql, $con);
		
		return $result;
	}
	
	function prepareCommand($sql, $con)
	{
		$result = mysql_query($sql, $con) or die(mysql_error());
		return $result;
	}
?>