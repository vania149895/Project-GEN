<?php
    include_once 'connect.php';
    global $link;
    $city=$_REQUEST["city"];
    $district=$_REQUEST["district"];
    $street=$_REQUEST["street"];
    $house=$_REQUEST["house"];?>

<table class='adminTable' border="1" align="center">
    <tr><td class="head"> Объект </td><td class="head"> 5 минут </td><td class="head"> 10 минут </td><td class="head"> 15 минут </td></tr>


<?php
    $result = mysqli_query( $link, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='nofar'");
    $result2 = mysqli_query( $link, "SELECT * FROM nofar WHERE house='".$city.$district.$street.$house."'");
    $row2 = mysqli_fetch_assoc($result2);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if ($row["COLUMN_NAME"]!='id' && $row["COLUMN_NAME"]!='house' && $row["COLUMN_NAME"]!='info') {
                echo "<tr><td>" . $row["COLUMN_NAME"] . "</td>";
                switch ($row2[$row["COLUMN_NAME"]]) {
                    case '5':
                        echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."' checked ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td>";
                        break;
                    case '10':
                        echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."' ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."' checked></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td>";
                        break;
                    case '15':
                        echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."' ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."' checked></td>";
                        break;
                    default:
                        echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."'  ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td>";
                        break;
                }
                echo "</tr>";
            }
        }
    } else {
        echo "0 results";
    }
    ?>
</table>
<?php
if ($row2["info"])
    echo "<textarea placeholder='Дополнительное описание местности' id='house_info'>".$row2["info"]."</textarea>";
else
    echo "<textarea placeholder='Дополнительное описание местности' id='house_info'></textarea>";
?>
