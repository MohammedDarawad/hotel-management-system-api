<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['uId'])) {
        $uId = $_GET['uId'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from reserved where uId=" . $uId;

        $result = $conn->query($sql);
        $resultarray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $resultarray[] = $row;
        }
        echo json_encode($resultarray);
        $conn->close();
    } else {
        die("wrong input");
    }
}
