<!--<html onclick="location.reload();">-->

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
    header("Location: img.php");
} else {
//image array is created
    $images = $_SESSION["images"];
    if (empty($images)) {
        session_destroy();
        header("Location: img.php");
    }


    $random = array_rand($images, 1);

}
?>
<html>
<head>
    <title>img</title>
    <style>
        * {
            margin: 0;
            overflow-y: hidden;
            background-color: black;
        }

        body {
            height: 100%;
            background-size: contain;
            background: url("images/<?php echo $images[$random]; ?>") no-repeat center;
        }
    </style>


</head>
<body onclick="location.reload()"><br>
<!--<a href="stop.php">stop</a>-->


</body>
</html>
<?php
unset($images[$random]);
$_SESSION["images"] = $images;
?>