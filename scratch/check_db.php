<?php
$con = mysqli_connect("localhost", "root", "", "hotel");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$res = mysqli_query($con, "SHOW TABLES");
if (!$res) {
    die("Query failed: " . mysqli_error($con));
}
while ($row = mysqli_fetch_row($res)) {
    echo $row[0] . "\n";
}
?>
