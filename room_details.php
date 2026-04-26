<!DOCTYPE html>
<html lang="en">
<head>
<title>Room Details - Crown Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* Room Details Page Specific Styles */
    .rd-hero {
      position: relative;
      height: 65vh;
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: flex-end;
      justify-content: center;
      padding-bottom: 60px;
    }
    .rd-hero::before {
      content: '';
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      background: linear-gradient(to bottom, rgba(10,14,23,0.2) 0%, rgba(10,14,23,0.85) 100%);
      z-index: 1;
    }
    .rd-hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
      width: 100%;
    }
    .rd-hero-content h1 {
      font-size: 3.5em;
      margin-bottom: 15px;
      background: linear-gradient(to right, #fff, #c5a059);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .rd-breadcrumb {
      color: var(--text-secondary);
      font-size: 0.95em;
    }
    .rd-breadcrumb a {
      color: var(--primary-color);
    }

    /* Price Badge */
    .rd-price-badge {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(197, 160, 89, 0.1);
      border: 2px solid var(--primary-color);
      border-radius: 50px;
      padding: 12px 30px;
      margin-top: 15px;
    }
    .rd-price-amount {
      font-size: 2em;
      font-weight: 800;
      color: var(--primary-color);
      font-family: 'Outfit', sans-serif;
    }
    .rd-price-per {
      color: var(--text-secondary);
      font-size: 0.9em;
    }

    /* Content Area */
    .rd-content {
      padding: 60px 0;
    }

    /* Overview */
    .rd-overview {
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 40px;
      margin-bottom: 30px;
    }
    .rd-overview h3 {
      color: var(--primary-color);
      margin-bottom: 20px;
      font-size: 1.6em;
    }
    .rd-overview p {
      color: var(--text-secondary);
      line-height: 1.9;
      font-size: 1.05em;
    }

    /* Features Grid */
    .rd-features {
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 40px;
      margin-bottom: 30px;
    }
    .rd-features h3 {
      color: var(--primary-color);
      margin-bottom: 30px;
      font-size: 1.6em;
    }
    .feature-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }
    .feature-grid-item {
      display: flex;
      align-items: center;
      gap: 15px;
      padding: 15px;
      background: rgba(255,255,255,0.02);
      border: 1px solid rgba(255,255,255,0.05);
      border-radius: 14px;
      transition: all 0.3s;
    }
    .feature-grid-item:hover {
      background: rgba(197, 160, 89, 0.08);
      border-color: rgba(197, 160, 89, 0.2);
      transform: translateY(-3px);
    }
    .feature-grid-item .fg-icon {
      width: 45px;
      height: 45px;
      line-height: 45px;
      text-align: center;
      border-radius: 12px;
      background: rgba(197, 160, 89, 0.1);
      color: var(--primary-color);
      font-size: 1.2em;
      flex-shrink: 0;
    }
    .feature-grid-item .fg-text {
      color: var(--text-primary);
      font-weight: 500;
      font-size: 0.95em;
    }

    /* Room Gallery Thumbnails */
    .rd-gallery {
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 40px;
      margin-bottom: 30px;
    }
    .rd-gallery h3 {
      color: var(--primary-color);
      margin-bottom: 20px;
      font-size: 1.6em;
    }
    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
    }
    .gallery-grid img {
      width: 100%;
      height: 120px;
      object-fit: cover;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s;
      border: 2px solid transparent;
    }
    .gallery-grid img:hover {
      border-color: var(--primary-color);
      transform: scale(1.05);
    }

    /* Booking Sidebar */
    .rd-sidebar-sticky {
      position: sticky;
      top: 85px;
    }
    .rd-booking-card {
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 35px;
    }
    .rd-booking-card h3 {
      color: #fff;
      margin-bottom: 5px;
      font-size: 1.4em;
    }
    .rd-booking-card .booking-price {
      color: var(--primary-color);
      font-size: 2.2em;
      font-weight: 800;
      margin-bottom: 5px;
    }
    .rd-booking-card .booking-per {
      color: var(--text-secondary);
      font-size: 0.85em;
      margin-bottom: 25px;
    }
    .rd-booking-card label {
      color: var(--primary-color);
      font-size: 0.8em;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 5px;
    }
    .rd-booking-card .form-control {
      margin-bottom: 15px;
    }
    .btn-reserve {
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
      letter-spacing: 1px;
      transition: all 0.3s;
      margin-top: 10px;
      text-align: center;
      text-decoration: none !important;
    }
    .btn-reserve:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(197, 160, 89, 0.5);
      color: #000;
    }
    .booking-divider {
      border: none;
      border-top: 1px solid var(--glass-border);
      margin: 20px 0;
    }
    .booking-highlights {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .booking-highlights li {
      color: var(--text-secondary);
      padding: 8px 0;
      font-size: 0.9em;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .booking-highlights li i {
      color: var(--primary-color);
      width: 20px;
      text-align: center;
    }

    /* Other Rooms Sidebar */
    .rd-other-rooms {
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 30px;
      margin-top: 15px;
    }
    .rd-other-rooms h3 {
      color: var(--primary-color);
      margin-bottom: 20px;
      font-size: 1.3em;
    }
    .rd-other-rooms a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 12px 15px;
      color: var(--text-secondary);
      border-bottom: 1px solid rgba(255,255,255,0.04);
      transition: all 0.3s;
      font-size: 0.95em;
      border-radius: 10px;
      margin-bottom: 4px;
    }
    .rd-other-rooms a:last-child {
      border-bottom: none;
    }
    .rd-other-rooms a:hover,
    .rd-other-rooms a.active {
      background: rgba(197, 160, 89, 0.08);
      color: var(--primary-color);
      text-decoration: none;
      padding-left: 20px;
    }
    .rd-other-rooms a i {
      font-size: 0.8em;
      transition: transform 0.3s;
    }
    .rd-other-rooms a:hover i {
      transform: translateX(4px);
    }

    @media (max-width: 992px) {
      .feature-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .rd-hero-content h1 {
        font-size: 2.5em;
      }
    }
    @media (max-width: 768px) {
      .rd-hero {
        height: 50vh;
      }
      .rd-hero-content h1 {
        font-size: 2em;
      }
      .feature-grid {
        grid-template-columns: 1fr;
      }
      .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .rd-sidebar-sticky {
        position: static;
        margin-bottom: 30px;
      }
    }
  </style>
</head>
<body>
<?php include('Menu Bar.php'); ?>
<?php 
include('connection.php');
$room_id=$_GET['room_id'];
$sql=mysqli_query($con,"select * from rooms where room_id='$room_id' ");
$res=mysqli_fetch_assoc($sql);
$room_type = $res['type'];
$room_price = $res['price'];
$room_details = $res['details'];
$room_image = $res['image'];
?>

<!-- Hero Section -->
<div class="rd-hero" style="background-image: url('image/rooms/<?php echo $room_image; ?>');">
  <div class="rd-hero-content">
    <p class="rd-breadcrumb"><a href="index.php">Home</a> / <a href="rooms.php">Rooms</a> / <?php echo $room_type; ?></p>
    <h1><?php echo $room_type; ?></h1>
    <div class="rd-price-badge">
      <span class="rd-price-amount"><?php echo $room_price; ?></span>
      <span class="rd-price-per">per night</span>
    </div>
  </div>
</div>

<!-- Content Section -->
<div class="container rd-content">
  <div class="row">
    <!-- Left Column - Room Details -->
    <div class="col-md-8">
      <!-- Room Overview -->
      <div class="rd-overview">
        <h3><i class="fa fa-info-circle" style="margin-right: 10px;"></i>Room Overview</h3>
        <p><?php echo nl2br($room_details); ?></p>
      </div>

      <!-- Amenities & Features Grid -->
      <div class="rd-features">
        <h3><i class="fa fa-star" style="margin-right: 10px;"></i>Premium Amenities</h3>
        <div class="feature-grid">
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-wifi"></i></div>
            <span class="fg-text">Free High-Speed Wi-Fi</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-snowflake-o"></i></div>
            <span class="fg-text">Air Conditioning</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-television"></i></div>
            <span class="fg-text">55" Smart TV</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-bath"></i></div>
            <span class="fg-text">Premium Bathroom</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-bed"></i></div>
            <span class="fg-text">King Size Bed</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-bell"></i></div>
            <span class="fg-text">24/7 Room Service</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-coffee"></i></div>
            <span class="fg-text">Mini Bar & Coffee</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-lock"></i></div>
            <span class="fg-text">In-Room Safe</span>
          </div>
          <div class="feature-grid-item">
            <div class="fg-icon"><i class="fa fa-phone"></i></div>
            <span class="fg-text">Direct Telephone</span>
          </div>
        </div>
      </div>

      <!-- Room Gallery -->
      <div class="rd-gallery">
        <h3><i class="fa fa-camera" style="margin-right: 10px;"></i>Gallery</h3>
        <div class="gallery-grid">
          <?php
          // Show images from the room type folder if available
          $room_img_path = "image/rooms/" . $room_image;
          ?>
          <img src="<?php echo $room_img_path; ?>" alt="<?php echo $room_type; ?> View 1">
          <img src="<?php echo $room_img_path; ?>" alt="<?php echo $room_type; ?> View 2">
          <img src="<?php echo $room_img_path; ?>" alt="<?php echo $room_type; ?> View 3">
        </div>
      </div>
    </div>
    
    <!-- Right Column - Booking & Navigation -->
    <div class="col-md-4">
      <div class="rd-sidebar-sticky">
      <!-- Sticky Booking Widget -->
      <div class="rd-booking-card">
        <h3>Reserve Your Stay</h3>
        <div class="booking-price"><?php echo $room_price; ?></div>
        <div class="booking-per">per night (taxes included)</div>
        
        <label><i class="fa fa-calendar"></i> Check-In</label>
        <input type="date" class="form-control">
        
        <label><i class="fa fa-calendar"></i> Check-Out</label>
        <input type="date" class="form-control">
        
        <label><i class="fa fa-users"></i> Guests</label>
        <select class="form-control">
          <option>1 Adult</option>
          <option>2 Adults</option>
          <option>2 Adults + 1 Child</option>
          <option>Family (4+)</option>
        </select>
        
        <a href="Login.php" class="btn-reserve">Book Now <i class="fa fa-arrow-right"></i></a>
        
        <hr class="booking-divider">
        
        <ul class="booking-highlights">
          <li><i class="fa fa-check-circle"></i> Free cancellation within 24 hrs</li>
          <li><i class="fa fa-check-circle"></i> Breakfast included</li>
          <li><i class="fa fa-check-circle"></i> Complimentary airport pickup</li>
          <li><i class="fa fa-check-circle"></i> Late checkout available</li>
          <li><i class="fa fa-shield"></i> Secure payment guaranteed</li>
        </ul>
      </div>

      <!-- Other Rooms -->
      <div class="rd-other-rooms">
        <h3><i class="fa fa-th-list" style="margin-right: 8px;"></i>Other Rooms</h3>
        <?php
        $sql1=mysqli_query($con,"select * from rooms");
        while($result1= mysqli_fetch_assoc($sql1)) {
          $active_class = ($result1['room_id'] == $room_id) ? "active" : "";
        ?>
        <a href="room_details.php?room_id=<?php echo $result1['room_id']; ?>" class="<?php echo $active_class; ?>">
          <i class="fa fa-angle-right"></i> <?php echo $result1['type']; ?>
        </a>
        <?php } ?>
      </div>
      </div><!-- end rd-sidebar-sticky -->
    </div>
  </div>
</div>

<script>
// Page load animation
window.addEventListener('load', () => {
  gsap.fromTo('.rd-hero-content', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 1.2, ease: 'power4.out', delay: 0.3 });
  gsap.fromTo('.rd-overview', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.5 });
  gsap.fromTo('.rd-features', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.7 });
  gsap.fromTo('.rd-gallery', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.9 });
  gsap.fromTo('.rd-booking-card', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.6 });
  gsap.fromTo('.rd-other-rooms', { y: 40, opacity: 0 }, { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.8 });
  gsap.fromTo('.feature-grid-item', { y: 20, opacity: 0 }, { y: 0, opacity: 1, duration: 0.6, stagger: 0.08, ease: 'power2.out', delay: 1 });
});
</script>

<?php include('Footer.php'); ?>
</body>
</html>
