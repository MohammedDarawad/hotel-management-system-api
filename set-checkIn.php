<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$id = isset($_POST['id']) ? $_POST['id'] : "";
	$val = isset($_POST['val']) ? $_POST['val'] : "";

	$server_name = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel-management-system";
	$response  = array();

	$conn = new mysqli($server_name, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	if ($val == 1) {
		$sql = "update reserved set isCheckedIn=1 where id=" . $id;
		if ($conn->query($sql) === TRUE) {
			$response['hasError'] = false;
			$response['message'] = "Checked in successfully!";
		} else {
			$response['hasError'] = true;
			$response['message'] = "Error, " . $conn->error;
		}
		echo json_encode($response);
	} else {
		$sql = "delete from reserved where id=" . $id;
		if ($conn->query($sql) === TRUE) {
			$response['hasError'] = false;
			$response['message'] = "Checked out successfully!";
		} else {
			$response['hasError'] = true;
			$response['message'] = "Error, " . $conn->error;
		}
		echo json_encode($response);
	}

	$conn->close();
}
