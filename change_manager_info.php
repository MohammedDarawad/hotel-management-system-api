<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
	   	$check = isset($_POST['check']) ? $_POST['check'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
		$newPassword = isset($_POST['newPassword']) ? $_POST['newPassword'] : "";
		
		$server_name = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel-management-system";
		$response  = array();
        $conn = new mysqli($server_name, $username, $password, $dbname);		
		if ($check == 0) {
            $sql = "update users set emailAddress ='" . $email ."' where uid = 1" ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Changed Email successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 1){
            $sql = "update users set password =md5('" . $newPassword ."') where uid = 1";
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Changed Password successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        $conn->close();
	
	}


?>