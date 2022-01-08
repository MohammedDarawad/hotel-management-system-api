<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['rId'])) {
        $rId = $_GET['rId'];

        $directory = "images/rooms/" . $rId . "/";

        $images = glob($directory . "*.*");

        $resultarray = array();

        $i = 1;
        foreach ($images as $image) {
            $arr = array('image' => "http://10.0.2.2/".$image);
            $resultarray[] = $arr;
        }
        echo json_encode($resultarray,JSON_UNESCAPED_SLASHES);

    } else {
        die("wrong input");
    }
}
