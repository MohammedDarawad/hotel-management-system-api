<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    $server_name = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel-management-system";
    $response  = array();

    $conn = new mysqli($server_name, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "delete from requestedservices where id=" . $id;
    if ($conn->query($sql) === TRUE) {
        $response['hasError'] = false;
        $response['message'] = "Request Completed";
    } else {
        $response['hasError'] = true;
        $response['message'] = "Error, " . $conn->error;
    }
    echo json_encode($response);

    $conn->close();
}
