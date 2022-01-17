<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['emailAddress'])) {
        $emailAddress = $_GET['emailAddress'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from users where emailAddress='" . $emailAddress . "'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        $arr = array("firstName" => $row['firstName'],"uId" => $row['uId']);

        echo json_encode($arr);
        $conn->close();
    } else {
        die("wrong input");
    }
}