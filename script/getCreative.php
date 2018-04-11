<?php
global $link;
$result = mysqli_query( $link, "SELECT creative FROM creative ORDER BY creative");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p><label><input type=\"checkbox\" value=". $row["creative"].">".$row["creative"]."</label></p>";
    }
} else {
    echo "0 results";
}
?>