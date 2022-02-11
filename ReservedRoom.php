<?php
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		$rId = isset($_POST['rId']) ? $_POST['rId'] : "";
		$uId = isset($_POST['uId']) ? $_POST['uId'] : "";
		$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : "";
		$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : "";
        $isCheckedIn = isset($_POST['isCheckedIn']) ? $_POST['isCheckedIn'] : "";
		
		$server_name = "localhost";
		$username = "root";
		$passwordss = "";
		$dbname = "hotel-management-system";
		$response  = array();
		

		
		$conn = new mysqli($server_name, $username, $passwordss, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		} 
		
		$sql = "insert into reserved (rId ,uId ,startDate,endDate,isCheckedIn ) values ( '" . $rId . "','" . $uId . "','" . $startDate . "','" . $endDate . "'," . $isCheckedIn .")";
		
		if ($conn->query($sql) === TRUE) {
			$response['error'] = false;
			$response['message'] = "Reserved successfully!";
		} else {
			$response['error'] = true;
			$response['message'] = "Error, " . $conn->error;			
		}
		echo json_encode($response);



	}  




?>