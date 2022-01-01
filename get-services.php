<?php
$server_name = "localhost";
$username = "root";
$password = "";
$dbname = "hotel-management-system";

$conn = new mysqli($server_name, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "select * from services";

$result = $conn->query($sql);
$resultarray = array();
while ($row = mysqli_fetch_assoc($result)) {
	$freeArray = explode(",", $row['freeFor']);
	$arr = array('sId' => $row['sId'], 'name' => $row['name'], 'description' => $row['description'], 'price' => $row['price'], 'freeFor' => $freeArray, 'imageURL' => $row['imageURL']);
	$resultarray[] = $arr;
}
echo json_encode($resultarray, JSON_UNESCAPED_SLASHES);
$conn->close();
