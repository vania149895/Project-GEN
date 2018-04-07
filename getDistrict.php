<?php
$city = $_REQUEST["q"];
include 'script/connect.php';
global $link;
$query="SELECT ".$city." FROM city ORDER BY ".$city;
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<option value=".$row[$city]."> </option>";
    }
}
else
{
    echo "0 results";
}
?>
