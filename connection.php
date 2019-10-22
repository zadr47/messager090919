<?php

function conn(){

	####

	//heroku
	$driver = 'pgsql';
	$host = 'ec2-174-129-255-7.compute-1.amazonaws.com';				
	$db_name = 'dd1qpeu338vg4e';
	$user = "wsjdszqwvxriug";
	$charset = 'utf8';
	$pass = '7ff74fa28f1aae13891db4b9ee65a3832b4b1f45b692d26175b118819b5ab42d';
	$port = '5432';
	$dbpath ='';
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

/*		
	//опен сервер
	$driver = 'mysql';				
	$host = 'messager090919';				
	$db_name = 'messager090919';
	$user = "root";
	$charset = 'utf8';
	$pass = '';
	$port = '';
	$dbpath ='';
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
*/	

	switch ($driver) {
		case 'pgsql':
				$dbconn = "pgsql:host=$host;port=$port;dbname=$db_name";
			break;
		
		case 'mysql':
				$dbconn = "mysql:host=$host;dbname=$db_name";
			break;

		case 'sqlite':
				$dbconn = "sqlite:$dbpath";
			break;
	}

	try {  
		$conn = new PDO($dbconn,$user,$pass,$options);
		//echo "соединение прошло усешно!\nПрекрасно! Поздравляю!";
	}  
	catch(PDOException $e) {  
	    echo $e->getMessage();  
	}
	return $conn;
}
?>
