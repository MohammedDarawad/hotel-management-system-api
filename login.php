<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['emailAddress']) && isset($_POST['password'])) {
        $emailAddress = $_POST['emailAddress'];
        $password = $_POST['password'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from users where emailaddress = '" . $emailAddress . "' and password=md5('" . $password . "');";

        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            $response['user'] = $row;
        } else {
            $response['user'] = $row;
            //$response['message'] = "No such user exists";
        }
        echo json_encode($response);
        $conn->close();
    } else {
        die("wrong input");
    }
}
