<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];
$creative = $_REQUEST["creative"];

$sql = "UPDATE creative SET creative='".$creative."' WHERE id=".$id;

if (mysqli_query($link, $sql)) {
    echo "<p class='alert'>*Данные успешно обновлены</p>";
} else {
    echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
}
include 'creativeInfo.php';
?>