<?php
session_start();
error_reporting(0);
include('connection.php');

if (!isset($_SESSION['create_account_logged_in']) || $_SESSION['create_account_logged_in']=="") {
    $redirect = 'Booking_Form.php' . ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '');
    header('location:Login.php?redirect=' . urlencode($redirect));
    exit;
}
$eid = $_SESSION['create_account_logged_in'];

$stmt = $con->prepare("SELECT * FROM create_account WHERE email=?");
$stmt->bind_param("s", $eid);
$stmt->execute();
$result_set = $stmt->get_result();
$result = $result_set->fetch_assoc() ?: [];

// Get all room types from database
$room_types = [];
$room_sql = mysqli_query($con, "SELECT DISTINCT type FROM rooms ORDER BY type");
while ($rr = mysqli_fetch_assoc($room_sql)) {
    $room_types[] = $rr['type'];
}

// Read URL params passed from room_details.php booking widget
$pre_room_type = $_GET['room_type'] ?? '';
$pre_checkin = $_GET['checkin'] ?? '';
$pre_checkout = $_GET['checkout'] ?? '';
$pre_guests = $_GET['guests'] ?? '';

if (isset($_POST['savedata'])) {
    $email = $_POST['email'];
    $room_type = $_POST['room_type'];
    
    $stmt2 = $con->prepare("SELECT * FROM room_booking_details WHERE email=? AND room_type=?");
    $stmt2->bind_param("ss", $email, $room_type);
    $stmt2->execute();
    $res2 = $stmt2->get_result();
    
    if ($res2->num_rows > 0) {
        $msg = "You have already booked this room type.";
        $msg_type = "error";
    } else {
        $stmt3 = $con->prepare("INSERT INTO room_booking_details(name,email,phone,address,city,state,zip,country,room_type,Occupancy,check_in_date,check_in_time,check_out_date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $state = $_POST['state'] ?? '';
        $zip = $_POST['zip'] ?? '';
        $country = $_POST['country'] ?? '';
        
        $stmt3->bind_param("sssssssssssss", $_POST['name'], $email, $_POST['phone'], $_POST['address'], $_POST['city'], $state, $zip, $country, $room_type, $_POST['Occupancy'], $_POST['cdate'], $_POST['ctime'], $_POST['codate']);
        if ($stmt3->execute()) {
            $msg = "Room booked successfully!";
            $msg_type = "success";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Your Stay - Crown Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .booking-page {
      min-height: 100vh;
      background: linear-gradient(135deg, rgba(10,14,23,0.94), rgba(22,27,34,0.9)), url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=1600&q=80') center/cover fixed;
      padding: 100px 20px 60px;
    }
    .booking-header {
      text-align: center;
      margin-bottom: 40px;
    }
    .booking-header h1 {
      font-size: 2.8em;
      background: linear-gradient(to right, #fff, #c5a059);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 8px;
    }
    .booking-header p {
      color: var(--text-secondary);
      font-size: 1.05em;
    }
    .booking-card {
      max-width: 900px;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      padding: 45px;
      box-shadow: 0 30px 80px rgba(0,0,0,0.5);
    }
    .booking-card .section-title {
      color: var(--primary-color);
      font-size: 1.1em;
      text-transform: uppercase;
      letter-spacing: 2px;
      font-weight: 700;
      margin-bottom: 20px;
      padding-bottom: 12px;
      border-bottom: 1px solid rgba(255,255,255,0.06);
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .booking-card .section-title i {
      font-size: 1.2em;
    }
    .bf-row {
      display: flex;
      gap: 20px;
      margin-bottom: 0;
    }
    .bf-field {
      flex: 1;
      margin-bottom: 18px;
    }
    .bf-field label {
      color: var(--primary-color);
      font-size: 0.75em;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 6px;
      display: block;
      font-weight: 600;
    }
    .bf-field label i {
      margin-right: 5px;
    }
    .bf-field .form-control {
      height: 48px;
      margin-bottom: 0;
    }
    .bf-field textarea.form-control {
      height: 48px;
      resize: none;
    }
    /* Fix dropdown visibility */
    .bf-field select.form-control {
      color: #fff;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23c5a059' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 15px center;
      padding-right: 35px;
    }
    .bf-field select.form-control option {
      background: #1a1f2e;
      color: #fff;
    }
    .occupancy-options {
      display: flex;
      gap: 25px;
      padding-top: 10px;
    }
    .occupancy-options label {
      color: #fff !important;
      text-transform: none !important;
      font-size: 0.95em !important;
      letter-spacing: 0 !important;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .occupancy-options input[type="radio"] {
      accent-color: var(--primary-color);
      width: 16px;
      height: 16px;
    }
    .booking-divider {
      border: none;
      border-top: 1px solid rgba(255,255,255,0.06);
      margin: 25px 0;
    }
    .btn-book {
      display: block;
      width: 100%;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
      color: #000;
      border: none;
      padding: 16px;
      border-radius: 14px;
      font-weight: 700;
      font-size: 1.1em;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      transition: all 0.3s;
      cursor: pointer;
      margin-top: 10px;
    }
    .btn-book:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(197, 160, 89, 0.5);
    }
    .booking-msg {
      padding: 14px 20px;
      border-radius: 14px;
      text-align: center;
      margin-bottom: 25px;
      font-size: 0.95em;
    }
    .booking-msg.error {
      background: rgba(220, 53, 69, 0.15);
      border: 1px solid rgba(220, 53, 69, 0.3);
      color: #ff6b7a;
    }
    .booking-msg.success {
      background: rgba(40, 167, 69, 0.15);
      border: 1px solid rgba(40, 167, 69, 0.3);
      color: #5dff8f;
    }
    .booking-msg.success a {
      color: var(--primary-color);
      font-weight: 700;
      text-decoration: underline;
    }
    @media (max-width: 768px) {
      .bf-row { flex-direction: column; gap: 0; }
      .booking-card { padding: 30px 20px; }
      .booking-header h1 { font-size: 2em; }
    }
  </style>
</head>
<body>
<?php include('Menu Bar.php'); ?>

<div class="booking-page">
  <div class="booking-header">
    <h1><i class="fa fa-calendar-check-o"></i> Reserve Your Stay</h1>
    <p>Complete the form below to book your luxury experience at Crown Hotel</p>
  </div>

  <div class="booking-card">
    <?php if(isset($msg)) { ?>
      <div class="booking-msg <?php echo $msg_type; ?>">
        <i class="fa fa-<?php echo $msg_type == 'success' ? 'check-circle' : 'exclamation-circle'; ?>"></i>
        <?php echo $msg; ?>
        <?php if($msg_type == 'success') { ?> <a href="order.php">View Booking</a><?php } ?>
      </div>
    <?php } ?>

    <form method="post">
      <!-- Guest Information -->
      <div class="section-title"><i class="fa fa-user-circle"></i> Guest Information</div>
      
      <div class="bf-row">
        <div class="bf-field">
          <label><i class="fa fa-user"></i> Full Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo $result['name'] ?? ''; ?>" placeholder="Your full name" required>
        </div>
        <div class="bf-field">
          <label><i class="fa fa-envelope"></i> Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $eid; ?>" placeholder="you@example.com" readonly required>
        </div>
      </div>

      <div class="bf-row">
        <div class="bf-field">
          <label><i class="fa fa-phone"></i> Mobile</label>
          <input type="text" name="phone" class="form-control" value="<?php echo $result['mobile'] ?? ''; ?>" placeholder="+977 98..." required>
        </div>
        <div class="bf-field">
          <label><i class="fa fa-map-marker"></i> City</label>
          <input type="text" name="city" class="form-control" placeholder="Your city" required>
        </div>
      </div>

      <div class="bf-field">
        <label><i class="fa fa-home"></i> Address</label>
        <textarea name="address" class="form-control" placeholder="Street address"><?php echo $result['address'] ?? ''; ?></textarea>
      </div>

      <hr class="booking-divider">

      <!-- Booking Details -->
      <div class="section-title"><i class="fa fa-bed"></i> Booking Details</div>

      <div class="bf-row">
        <div class="bf-field">
          <label><i class="fa fa-hotel"></i> Room Type</label>
          <select name="room_type" class="form-control" required>
            <?php foreach($room_types as $rt) { ?>
              <option value="<?php echo $rt; ?>" <?php echo ($pre_room_type == $rt) ? 'selected' : ''; ?>><?php echo $rt; ?></option>
            <?php } ?>
            <?php if(empty($room_types)) { ?>
              <option>Deluxe Room</option>
              <option>Luxurious Suite</option>
              <option>Standard Room</option>
              <option>Suite</option>
              <option>Twin Deluxe Room</option>
              <option>Parking Area</option>
            <?php } ?>
          </select>
        </div>
        <div class="bf-field">
          <label><i class="fa fa-users"></i> Occupancy</label>
          <div class="occupancy-options">
            <label><input type="radio" name="Occupancy" value="single" <?php echo ($pre_guests == 'single') ? 'checked' : ''; ?> required> Single</label>
            <label><input type="radio" name="Occupancy" value="twin" <?php echo ($pre_guests == 'twin') ? 'checked' : ''; ?>> Twin</label>
            <label><input type="radio" name="Occupancy" value="double" <?php echo ($pre_guests == 'double') ? 'checked' : ''; ?>> Double</label>
          </div>
        </div>
      </div>

      <div class="bf-row">
        <div class="bf-field">
          <label><i class="fa fa-calendar"></i> Check-In Date</label>
          <input type="date" name="cdate" class="form-control" value="<?php echo $pre_checkin; ?>" required>
        </div>
        <div class="bf-field">
          <label><i class="fa fa-clock-o"></i> Check-In Time</label>
          <input type="time" name="ctime" class="form-control" required>
        </div>
        <div class="bf-field">
          <label><i class="fa fa-calendar-times-o"></i> Check-Out Date</label>
          <input type="date" name="codate" class="form-control" value="<?php echo $pre_checkout; ?>" required>
        </div>
      </div>

      <button type="submit" name="savedata" class="btn-book"><i class="fa fa-check"></i> Confirm Booking</button>
    </form>
  </div>
</div>

<?php include('Footer.php'); ?>
</body>
</html>