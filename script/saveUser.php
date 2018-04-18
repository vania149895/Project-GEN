<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];
$user = $_REQUEST["user"];
$password = $_REQUEST["password"];
$admin = $_REQUEST["admin"];

$sql = "UPDATE users SET user='".$user."', password='".$password."', admin=".$admin." WHERE id=".$id;

if (mysqli_query($link, $sql)) {
    echo "<p class='alert'>*Successfully updated</p>";
} else {
    echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
}
include 'usersInfo.php';
?>