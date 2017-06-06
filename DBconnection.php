<?php
	try{
		$host = 'studentnet.dundeeandangus.ac.uk';
		$dbname = 'db_1507342';
		$username = '1507342';
		$password = '•••••••';
		
		$con = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$username,$password);
	}
	
	catch (PDOException $e){
		die("DB connection: failed");
	}
?>