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
	$sql = "select rId from reserved where startDate BETWEEN '" . $firstdate . "' AND  '" . $Seconddate . "'"  ;

	$result = $conn->query($sql);
	$arrlength = $result->num_rows;
	$data = array();
	if ($result->num_rows > 0) {
		
		for ($x = 0; $x < $arrlength; $x++) {
			$row = mysqli_fetch_assoc($result);
			$data[] = $row["rId"];
		}
	} else {
		$finalArray = array();
		$sql = "select rId,floor,price from rooms ";
		$result = $conn->query($sql);
		$arrlength = $result->num_rows;
		for ($x = 0; $x < $arrlength; $x++) {
			$row = mysqli_fetch_assoc($result);
			$finalArray[] = $row;
		}
		echo json_encode($finalArray);
		exit ;
	}
	$mysqlData = "select rId from rooms where rId != '" . $data[0] ;
	$data2 = array();
	for ($x = 1; $x < $arrlength; $x++) {
		$mysqlData.=  "'AND rId != '". $data[$x];
	}
	$mysqlData.= "'";
	$result = $conn->query($mysqlData);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$data2[]= $row["rId"];
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
			$finalArray[] = $row;
			$current = $data2[$x];
			$found = 0;
		}
	}
	
	$sql = "select rId,floor,price from rooms where rId=" . $current;
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
	$finalArray[] = $row;
	echo json_encode($finalArray);


	$conn->close();
}