<?php
//require function and vars
$conn = mysqli_connect("localhost", "root", "", "gallery");
//end of require function and vars


//start of html
include_once PATH_VIEWS . 'head-to-body.php'; //include teg head & body

include_once PATH_VIEWS . 'header.php'; //include header
echo "<a href='index.php'>На главную</a> <br>";
$id = $_GET['id'];
$test = mysqli_query($conn, "SELECT href, view FROM gallery.pictures WHERE id = $id;");
$ress = mysqli_fetch_assoc($test);
$href = $ress['href'];
$view = $ress['view'];
$view++;

echo "<img src='$href' alt='fal'>";


//обновление сч
$sqlU = "UPDATE pictures SET view='$view' WHERE id = '$id'";
mysqli_query($conn, $sqlU);

include_once PATH_VIEWS . 'close-body-html.php';//include close teg body & html
//end of HTML
mysqli_close($conn);


