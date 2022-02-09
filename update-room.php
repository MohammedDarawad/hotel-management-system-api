<?php

	
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		// Get data
	   	$check = isset($_POST['check']) ? $_POST['check'] : "";
        $rId = isset($_POST['rId']) ? $_POST['rId'] : "";
		$type = isset($_POST['type']) ? $_POST['type'] : "";
		$capacity = isset($_POST['capacity']) ? $_POST['capacity'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";


		$server_name = "localhost";
		$username = "root";
		$password = "";
		$dbname = "hotel-management-system";
		$response  = array();
        $conn = new mysqli($server_name, $username, $password, $dbname);		
		if ($check == 0) {
            $sql = "update rooms set type ='" . $type ."' where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing Room Type successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 1){
            $sql = "update rooms set capacity =" . $capacity ." where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing Capacity for Room successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 2){
            $sql = "update rooms set type ='" . $type ."' where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $sql = "update rooms set capacity =" . $capacity ." where rId =" . $rId ;
                if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            }
            else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 3){
            $sql = "update rooms set price =" . $price ." where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing Price for Room successfully!";
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 4){
            $sql = "update rooms set type ='" . $type ."' where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $sql = "update rooms set price =" . $price ." where rId =" . $rId ;
                if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            }
            else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 5){
            $sql = "update rooms set capacity =" . $capacity ." where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $sql = "update rooms set price =" . $price ." where rId =" . $rId ;
                if ($conn->query($sql) === TRUE) {
                $response['hasError'] = false;
                $response['message'] = "Editing successfully!";
            }
            else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
        elseif($check == 6){
            $sql = "update rooms set capacity =" . $capacity ." where rId =" . $rId ;
            if ($conn->query($sql) === TRUE) {
                $sql = "update rooms set price =" . $price ." where rId =" . $rId ;
                if ($conn->query($sql) === TRUE) {
                    $sql = "update rooms set type ='" . $type ."' where rId =" . $rId ;
                    if ($conn->query($sql) === TRUE) {
                    
                        $response['hasError'] = false;
                        $response['message'] = "Editing successfully!";
                    }
                    else {
                        $response['hasError'] = true;
                        $response['message'] = "Error, " . $conn->error;
                    }
            }
            else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            } else {
                $response['hasError'] = true;
                $response['message'] = "Error, " . $conn->error;
            }
            echo json_encode($response);
        }
		$conn->close();
	
	}


?>