<?php
	function db_connect(){
		$db_host = 'localhost';
		$db_user = 'root';
		$db_pass = '';
		$db_name = 'xtraskool';
		$connection = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		if (mysqli_connect_error($connection)) {
			die('error:'.'mysqli_connect_error($connection)');
		} else {
			return $connection;
		}
		
	}
?>