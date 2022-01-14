<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	if (isset($_GET['type'])) {
		$type = $_GET['type'];

		$server_name = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbname = "hotel-management-system";

		$conn = new mysqli($server_name, $username, $dbpassword, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "select * from services";

		$result = $conn->query($sql);
		$resultarray = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$freeArray = explode(",", $row['freeFor']);
			if (in_array($type, $freeArray)){
				$row['price'] = 0;
			}
			$arr = array('sId' => $row['sId'], 'name' => $row['name'], 'description' => $row['description'], 'price' => $row['price'], 'imageURL' => $row['imageURL']);
			$resultarray[] = $arr;
		}
		echo json_encode($resultarray);
		$conn->close();
	} else {
		die("wrong input");
	}
}
