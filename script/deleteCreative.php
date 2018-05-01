<?php
include_once 'connect.php';
global $link;
$id = $_REQUEST["id"];


$sql = "DELETE FROM creative WHERE id=".$id;

if (mysqli_query($link, $sql)) {
    echo "<p class='alert'>*Запись удалена успешно</p>";
} else {
    echo "<p class='alert'>Error: *".mysqli_error($link)."</p>";
}
include 'creativeInfo.php';
?>