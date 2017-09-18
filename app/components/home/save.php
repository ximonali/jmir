<?php
require_once '../../config/db.php'; 

//Get variables after validations
$name = $mysqli->real_escape_string($_POST['name']);
$province = $mysqli->real_escape_string($_POST['province']);
$telephone = $mysqli->real_escape_string($_POST['telephone']);
$postalcode = $mysqli->real_escape_string($_POST['postalcode']);
$salary = $mysqli->real_escape_string($_POST['salary']);

$query_id = "Select id from provinces where name = '$province'";

$result = $mysqli-> query($query_id) or die($mysqli->error.__LINE__);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$my_id = $row['id'];
	}
}

$query = "INSERT INTO users (name,telephone,province_id,postal_code,salary) 
VALUES ('$name', '$telephone', '$my_id', '$postalcode', '$salary')";

$result = $mysqli-> query($query) or die($mysqli->error.__LINE__);

//return $result;



?>