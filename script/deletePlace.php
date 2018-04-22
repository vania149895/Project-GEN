<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];
$info = $_REQUEST["info"];
$city = $_REQUEST["city"];
$district = $_REQUEST["district"];
$street = $_REQUEST["street"];
$house = $_REQUEST["house"];

switch ($info)
{
    case 1:
        $sql = "UPDATE city SET city='' WHERE id=".$id;
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*City deleted successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 2:
        $sql = "UPDATE district SET ".$city."='' WHERE id=".$id;
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*District deleted successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 3:
        $sql = "UPDATE street SET ".$city.$district."='' WHERE id=".$id;
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Street deleted successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 4:
        $sql = "UPDATE house SET ".$city.$district.$street."='' WHERE id=".$id;
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*House deleted successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 5:
        $sql = "ALTER TABLE nofar DROP COLUMN ".$id;
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Category deleted successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
}
include_once 'showPlace.php';
