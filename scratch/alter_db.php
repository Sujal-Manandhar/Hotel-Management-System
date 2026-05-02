<?php
include('connection.php');
$res = mysqli_query($con, "ALTER TABLE room_booking_details ADD status VARCHAR(20) DEFAULT 'Pending'");
if($res) echo "SUCCESS"; else echo mysqli_error($con);
?>
