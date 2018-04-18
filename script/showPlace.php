<table class='adminTable' border="1" align="center">
    <?php
    include_once 'connect.php';
    global $link;
    $info = $_REQUEST["info"];
    $city = $_REQUEST["city"];
    $district = $_REQUEST["district"];
    $street = $_REQUEST["street"];
    $house = $_REQUEST["house"];

    switch ($info)
    {
        case 1:
            echo "<tr><td class='head'> Город </td><td class='head'>Удалить</td></tr>";
            $result = mysqli_query( $link, "SELECT id,city FROM city WHERE city!='' ORDER BY city");
            if (mysqli_num_rows($result) > 0)
                while($row = mysqli_fetch_assoc($result))
                    echo "<tr><td>".$row["city"]."</td><td><img src='img/delete.png' width='20px' onclick='deletePlace(".$row["id"].")'></td></tr>";
            else
                echo "0 results";
            break;
        case 2:
            $sql="SELECT * FROM city WHERE city='".$city."'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                echo "<tr><td class='head'>Районы (".$city.")</td><td class='head'>Удалить</td></tr>";
                $result = mysqli_query($link, "SELECT id,".$city." FROM district WHERE ".$city."!='' ORDER BY ".$city. "");
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result))
                        echo "<tr><td>".$row[$city]."</td><td><img src='img/delete.png' width='20px' onclick='deletePlace(".$row["id"].")'></td></tr>";
                else
                    echo "<tr><td>0 results</td><td></td></tr>";
            }
            else
                echo "<tr><td>Город не выбран или не существует в БД.</td></tr>";
            break;
        case 3:
            $sql="SELECT * FROM district WHERE '".$city."' LIKE '".$district."'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                echo "<tr><td class='head'>Улицы (".$city.", ".$district.")</td><td class='head'>Удалить</td></tr>";
                $result = mysqli_query($link, "SELECT id,".$city.$district." FROM street WHERE ".$city.$district."!='' ORDER BY ".$city.$district. "");
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result))
                        echo "<tr><td>".$row[$city.$district]."</td><td><img src='img/delete.png' width='20px' onclick='deletePlace(".$row["id"].")'></td></tr>";
                else
                    echo "<tr><td>0 results</td><td></td></tr>";
            }
            else
                echo "<tr><td>Район или город не выбраны или не существуют в БД.</td></tr>";
            break;
        case 4:
            $sql="SELECT * FROM street WHERE '".$city.$district."' LIKE '".$street."'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                echo "<tr><td class='head'>Дома (".$city.", ".$district.", ул. ".$street.")</td><td class='head'>Удалить</td></tr>";
                $result = mysqli_query($link, "SELECT id,".$city.$district.$street." FROM house ORDER BY ".$city.$district.$street. "");
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result))
                        echo "<tr><td>".$row[$city.$district.$street]."</td><td><img src='img/delete.png' width='20px' onclick='deletePlace(".$row["id"].")'></td></tr>";
                else
                    echo "<tr><td>0 results</td><td></td></tr>";
            }
            else
                echo "<tr><td>Поля не выбраны или запись не существуют в БД.</td></tr>";
            break;
        case 5:
            $result = mysqli_query( $link, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='nofar'");
            $result2 = mysqli_query( $link, "SELECT * FROM nofar WHERE house='".$city.$district.$street.$house."'");
            $row2 = mysqli_fetch_assoc($result2);
            if ($result || $result2) {
                echo "<tr><td class=\"head\"> Объекты (".$city.", ".$district.", ул. ".$street.", д. ".$house.") </td><td class=\"head\"> 5 минут </td><td class=\"head\"> 10 минут </td><td class=\"head\"> 15 минут </td><td class='head'>Удалить</td></tr>";

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        if ($row["COLUMN_NAME"]!='id' && $row["COLUMN_NAME"]!='house' && $row["COLUMN_NAME"]!='info') {
                            echo "<tr><td>" . $row["COLUMN_NAME"] . "</td>";
                            switch ($row2[$row["COLUMN_NAME"]]) {
                                case '5':
                                    echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."' checked ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><img src='img/delete.png' width='20px' onclick='deleteDistrict()'></td>";
                                    break;
                                case '10':
                                    echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."' ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."' checked></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><img src='img/delete.png' width='20px' onclick='deleteDistrict()'></td>";
                                    break;
                                case '15':
                                    echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."' ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."' checked></td><td><img src='img/delete.png' width='20px' onclick='deleteDistrict()'></td>";
                                    break;
                                default:
                                    echo "<td><input type='checkbox' id='5".$row["COLUMN_NAME"]."'  ></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><input type='checkbox' id='10".$row["COLUMN_NAME"]."'></td><td><img src='img/delete.png' width='20px' onclick='deleteDistrict()'></td>";
                                    break;
                            }
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "0 results";
                }
            }
            else
                echo "<tr><td>Поля не выбраны или запись не существует в БД.</td></tr>";
            break;

    }
    ?>
</table>