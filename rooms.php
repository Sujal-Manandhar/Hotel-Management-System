<?php 
session_start();
error_reporting(1);
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Our Rooms - Crown Hotel | Luxury Accommodation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <meta name="description" content="Explore our selection of luxury rooms and suites at Crown Hotel. From Deluxe Rooms to Luxurious Suites, find the perfect accommodation for your stay.">
</head>
<body>
  <?php include('Menu Bar.php'); ?>

  <div class="container" style="margin-top:100px; margin-bottom: 60px;">
    <div class="text-center">
      <h1 class="section-title">Luxury <span style="color:var(--primary-color)">Accommodations</span></h1>
      <p style="color:var(--text-secondary); font-size: 1.2em; max-width: 700px; margin: 20px auto 60px auto;">Indulge in our carefully curated selection of rooms, each designed to provide an unparalleled level of comfort and sophistication.</p>
    </div>

    <div class="row">
      <?php 
      $sql=mysqli_query($con,"select * from rooms");
      while($r_res=mysqli_fetch_assoc($sql))
      {
      ?>
      <div class="col-md-4 col-sm-6 room-card-wrapper">
        <div class="glass-panel" style="padding: 0; overflow: hidden; border-radius: 24px;">
          <img src="image/rooms/<?php echo $r_res['image']; ?>" class="img-responsive" style="height: 250px; width: 100%; object-fit: cover;" alt="<?php echo $r_res['type']; ?>">
          <div style="padding: 30px;">
            <h3 style="color: var(--text-primary); margin-bottom: 15px;"><?php echo $r_res['type']; ?></h3>
            <p style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 25px; height: 80px; overflow: hidden;"><?php echo $r_res['details']; ?></p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
              <span style="color: var(--primary-color); font-weight: 700; font-size: 1.2em;">Premium Stay</span>
              <a href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>" class="btn btn-primary btn-sm">Book Now</a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

  <?php include('Footer.php'); ?>
</body>
</html>
