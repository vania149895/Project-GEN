<?php
include_once 'connect.php';
global $link;
$user = $_REQUEST["user"];
$password = $_REQUEST["password"];
$admin = $_REQUEST["admin"];
if($user || $password) {
    $sql = "INSERT INTO users (user, password, admin) VALUES ('" . $user . "','" . $password . "'," . $admin . ")";

    if (mysqli_query($link, $sql)) {
        echo "<p class='alert'>*New record created successfully</p>";
    } else {
        echo "<p class='alert'>Error: *" . mysqli_error($link) . "</p>";
    }
    include 'usersInfo.php';
}
else{
    echo "<p class='alert'>*Not user name or password</p>";
    include 'usersInfo.php';
}

?>