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
                echo "<p class='alert'>*Город добавлен успешно</p>";
        }
        else {
            $sql = "INSERT INTO city (city) VALUES ('".$new."')";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Город добавлен успешно</p>";
            else
                echo "<p class='alert'>Ошибка БД: *" . mysqli_error($link) . "</p>";
        }
        $sql = "SELECT ".$new." FROM district";
        $result=mysqli_query($link, $sql);
        if (!$result){
            $sql = "ALTER TABLE district ADD ".$new." VARCHAR(20) NOT NULL";
            $result=mysqli_query($link, $sql);
        }
        break;

    case 2:
        if ($new=='') {
            echo "<p class='alert'>*Район не введен</p>";
            break;
        }
        if(!$city){
            echo "<p class='alert'>*Укажите город</p>";
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
                echo "<p class='alert'>*Район добавлен успешно</p>";
        }
        else {
            $sql = "INSERT INTO district (".$city.") VALUES ('".$new."')";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Район добавлен успешно</p>";
            else
                echo "<p class='alert'>Ошибка БД: *" . mysqli_error($link) . "</p>";
        }
        $sql = "SELECT ".$city.$new." FROM street";
        $result=mysqli_query($link, $sql);
        if (!$result){
            $sql = "ALTER TABLE street ADD ".$city.$new." VARCHAR(30) NOT NULL";
            $result=mysqli_query($link, $sql);
        }
        break;


    case 3:
        if ($new=='') {
            echo "<p class='alert'>*Улица не введена</p>";
            break;
        }
        if(!$city){
            echo "<p class='alert'>*Укажите город</p>";
            break;
        }
        if(!$district){
            echo "<p class='alert'>*Укажите район</p>";
            break;
        }

        $sql = "SELECT * FROM street WHERE ".$city.$district."='".$new."'";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            echo "<p class='alert'>*Улица уже существует в БД</p>";
            break;
        }

        $sql = "SELECT * FROM street WHERE ".$city.$district."=''";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            $sql = "UPDATE street SET ".$city.$district."='".$new."' WHERE ".$city.$district."='' LIMIT 1";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Улица добавлена успешно</p>";
        }
        else {
            $sql = "INSERT INTO street (".$city.$district.") VALUES ('".$new."')";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Улица добавлена успешно</p>";
            else
                echo "<p class='alert'>Ошибка БД: *" . mysqli_error($link) . "</p>";
        }
        $sql = "SELECT ".$city.$district.$new." FROM house";
        $result=mysqli_query($link, $sql);
        if (!$result){
            $sql = "ALTER TABLE house ADD ".$city.$district.$new." VARCHAR(4) NOT NULL";
            $result=mysqli_query($link, $sql);
        }
        break;

    case 4:
        if ($new=='') {
            echo "<p class='alert'>*Улица не введена</p>";
            break;
        }
        if(!$city){
            echo "<p class='alert'>*Укажите город</p>";
            break;
        }
        if(!$district){
            echo "<p class='alert'>*Укажите район</p>";
            break;
        }
        if(!$street){
            echo "<p class='alert'>*Укажите улицу</p>";
            break;
        }

        $sql = "SELECT * FROM house WHERE ".$city.$district.$street."='".$new."'";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            echo "<p class='alert'>*Дом уже существует в БД</p>";
            break;
        }

        $sql = "SELECT * FROM house WHERE ".$city.$district.$street."=''";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) != 0) {
            $sql = "UPDATE house SET ".$city.$district.$street."='".$new."' WHERE ".$city.$district.$street."='' LIMIT 1";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Дом добавлен успешно</p>";
        }
        else {
            $sql = "INSERT INTO house (".$city.$district.$street.") VALUES ('".$new."')";
            if (mysqli_query($link, $sql))
                echo "<p class='alert'>*Дом добавлен успешно</p>";
            else
                echo "<p class='alert'>Ошибка БД: *" . mysqli_error($link) . "</p>";
        }
        $sql = "SELECT house FROM nofar WHERE house='".$city.$district.$street.$new."'";
        $result=mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 0){
            $sql = "SELECT house FROM nofar WHERE house=''";
            $result=mysqli_query($link, $sql);
            if (mysqli_num_rows($result) != 0) {
                $sql = "UPDATE nofar SET house='".$city.$district.$street.$new."' WHERE house='' LIMIT 1";
                mysqli_query($link, $sql);
            }
            else {
                $sql = "INSERT INTO nofar (house) VALUES ('" . $city . $district . $street . $new . "')";
                $result = mysqli_query($link, $sql);
            }
        }
        break;
}
include_once 'showPlace.php';
