<?php

function damp($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

function create_table_registration_data(){

	$conn = conn();

	try{
		$sql = "SELECT * FROM registration_data;";
		$conn->query($sql);

	}catch(PDOException $e){
		$sql = "CREATE TABLE registration_data ( id INT, login VARCHAR(255), password VARCHAR(255), date_reg INT , secret_question VARCHAR(255) , answer VARCHAR(255) );";
		$conn->query($sql);
	}

	$conn = NULL;
}

function create_table_data_user(){
	$conn = conn();

	try{
		$sql = "SELECT * FROM data_user;";
		$conn->query($sql);

	}catch(PDOException $e){
		$sql = "CREATE TABLE data_user ( id INT, name VARCHAR(255), last_name VARCHAR(255), date_of_birth  INT , path_to_avatar VARCHAR(255) );";
		$conn->query($sql);
	}

	$conn = NULL;
}
function create_table_friends(){
	$conn = conn();

	try{
		$sql = "SELECT * FROM friends;";
		$conn->query($sql);

	}catch(PDOException $e){
		$sql = "CREATE TABLE friends ( id INT , friend VARCHAR(255) , another_id INT , another_friend VARCHAR(255));";
		$conn->query($sql);
	}

	$conn = NULL;
}

function is_login($login){
	//логин существует?
	$conn = conn();
	$sql = "SELECT login FROM registration_data WHERE login = ?";
	$snapshot = $conn->prepare($sql);
	$snapshot->execute([$login]);
	$data_DB = $snapshot->fetchAll(PDO::FETCH_ASSOC);
	$count_login = count($data_DB);
	if($count_login > 0){
		return true;
	}else{
		return false;
	}
}

function is_true_password($login,$password){
	$conn = conn();
	$sql = "SELECT password FROM registration_data WHERE login = ?";
	$snapshot = $conn->prepare($sql);
	$snapshot->execute( [$login] );
	$data_DB = $snapshot->fetchAll(PDO::FETCH_ASSOC);
	$conn = NULL;
	$password_in_DB = $data_DB[0]['password'];
	if(md5($password)==$password_in_DB){
		return true;
	}else{
		return false;
	}
}
function is_access(){
	if(!isset($_SESSION['connection'])){
		header('Location:/');
	}
}