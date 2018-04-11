<?php
global $link;
$result = mysqli_query( $link, "SELECT nofar FROM nofar ORDER BY nofar");

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p><label><input type=\"checkbox\" value=". $row["nofar"].">".$row["nofar"]."</label></p>";
    }
} else {
    echo "0 results";
}
?>