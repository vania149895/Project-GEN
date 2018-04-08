<?php
$city = $_REQUEST["city"].$_REQUEST["district"];

include 'connect.php';
global $link;
$query="SELECT ".$city." FROM street ORDER BY ".$city;
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option value=".$row[$city]."></option>";
    }
}
else
{
    echo "<option value='--Район не найден--'></option>";
}
