<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
		$firstName = isset($_POST['firstName']) ? $_POST['firstName'] : "";
		$lastName = isset($_POST['lastName']) ? $_POST['lastName'] : "";
		$emailAddress = isset($_POST['emailAddress']) ? $_POST['emailAddress'] : "";
		$phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";

		$server_name = "localhost";
		$username = "root";
		$passwordss = "";
		$dbname = "hotel-management-system";
		$response  = array();
		
		$conn = new mysqli($server_name, $username, $passwordss, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "insert into users values (NULL, '" . $firstName . "','" . $lastName . "','" . $emailAddress . "','" . $phoneNumber . "'," . 1 . ",md5('" . $password . "'))";
		if ($conn->query($sql) === TRUE) {
			$response['error'] = false;
			$response['message'] = "Reception Added successfully!";
		} else {
			$response['error'] = true;
			$response['message'] = "Error, " . $conn->error;
			
		}
		echo json_encode($response);

		$conn->close();
	
	}


?>