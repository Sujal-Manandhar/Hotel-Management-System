<?php 
session_start();
error_reporting(0);
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet"/>
  <meta name="description" content="Explore our selection of luxury rooms and suites at Crown Hotel. From Deluxe Rooms to Luxurious Suites, find the perfect accommodation for your stay.">
</head>
<body>

  <?php include('Menu Bar.php'); ?>

  <!-- Page Hero Banner -->
  <div style="background: linear-gradient(135deg, rgba(10,14,23,0.9), rgba(22,27,34,0.85)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600&q=80') center/cover; padding: 120px 0 80px 0; text-align: center; margin-top: -65px; padding-top: 150px;">
    <h1 class="section-title" style="margin-bottom: 15px;">Our <span style="color:var(--primary-color)">Rooms</span></h1>
    <div class="section-divider"></div>
    <p style="color: var(--text-secondary); font-size: 1.2em; max-width: 600px; margin: 20px auto 0 auto;">Indulge in our carefully curated selection of rooms, each designed to provide an unparalleled level of comfort and sophistication.</p>
  </div>

  <!-- Room Cards Grid -->
  <div class="container" style="margin-top: 60px; margin-bottom: 60px;">
    <div class="row">
      <?php 
      $sql=mysqli_query($con,"select * from rooms");
      while($r_res=mysqli_fetch_assoc($sql))
      {
      ?>
      <div class="col-md-4 col-sm-6" style="margin-bottom: 30px;">
        <div class="room-card">
          <div class="room-card-img">
            <img src="image/rooms/<?php echo $r_res['image']; ?>" alt="<?php echo $r_res['type']; ?>">
            <div class="room-card-price"><?php echo $r_res['price']; ?></div>
          </div>
          <div class="room-card-body">
            <h4 class="Room_Text"><?php echo $r_res['type']; ?></h4>
            <p class="room-desc-text" style="height: 72px; overflow: hidden;"><?php echo substr($r_res['details'],0,120); ?>...</p>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
              <div style="display: flex; gap: 8px;">
                <span style="color: var(--primary-color); font-size: 0.85em;" title="Wi-Fi"><i class="fa fa-wifi"></i></span>
                <span style="color: var(--primary-color); font-size: 0.85em;" title="AC"><i class="fa fa-snowflake-o"></i></span>
                <span style="color: var(--primary-color); font-size: 0.85em;" title="TV"><i class="fa fa-television"></i></span>
                <span style="color: var(--primary-color); font-size: 0.85em;" title="Room Service"><i class="fa fa-bell"></i></span>
              </div>
              <a href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>" class="room-view-btn" style="color: var(--primary-color); font-weight: 600;">View Details <i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>

  <?php include('Footer.php'); ?>

<script>
// Simple page load animation - no gsap-reveal class needed
window.addEventListener('load', () => {
  // Animate room cards with stagger
  gsap.fromTo('.room-card', 
    { opacity: 0, y: 40 },
    { opacity: 1, y: 0, duration: 0.8, stagger: 0.15, ease: 'power3.out', delay: 0.3 }
  );
});
</script>
</body>
</html>
