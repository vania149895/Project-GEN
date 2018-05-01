<?php
include_once 'connect.php';
global $link;
$creative = $_REQUEST["creative"];

if($creative) {
    $sql = "INSERT INTO creative (creative) VALUES ('".$creative."')";

    if (mysqli_query($link, $sql)) {
        echo "<p class='alert'>*Новая запись добавлена успешно</p>";
    } else {
        echo "<p class='alert'>Error: *" . mysqli_error($link) . "</p>";
    }
    include 'creativeInfo.php';
}
else{
    echo "<p class='alert'>*Введите новое значение</p>";
    include 'creativeInfo.php';
}

?>