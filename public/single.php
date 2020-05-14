<?php
//require function and vars
$conn = mysqli_connect("localhost", "root", "VvladmirRwh10", "gallery");
//end of require function and vars


//start of html
include_once PATH_VIEWS . 'head-to-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header.php'; //include header
echo "<a href='index.php'>На главную</a> <br>";
$id = $_GET['id'];
$test = mysqli_query($conn, "SELECT href FROM gallery.pictures WHERE id = $id;");
$ress = mysqli_fetch_assoc($test);
$href = $ress['href'];

echo "<img src='$href' alt='fal'>";

include_once PATH_VIEWS . 'close-body-html.php';//include close teg body & html
//end of HTML
mysqli_close($conn);


