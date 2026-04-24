<?php 
session_start();
include('connection.php');

if (!isset($_SESSION['create_account_logged_in'])) {
    header('location:Login.php');
    exit;
}

$eid = $_SESSION['create_account_logged_in'];
$oid = $_GET['order_id'];

$stmt = $con->prepare("DELETE FROM room_booking_details WHERE id = ? AND email = ?");
$stmt->bind_param("is", $oid, $eid);

if($stmt->execute())
{
    header('location:order.php');
}
?>