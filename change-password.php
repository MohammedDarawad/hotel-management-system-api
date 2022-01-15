<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['emailAddress']) && isset($_POST['oldPassword'])  && isset($_POST['newPassword'])) {
        $emailAddress = $_POST['emailAddress'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];

        $server_name = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "hotel-management-system";

        $conn = new mysqli($server_name, $username, $dbpassword, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $response = array();

        $sql = "select * from users where emailaddress='" . $emailAddress . "' and password=md5('" . $oldPassword . "')";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {

            $sql2 = "update users set password=md5('" . $newPassword . "') where emailAddress='" . $emailAddress . "'";
            $conn->query($sql2);

            $response['hasError'] = false;
            $response['message'] = "Password Changed Successfully";
        } else {
            $response['hasError'] = true;
            $response['message'] = "Old Password Is Incorrect";
        }
        echo json_encode($response);
        $conn->close();
    } else {
        die("wrong input");
    }
}
