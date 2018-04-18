<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];


$sql = "DELETE FROM users WHERE id=".$id;

if (mysqli_query($link, $sql)) {
    echo "<p class='alert'>*User deleted successfully</p>";
} else {
    echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
}
include 'usersInfo.php';
?>