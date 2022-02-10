<?php
$firstdate = "";
$Seconddate = "";
if (isset($_GET['firstdate']) && isset($_GET['Seconddate'])) {
	$firstdate = $_GET['firstdate'];
	$Seconddate = $_GET['Seconddate'];
}
if (!empty($firstdate) && !empty($Seconddate)) {
	$server_name = "localhost";
	$username = "root";
	$password = "";
	$dbname = "hotel-management-system";

	$conn = new mysqli($server_name, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "select rId from reserved where startDate <= '" . $firstdate . "' AND endDate >= '" . $Seconddate . "'";

	$result = $conn->query($sql);
	$arrlength = $result->num_rows;
	$data = array();
	if ($result->num_rows > 0) {
		// output data of each row
		for ($x = 0; $x < $arrlength; $x++) {
			$row = $result->fetch_assoc();
			$data[$x] = $row["rId"];
		}
	} else {
		echo "no room";
		exit;
	}

	for ($x = 0; $x < $arrlength; $x++) {
		$sql = "select rId from rooms where rId != '" . $data[$x] . "'";
		$result = $conn->query($sql);
		$arrlength = $result->num_rows;
		$data2 = array();
		if ($result->num_rows > 0) {
			for ($x = 0; $x < $arrlength; $x++) {
				$row = $result->fetch_assoc();
				$data2[$x] = $row["rId"];
			}
		}
	}

	$arrlength = count($data2);
	$current = $data2[0];
	$found = 0;

	$finalArray = array();

	for ($x = 0; $x < $arrlength; $x++) {
		if ($current == $data2[$x] && $found == 0) {
			$found = 1;
		} else if ($current != $data2[$x]) {
			$sql = "select rId,floor,price from rooms where rId=" . $current;
			$result = $conn->query($sql);
			$row = mysqli_fetch_assoc($result);
			echo json_encode($row);
			$current = $data2[$x];
			$found = 0;
		}
	}
	
	$sql = "select rId,floor,price from rooms where rId=" . $current;
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	echo json_encode($row);


	$conn->close();
}