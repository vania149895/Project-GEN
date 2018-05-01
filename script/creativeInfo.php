<table class='adminTable' border="1" align="center">
    <tr><td class="head"> Креатив </td><td class="head">Удалить</td></tr>
    <?php
    include_once 'connect.php';
    global $link;
    $result = mysqli_query( $link, "SELECT * FROM creative ORDER BY creative");

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td><input class='admin' id='creative".$row["id"]."' value='".$row["creative"]."' onchange='saveCreative(".$row["id"].")'></td>";
            echo "    <td><img src='img/delete.png' width='20px' onclick='deleteCreative(".$row["id"].")'></td>
                  </tr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</table>