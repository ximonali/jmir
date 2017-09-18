<?php 
header('Content-type:application/json;charset=utf-8');
require_once '../../config/db.php'; 

$query = "SELECT p.name as province, u.* FROM users u INNER JOIN provinces p ON u.province_id = p.id ORDER BY p.id ASC";


$result = $mysqli->query($query) or die($mysqli->error.__LINE__);


$arr = array();

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;
	}
}

echo $json_response = json_encode($arr);
?>
