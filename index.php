<?php 
session_start();
error_reporting(1);
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head><!--Head Open  Here-->
  <title>Crown Hotel.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="logo/logo2.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet"/>
  <meta name="description" content="Welcome to Crown Hotel - Experience luxury and comfort at our premier destination. Book your stay today for an unforgettable experience with world-class amenities.">
  <meta name="keywords" content="Hotel, Luxury Stay, Crown Hotel, Room Booking, Vacation, Travel">
</head> <!--Head Open  Here-->
<body>
  
  <!-- Preloader -->
  <div id="preloader">
    <img src="logo/logo2.png" class="preloader-logo" alt="Crown Hotel">
    <div class="preloader-bar">
      <div class="preloader-progress"></div>
    </div>
  </div>

  <?php include('Menu Bar.php'); ?>

<!-- Hero Slider -->
<div id="myCarousel" class="carousel slide hero-carousel" data-ride="carousel"> <!--Slider Image Start Here--> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
	   <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!--Indicators Close Here-->

    <!-- Wrapper for slides -->

    <div class="carousel-inner" role="listbox">
      <?php
		$i=1;
	  $sql=mysqli_query($con,"select * from slider");
		while($slider=mysqli_fetch_assoc($sql))
		{
		$slider_img=$slider['image'];
		$slider_cap=$slider['caption'];
		$path="image/Slider/$slider_img";	
			if($i==1)
			{	
		?>
	  <div class="item active">
        <img src="<?php echo $path; ?>" alt="Image">
      
      </div>
		<?php 
		} 
		else 
			{
			?>	
		<div class="item">
        <img src="<?php echo $path; ?>" alt="Image">
      
      </div>	
				
		<?php	} ?>
	  
	  
		<?php $i++; } ?>
      
	  
    </div>

    
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a> 
    <!-- Left and right controls Close Here -->

    <!-- Hero Overlay Content -->
    <div class="hero-overlay-content">
      <h1 class="hero-title">Welcome to Crown Hotel</h1>
      <p class="hero-subtitle">Where Luxury Meets Perfection</p>
    </div>
    
</div>

<!-- Quick Book Section -->
<div class="quick-book-section">
  <div class="container">
    <form action="<?php echo !empty($_SESSION['create_account_logged_in']) ? 'Booking_Form.php' : 'Login.php'; ?>" method="GET" class="quick-book-bar" id="quickBookForm">
      <div class="qb-item">
        <label><i class="fa fa-calendar"></i> Check In</label>
        <input type="date" name="checkin" class="form-control" required>
      </div>
      <div class="qb-item">
        <label><i class="fa fa-calendar"></i> Check Out</label>
        <input type="date" name="checkout" class="form-control" required>
      </div>
      <div class="qb-item">
        <label><i class="fa fa-users"></i> Guests</label>
        <select name="guests" class="form-control">
          <option value="single">1 Adult</option>
          <option value="twin">2 Adults</option>
          <option value="double">2 Adults + 1 Child</option>
          <option value="family">Family (4+)</option>
        </select>
      </div>
      <div class="qb-item">
        <label><i class="fa fa-bed"></i> Room Type</label>
        <select name="room_type" class="form-control">
          <option value="">Any Room</option>
          <?php 
          $sql_rooms=mysqli_query($con,"select * from rooms");
          while($rm=mysqli_fetch_assoc($sql_rooms)){
          ?>
          <option value="<?php echo $rm['type']; ?>"><?php echo $rm['type']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="qb-item qb-btn-wrap">
        <button type="submit" class="btn-book-now"><i class="fa fa-search"></i> Check Availability</button>
      </div>
    </form>
  </div>
</div>

<!-- Exclusive Experiences Section -->
<div class="container-fluid experiences-section">
  <div class="container text-center">
    <h2 class="section-title gsap-reveal">Exclusive <span style="color:var(--primary-color)">Experiences</span></h2>
    <div class="section-divider gsap-reveal"></div>
    <p class="section-subtitle gsap-reveal">Indulge in curated moments designed for royalty.</p>
    
    <div class="row">
      <div class="col-sm-4 gsap-reveal">
        <div class="exp-card">
          <div class="exp-img-wrapper">
            <img src="https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=600&q=80" alt="Spa & Wellness">
          </div>
          <div class="exp-content">
            <div class="exp-icon"><i class="fa fa-leaf"></i></div>
            <h3>Serenity Spa</h3>
            <p>Rejuvenate your mind and body with our award-winning spa therapies and wellness retreats.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 gsap-reveal">
        <div class="exp-card">
          <div class="exp-img-wrapper">
            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&q=80" alt="Fine Dining">
          </div>
          <div class="exp-content">
            <div class="exp-icon"><i class="fa fa-cutlery"></i></div>
            <h3>Culinary Excellence</h3>
            <p>Savor exquisite dishes crafted by internationally acclaimed chefs using the finest ingredients.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 gsap-reveal">
        <div class="exp-card">
          <div class="exp-img-wrapper">
            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&q=80" alt="Events & Weddings">
          </div>
          <div class="exp-content">
            <div class="exp-icon"><i class="fa fa-diamond"></i></div>
            <h3>Grand Events</h3>
            <p>Host unforgettable weddings, galas, and corporate events in our magnificent ballrooms.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Our Rooms Section -->
 <div class="container-fluid" id="red">
<div class="container text-center gsap-reveal" id="rooms-section">    
  <h2 class="section-title">Our <span style="color:var(--primary-color)">Rooms</span></h2>
  <div class="section-divider"></div>
  <p class="section-subtitle">Experience the perfect blend of luxury, comfort, and style.</p>
  
  <div class="row">
	<?php 
	$sql=mysqli_query($con,"select * from rooms");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	<div class="col-sm-4 room-card-wrapper gsap-reveal">
      <a href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>" style="text-decoration:none;">
        <div class="room-card">
          <div class="room-card-img">
            <img src="image/rooms/<?php echo $r_res['image']; ?>" class="img-responsive" alt="<?php echo $r_res['type']; ?>">
            <div class="room-card-price"><?php echo $r_res['price']; ?></div>
          </div>
          <div class="room-card-body">
            <h4 class="Room_Text"><?php echo $r_res['type']; ?></h4>
            <p class="room-desc-text"><?php echo substr($r_res['details'],0,120); ?>...</p>
            <span class="room-view-btn">View Details <i class="fa fa-arrow-right"></i></span>
          </div>
        </div>
      </a>
    </div>
	<?php } ?>
  </div>
</div>
</div>

<!-- Features Section Start -->
<div class="container-fluid features-section gsap-reveal">
  <div class="container">
    <div class="text-center">
      <h2 class="section-title">Why Choose <span style="color:var(--primary-color)">Crown</span></h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">World-class services tailored for your ultimate satisfaction.</p>
    </div>
    <div class="row">
      <div class="col-sm-3 feature-item">
        <div class="feature-icon"><i class="fa fa-wifi"></i></div>
        <h3 class="feature-title">Free Wi-Fi</h3>
        <p style="color:var(--text-secondary)">High-speed connectivity throughout the hotel premises.</p>
      </div>
      <div class="col-sm-3 feature-item">
        <div class="feature-icon"><i class="fa fa-cutlery"></i></div>
        <h3 class="feature-title">Fine Dining</h3>
        <p style="color:var(--text-secondary)">Exquisite culinary experiences by world-renowned chefs.</p>
      </div>
      <div class="col-sm-3 feature-item">
        <div class="feature-icon"><i class="fa fa-tint"></i></div>
        <h3 class="feature-title">Infinity Pool</h3>
        <p style="color:var(--text-secondary)">Breathtaking views while you relax in our pool.</p>
      </div>
      <div class="col-sm-3 feature-item">
        <div class="feature-icon"><i class="fa fa-car"></i></div>
        <h3 class="feature-title">Secure Parking</h3>
        <p style="color:var(--text-secondary)">24/7 monitored underground parking for you.</p>
      </div>
    </div>
  </div>
</div>
<!-- Features Section End -->

<!-- Customer Reviews Section Start -->
<div class="container-fluid reviews-section gsap-reveal">
  <div class="container">
    <div class="text-center">
      <h2 class="section-title">Guest <span style="color:var(--primary-color)">Reviews</span></h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">What our valued guests have to say about their experience.</p>
    </div>
    
    <div class="row">
      <!-- Review 1 -->
      <div class="col-sm-4">
        <div class="review-card">
          <div class="review-quote"><i class="fa fa-quote-right"></i></div>
          <p class="review-text">"An absolutely breathtaking experience. The attention to detail and the gold-standard service made our anniversary stay truly unforgettable. The infinity pool is a must-see!"</p>
          <div class="review-author">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80" class="review-avatar" alt="Sarah Jenkins">
            <div class="author-info">
              <h4>Sarah Jenkins</h4>
              <div class="star-rating">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Review 2 -->
      <div class="col-sm-4">
        <div class="review-card">
          <div class="review-quote"><i class="fa fa-quote-right"></i></div>
          <p class="review-text">"The finest hospitality I've experienced in Kathmandu. The rooms are a masterpiece of modern design and comfort. The culinary journey at the restaurant was world-class."</p>
          <div class="review-author">
            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&q=80" class="review-avatar" alt="Michael Chen">
            <div class="author-info">
              <h4>Michael Chen</h4>
              <div class="star-rating">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Review 3 -->
      <div class="col-sm-4">
        <div class="review-card">
          <div class="review-quote"><i class="fa fa-quote-right"></i></div>
          <p class="review-text">"Seamless service from check-in to check-out. The glassy theme of the hotel is so modern and refreshing. I highly recommend the Crown Hotel for business or leisure."</p>
          <div class="review-author">
            <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&q=80" class="review-avatar" alt="Emily Rodriguez">
            <div class="author-info">
              <h4>Emily Rodriguez</h4>
              <div class="star-rating">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Customer Reviews Section End -->

<!-- Professional Stats Section Start -->
<div class="container-fluid stats-section">
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-3 stat-item gsap-reveal">
        <div class="stat-icon"><i class="fa fa-bed"></i></div>
        <h2 class="stat-number">150+</h2>
        <p class="stat-label">Luxury Rooms</p>
      </div>
      <div class="col-sm-3 stat-item gsap-reveal">
        <div class="stat-icon"><i class="fa fa-smile-o"></i></div>
        <h2 class="stat-number">12k+</h2>
        <p class="stat-label">Happy Guests</p>
      </div>
      <div class="col-sm-3 stat-item gsap-reveal">
        <div class="stat-icon"><i class="fa fa-trophy"></i></div>
        <h2 class="stat-number">15</h2>
        <p class="stat-label">Awards Won</p>
      </div>
      <div class="col-sm-3 stat-item gsap-reveal">
        <div class="stat-icon"><i class="fa fa-heart"></i></div>
        <h2 class="stat-number">100%</h2>
        <p class="stat-label">Satisfaction</p>
      </div>
    </div>
  </div>
</div>
<!-- Stats Section End -->

<!-- Newsletter Section -->
<div class="container-fluid newsletter-section gsap-reveal">
  <div class="container text-center">
    <div class="newsletter-box">
      <div class="newsletter-icon"><i class="fa fa-envelope-open-o"></i></div>
      <h2>Join the <span style="color:var(--primary-color)">Crown Elite</span></h2>
      <p>Subscribe to our newsletter for exclusive offers, luxury travel tips, and priority bookings.</p>
      <form class="newsletter-form">
        <input type="email" class="form-control" placeholder="Enter your email address">
        <button type="button" class="btn-subscribe">Subscribe Now <i class="fa fa-arrow-right"></i></button>
      </form>
    </div>
  </div>
</div>
<!-- Newsletter End -->

<script>
// GSAP Initializations
gsap.registerPlugin(ScrollTrigger);

// Preloader Animation - FIXED: removed dead .carousel-caption target
window.addEventListener('load', () => {
  const tl = gsap.timeline();
  tl.to('.preloader-progress', { duration: 1.5, left: '0%', ease: 'power3.inOut' })
    .to('.preloader-logo', { duration: 0.8, opacity: 1, y: -20, ease: 'back.out(1.7)' })
    .to('#preloader', { duration: 1, opacity: 0, display: 'none', ease: 'power4.inOut', delay: 0.5 })
    .fromTo('.navbar', { y: -100, opacity: 0 }, { duration: 1.2, y: 0, opacity: 1, ease: 'power4.out' }, '-=0.5')
    .fromTo('.hero-overlay-content', { y: 60, opacity: 0 }, { duration: 1.2, y: 0, opacity: 1, ease: 'expo.out' }, '-=0.7')
    .fromTo('.quick-book-section', { y: 30, opacity: 0 }, { duration: 1, y: 0, opacity: 1, ease: 'power3.out' }, '-=0.5');

  // Safety fallback: ensure navbar is always visible after animation
  setTimeout(() => {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
      navbar.style.opacity = '1';
      navbar.style.transform = 'translateY(0)';
      navbar.style.visibility = 'visible';
    }
  }, 5000);
});

// Advanced Scroll Reveals
const revealElements = document.querySelectorAll(".gsap-reveal");
revealElements.forEach((el) => {
  gsap.fromTo(el, 
    { opacity: 0, y: 60, scale: 0.98, visibility: 'hidden' },
    {
      opacity: 1,
      y: 0,
      scale: 1,
      visibility: 'visible',
      duration: 1.5,
      ease: "expo.out",
      scrollTrigger: {
        trigger: el,
        start: "top 90%",
        toggleActions: "play none none none"
      }
    }
  );
});

// Staggered Stats Count
gsap.from(".stat-number", {
  scrollTrigger: {
    trigger: ".stats-section",
    start: "top 80%"
  },
  innerHTML: 0,
  duration: 2,
  snap: { innerHTML: 1 },
  stagger: 0.2,
  ease: "power2.out"
});

const quickBookForm = document.getElementById('quickBookForm');
if (quickBookForm) {
  const checkInInput = quickBookForm.querySelector('input[name="checkin"]');
  const checkOutInput = quickBookForm.querySelector('input[name="checkout"]');

  function isQuickBookDateRangeValid() {
    if (!checkInInput.value || !checkOutInput.value) return true;
    return new Date(`${checkOutInput.value}T00:00:00`) > new Date(`${checkInInput.value}T00:00:00`);
  }

  function validateQuickBookDateRange() {
    if (isQuickBookDateRangeValid()) {
      checkOutInput.setCustomValidity('');
      return true;
    }

    checkOutInput.setCustomValidity('Check-out date must be after check-in date.');
    return false;
  }

  function syncQuickBookCheckOutMinimum() {
    if (!checkInInput.value) return;

    const checkInDate = new Date(`${checkInInput.value}T00:00:00`);
    checkInDate.setDate(checkInDate.getDate() + 1);
    const minimumCheckOut = checkInDate.toISOString().slice(0, 10);

    checkOutInput.min = minimumCheckOut;
    if (checkOutInput.value && checkOutInput.value < minimumCheckOut) {
      checkOutInput.value = '';
    }

    validateQuickBookDateRange();
  }

  checkInInput.addEventListener('change', syncQuickBookCheckOutMinimum);
  checkInInput.addEventListener('input', validateQuickBookDateRange);
  checkOutInput.addEventListener('input', validateQuickBookDateRange);
  checkOutInput.addEventListener('change', validateQuickBookDateRange);
  quickBookForm.addEventListener('submit', function(event) {
    if (!validateQuickBookDateRange()) {
      event.preventDefault();
      checkOutInput.reportValidity();
    }
  });
}
</script>

<?php
  include('Footer.php')
?>
</body>
</html>
