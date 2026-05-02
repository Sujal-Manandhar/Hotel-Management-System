<?php 
session_start();
error_reporting(1);
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Online Hotel.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php include('Menu Bar.php'); ?>

<style>
.booking-page {
    min-height: 100vh;
    padding: 80px 20px 60px;
}
.booking-header {
    text-align: center;
    margin-bottom: 40px;
}
.booking-header h1 {
    font-size: 2.8em;
    background: linear-gradient(to right, #fff, var(--primary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 8px;
}
.booking-header p {
    color: var(--text-secondary);
    font-size: 1.05em;
}
.table-responsive-wrapper {
    overflow-x: auto;
    border-radius: 20px;
    background: rgba(10, 14, 23, 0.7);
    border: 1px solid var(--glass-border);
    box-shadow: 0 20px 50px rgba(0,0,0,0.5);
    backdrop-filter: blur(16px);
}
.table-glass {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
}
.table-glass th {
    background: rgba(197, 160, 89, 0.08);
    color: var(--primary-color);
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.8em;
    letter-spacing: 1.5px;
    padding: 20px;
    border-bottom: 1px solid rgba(197, 160, 89, 0.2);
    text-align: left;
}
.table-glass td {
    padding: 20px;
    color: var(--text-primary);
    border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    vertical-align: middle;
    font-size: 0.95em;
}
.table-glass tbody tr {
    transition: all 0.3s ease;
}
.table-glass tbody tr:hover {
    background: rgba(255, 255, 255, 0.02);
}
.table-glass tbody tr:last-child td {
    border-bottom: none;
}
.cell-sub {
    display: block;
    color: var(--text-secondary);
    font-size: 0.85em;
    margin-top: 4px;
}
.btn-cancel-sm {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    background: rgba(220, 53, 69, 0.1);
    color: #ff6b7a;
    border: 1px solid rgba(220, 53, 69, 0.3);
    border-radius: 8px;
    font-size: 0.85em;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    text-decoration: none !important;
}
.btn-cancel-sm:hover {
    background: rgba(220, 53, 69, 0.2);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(220, 53, 69, 0.2);
}
.empty-state {
    text-align: center;
    padding: 60px 20px;
}
.empty-state i {
    font-size: 4em;
    color: var(--primary-color);
    margin-bottom: 20px;
    opacity: 0.5;
}
.empty-state h3 {
    color: #fff;
    margin-bottom: 10px;
    font-size: 1.8em;
}
.empty-state p {
    color: var(--text-secondary);
    font-size: 1.1em;
}
</style>

<div class="booking-page">
    <div class="container">
        <div class="booking-header">
            <h1><i class="fa fa-calendar-check-o"></i> Your Bookings</h1>
            <p>Review and manage your reservation details</p>
        </div>

        <div class="table-responsive-wrapper">
            <table class="table-glass">
                <thead>
                    <tr>
                        <th><i class="fa fa-user"></i> Guest Info</th>
                        <th><i class="fa fa-address-book"></i> Contact</th>
                        <th><i class="fa fa-bed"></i> Room Details</th>
                        <th><i class="fa fa-sign-in"></i> Check In</th>
                        <th><i class="fa fa-sign-out"></i> Check Out</th>
                        <th><i class="fa fa-info-circle"></i> Status</th>
                        <th><i class="fa fa-cog"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con= mysqli_connect("localhost","root","","hotel");
                    $sql= mysqli_query($con,"select * from room_booking_details where email='$eid' ORDER BY check_in_date DESC");
                    
                    if (mysqli_num_rows($sql) > 0) {
                        while($result=mysqli_fetch_assoc($sql)) {
                            $oid=$result['id'];
                            echo "<tr>";
                            echo "<td><strong>".htmlspecialchars($result['name'])."</strong><span class='cell-sub'><i class='fa fa-map-marker'></i> ".htmlspecialchars($result['address']).", ".htmlspecialchars($result['country'])."</span></td>";
                            echo "<td>".htmlspecialchars($result['email'])."<span class='cell-sub'><i class='fa fa-phone'></i> ".htmlspecialchars($result['phone'])."</span></td>";
                            echo "<td><strong>".htmlspecialchars($result['room_type'])."</strong><span class='cell-sub'><i class='fa fa-users'></i> Occupancy: ".htmlspecialchars($result['Occupancy'])."</span></td>";
                            echo "<td>".htmlspecialchars($result['check_in_date'])."<span class='cell-sub'><i class='fa fa-clock-o'></i> ".htmlspecialchars($result['check_in_time'])."</span></td>";
                            echo "<td>".htmlspecialchars($result['check_out_date'])."</td>";
                            
                            $status = isset($result['status']) ? $result['status'] : 'Pending';
                            $status_html = "";
                            if($status == 'Accepted') {
                                $status_html = "<span style='color: #28a745; font-weight: bold;'><i class='fa fa-check-circle'></i> Accepted</span>";
                            } else if($status == 'Canceled') {
                                $status_html = "<span style='color: #ff6b7a; font-weight: bold;'><i class='fa fa-times-circle'></i> Canceled</span>";
                            } else {
                                $status_html = "<span style='color: #ffc107; font-weight: bold;'><i class='fa fa-clock-o'></i> Pending</span>";
                            }
                            echo "<td>$status_html</td>";
                            
                            echo "<td>";
                            if($status != 'Canceled') {
                                echo "<a href='cancel_order.php?order_id=".htmlspecialchars($oid)."' class='btn-cancel-sm'><i class='fa fa-times-circle'></i> Cancel</a>";
                            } else {
                                echo "<span style='color: var(--text-secondary); font-size: 0.85em;'>N/A</span>";
                            }
                            echo "</td>";
                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>
                            <div class='empty-state'>
                                <i class='fa fa-bed'></i>
                                <h3>No Bookings Found</h3>
                                <p>You haven't made any reservations yet. Start exploring our luxury rooms!</p>
                            </div>
                        </td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('Footer.php'); ?>
</body>
</html>

