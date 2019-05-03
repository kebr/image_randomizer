<?php
session_start();
if (!isset($_SESSION["images"])) {
//images array not available
//get images
    $images = scandir("images/");
//fix relative directory
    array_splice($images, 0, 1);
    array_splice($images, 0, 1);
//create session
    $_SESSION["images"] = $images;
//refresh
    header("Location: test.php");
} else {
//image array is created
    $images = $_SESSION["images"];
    if (empty($images)) {
        session_destroy();
        header("Location: test.php");
    }
    echo "Before pop:<br>";
    print_r($images);

    $random = array_rand($images, 1);
    echo "<br>";
    echo "<br>Random element: " . $images[$random] . "<br>";
    unset($images[$random]);
    echo "<br>After pop:<br>";
    print_r($images);
    $_SESSION["images"] = $images;
}
?>