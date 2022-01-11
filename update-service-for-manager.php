<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
        $sId  = isset($_POST['sId']) ? $_POST['sId'] : "";
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
		if (strcmp($name, "") > 0) {
            $sql = "update services set name ='" . $name ."' where sId =" . $sId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        if (strcmp($description, "") > 0) {
            $sql = "update services set description ='" . $description ."' where sId =" . $sId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        if (strcmp($price, "") > 0) {
            $sql = "update services set price =" . $price ." where sId =" . $sId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        if (strcmp($freeFor, "") > 0) {
            $sql = "update services set freeFor ='" . $freeFor ."' where sId =" . $sId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
       
       

		$conn->close();
	
	}


?>