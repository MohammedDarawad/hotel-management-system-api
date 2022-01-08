<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['sId']) && isset($_POST['rId'])) {
        $sId = $_POST['sId'];
        $rId = $_POST['rId'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $response = array();

        $sql = "insert into requestedservices values (NULL," . $sId . "," . $rId . ")";
        if ($conn->query($sql) === TRUE) {
            $response['error'] = false;
            $response['message'] = "service requested successfully!";
        } else {
            $response['error'] = true;
            $response['message'] = "Error, " . $conn->error;
        }
        echo json_encode($response);
        $conn->close();
    } else {
        die("wrong input");
    }
}
