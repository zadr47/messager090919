<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/connection.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/function.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/session.php');

$conn = conn();


$sql = "DROP TABLE data_user";
$conn->query($sql);

$sql = "DROP TABLE registration_data";
$conn->query($sql);

$conn = NULL;

header('Location:/');
