<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
		$floor = isset($_POST['floor']) ? $_POST['floor'] : "";
		$type = isset($_POST['type']) ? $_POST['type'] : "";
		$capacity = isset($_POST['capacity']) ? $_POST['capacity'] : "";


		$server_name = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel-management-system";
		$response  = array();
		
		$conn = new mysqli($server_name, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "insert into rooms values (NULL, " . $floor . "," . 0 . ",'" . $type . "'," . $capacity . ")";
		if ($conn->query($sql) === TRUE) {
			$response['error'] = false;
			$response['message'] = "Room Added successfully!";
		} else {
			$response['error'] = true;
			$response['message'] = "Error, " . $conn->error;
			
		}
		echo json_encode($response);

		$conn->close();
	
	}


?>