<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];
$info = $_REQUEST["info"];
$city = $_REQUEST["city"];
$district = $_REQUEST["district"];
$street = $_REQUEST["street"];
$house = $_REQUEST["house"];


        $sql = "UPDATE nofar SET info='".$id."' WHERE house='".$city.$district.$street.$house."'";
        if (mysqli_query($link, $sql)) {
            echo "<p class='alert'>*Description changed successfully</p>";
        } else
            echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
include_once 'showPlace.php';
