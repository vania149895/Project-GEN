<?php
global $link;
$result = mysqli_query( $link, "SELECT city FROM city ORDER BY city");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<option value=". $row["city"]."></option>";
    }
} else {
    echo "0 results";
}
?>