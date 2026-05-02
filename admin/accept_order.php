<?php 
include('../connection.php');
$oid = $_GET['booking_id'];
$q = mysqli_query($con,"UPDATE room_booking_details SET status='Accepted' WHERE id='$oid'");
if($q)
{
    header('Location: dashboard.php?option=booking_details');
}
?>
