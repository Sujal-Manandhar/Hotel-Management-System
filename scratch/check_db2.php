<?php
include('../connection.php');
$res = mysqli_query($con, 'DESCRIBE room_booking_details');
while($row = mysqli_fetch_assoc($res)) {
    print_r($row);
}
?>
