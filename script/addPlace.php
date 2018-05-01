<?php
include_once 'connect.php';

$info = $_REQUEST["info"];
$city = $_REQUEST["city"];
$district = $_REQUEST["district"];
$street = $_REQUEST["street"];
$house = $_REQUEST["house"];
$new = $_REQUEST["str"];

switch ($info)
{
    case 1: //ГОТОВО
        if ($new=='') {
            echo "<p class='alert'>*Город не введен</p>";
            break;
        }

        $sql = "SELECT * FROM city WHERE city='".$new."'";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            echo "<p class='alert'>*Город уже существует в БД</p>";
            break;
        }

        $sql = "SELECT * FROM city WHERE city=''";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            $sql = "UPDATE city SET city='".$new."' WHERE city='' LIMIT 1";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Город добавлен успешно - 1</p>";
        }
        else {
            $sql = "INSERT INTO city (city) VALUES ('".$new."')";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Город добавлен успешно - 2</p>";
            else
                echo "<p class='alert'>Ошибка БД: *" . mysqli_error($link) . "</p>";
        }


        break;

    case 2:
        if ($new=='') {
            echo "<p class='alert'>*Район не введен</p>";
            break;
        }

        $sql = "SELECT * FROM district WHERE ".$city."='".$new."'";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            echo "<p class='alert'>*Район уже существует в БД</p>";
            break;
        }

        $sql = "SELECT * FROM district WHERE ".$city."=''";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            $sql = "UPDATE district SET ".$city."='".$new."' WHERE ".$city."='' LIMIT 1";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Район добавлен успешно - 1</p>";
        }
        else {
            $sql = "INSERT INTO district (".$city.") VALUES ('".$new."')";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Район добавлен успешно - 2</p>";
            else
                echo "<p class='alert'>Ошибка БД: *" . mysqli_error($link) . "</p>";
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
