<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$rId = isset($_POST['rId']) ? $_POST['rId'] : "";

		$server_name = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel-management-system";
		$response  = array();
		
		$conn = new mysqli($server_name, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "update reserved set isCheckedIn=1 where rId=".$rId;
		if ($conn->query($sql) === TRUE) {
			$response['error'] = false;
			$response['message'] = "Checked in successfully!";
		} else {
			$response['error'] = true;
			$response['message'] = "Error, " . $conn->error;
			
		}
		echo json_encode($response);

		$conn->close();
	
	}
