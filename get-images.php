<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['rId']) && isset($_GET['getAllImages'])) {
        $rId = $_GET['rId'];
        $getAllImages = $_GET['getAllImages'];

        $directory = "images/rooms/" . $rId . "/";

        $images = glob($directory . "*.*");

        $resultarray = array();

        $i = 1;
        foreach ($images as $image) {
            $arr = array('URL' => "http://10.0.2.2/" . $image);
            $resultarray[] = $arr;
        }
        if ($getAllImages == 0) {
            echo json_encode(array($resultarray[0]), JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode($resultarray, JSON_UNESCAPED_SLASHES);
        }
    } else {
        die("wrong input");
    }
}
