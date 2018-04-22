<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];
$info = $_REQUEST["info"];
$set = $_REQUEST["set"];
$city = $_REQUEST["city"];
$district = $_REQUEST["district"];
$street = $_REQUEST["street"];
$house = $_REQUEST["house"];

switch ($set)
{
    case 0:
        $sql = "UPDATE nofar SET ".$id."='' WHERE house='".$city.$district.$street.$house."'";
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Info changed successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 5:
        $sql = "UPDATE nofar SET ".$id."='5' WHERE house='".$city.$district.$street.$house."'";
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Info changed successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 10:
        $sql = "UPDATE nofar SET ".$id."='10' WHERE house='".$city.$district.$street.$house."'";
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Info changed successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;
    case 15:
        $sql = "UPDATE nofar SET ".$id."='15' WHERE house='".$city.$district.$street.$house."'";
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Info changed successfully</p>";
        } else {
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
        }
        break;

}
include_once 'showPlace.php';
