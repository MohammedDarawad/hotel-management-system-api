<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['sId'])) {
        $sId = $_GET['sId'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select name from services where sId=" . $sId;

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        echo json_encode($row);
        $conn->close();
    } else {
        die("wrong input");
    }
}
