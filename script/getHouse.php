<?php
$house = $_REQUEST["city"].$_REQUEST["district"].$_REQUEST["street"];
include 'connect.php';
global $link;
$query="SELECT ".$house." FROM house ORDER BY ".$house;
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option value=".$row[$house]."></option>";
    }
}
else
{
    echo "<option value='--Улица не найдена в БД--'></option>";
}
