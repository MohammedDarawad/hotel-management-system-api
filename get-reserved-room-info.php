<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['rId'])) {
        $rId = $_GET['rId'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from reserved where rId=" . $rId;
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);

        echo json_encode($row);
        $conn->close();
    } else {
        die("wrong input");
    }
}