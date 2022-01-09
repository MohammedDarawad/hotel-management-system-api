<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
		$uId = isset($_POST['uId']) ? $_POST['uId'] : "";
	


		$server_name = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel-management-system";
		$response  = array();
		
		$conn = new mysqli($server_name, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "delete from users where users.uId = " .$uId ;
		if ($conn->query($sql) === TRUE) {
			$response['error'] = false;
			$response['message'] = "Reception deleted successfully!";
		} else {
			$response['error'] = true;
			$response['message'] = "Error, " . $conn->error;
			
		}
		echo json_encode($response);

		$conn->close();
	
	}


?>