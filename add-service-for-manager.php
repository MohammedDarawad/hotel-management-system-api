<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
		$name = isset($_POST['name']) ? $_POST['name'] : "";
		$description = isset($_POST['description']) ? $_POST['description'] : "";
		$price = isset($_POST['price']) ? $_POST['price'] : "";
        $freeFor = isset($_POST['freeFor']) ? $_POST['freeFor'] : "";
        

		$server_name = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel-management-system";
		$response  = array();
		
		$conn = new mysqli($server_name, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "insert into services values (NULL, '" . $name . "','" . $description . "'," . $price . ",'" . $freeFor . "','" . " " ."')";
		if ($conn->query($sql) === TRUE) {
			$response['error'] = false;
			$response['message'] = "Service Added successfully!";
		} else {
			$response['error'] = true;
			$response['message'] = "Error, " . $conn->error;
			
		}
		echo json_encode($response);

		$conn->close();
	
	}


?>