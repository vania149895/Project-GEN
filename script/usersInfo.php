<table class='adminTable' border="1" align="center">
    <tr><td class="head"> Пользователь </td><td class="head"> Пароль </td><td class="head"> Права администратора </td><td class="head">Удалить</td></tr>
<?php
include_once 'connect.php';
global $link;
$result = mysqli_query( $link, "SELECT * FROM users ORDER BY user");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td><input class='admin' id='user".$row["id"]."' value='".$row["user"]."' onchange='saveUser(".$row["id"].")'></td>
                  <td><input class='admin' id='password".$row["id"]."' value='".$row["password"]."' onchange='saveUser(".$row["id"].")'></td>";
        if ($row["admin"])
            echo "<td><input type='checkbox' class='admin' id='admin".$row["id"]."' checked onchange='saveUser(".$row["id"].")'></td>";
        else
            echo "<td><input type='checkbox' class='admin' id='admin".$row["id"]."' onchange='saveUser(".$row["id"].")'></td>";
        echo "    <td><img src='img/delete.png' width='20px' onclick='deleteUser(".$row["id"].")'></td>
              </tr>";
    }
} else {
    echo "0 results";
}
?>
</table>

