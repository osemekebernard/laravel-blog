<?php
		#This handles only the database connection...

		$DBhost = 'localhost';
		$DBuser = 'root';
		$DBpassword = 'root';
		$DBname = 'DavidWork';

		$DBcon = new MySQLi($DBhost, $DBuser, $DBpassword, $DBname);

		if ($DBcon->connect_errno)  die("ERROR: -> ".$DBcon->connect_error);
?>
