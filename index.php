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

  <!-- Special Offer Banner -->
  <div class="special-offer-banner">
    ✨ Flash Sale: Get 20% Off on all Luxury Suites this weekend! Use code: <strong>CROWN20</strong> ✨
  </div>
<div id="myCarousel" class="carousel slide" data-ride="carousel"> <!--Slider Image Start Here--> 
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
    
</div> <!--Room Info Start Here-->

 <div class="container-fluid" id="red">
<div class="container text-center gsap-reveal" id="rooms-section">    
  <h2 class="section-title">Our <span style="color:var(--primary-color)">Rooms</span></h2>
  <hr>
  <p style="color:var(--text-secondary); margin-bottom: 50px;">Experience the perfect blend of luxury, comfort, and style.</p>
  
  <div class="row">
	<?php 
	$sql=mysqli_query($con,"select * from rooms");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	<div class="col-sm-4 room-card-wrapper gsap-reveal">
      <a href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>" style="text-decoration:none;">
        <img src="image/rooms/<?php echo $r_res['image']; ?>" class="img-responsive thumbnail" alt="<?php echo $r_res['type']; ?>">
        <h4 class="Room_Text"><?php echo $r_res['type']; ?></h4>
        <p class="room-desc-text"><?php echo substr($r_res['details'],0,120); ?>...</p>
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
      <p style="color:var(--text-secondary); margin-bottom: 60px;">World-class services tailored for your ultimate satisfaction.</p>
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
      <p style="color:var(--text-secondary); margin-bottom: 60px;">What our valued guests have to say about their experience.</p>
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
<div class="container-fluid" style="padding: 80px 0; background: rgba(255,255,255,0.02);">
  <div class="container text-center">
    <div class="row">
      <div class="col-sm-3 gsap-reveal">
        <h2 style="color:var(--primary-color); font-size: 3em;">150+</h2>
        <p style="color:var(--text-secondary); text-transform: uppercase; letter-spacing: 2px;">Luxury Rooms</p>
      </div>
      <div class="col-sm-3 gsap-reveal">
        <h2 style="color:var(--primary-color); font-size: 3em;">12k+</h2>
        <p style="color:var(--text-secondary); text-transform: uppercase; letter-spacing: 2px;">Happy Guests</p>
      </div>
      <div class="col-sm-3 gsap-reveal">
        <h2 style="color:var(--primary-color); font-size: 3em;">15</h2>
        <p style="color:var(--text-secondary); text-transform: uppercase; letter-spacing: 2px;">Awards Won</p>
      </div>
      <div class="col-sm-3 gsap-reveal">
        <h2 style="color:var(--primary-color); font-size: 3em;">100%</h2>
        <p style="color:var(--text-secondary); text-transform: uppercase; letter-spacing: 2px;">Satisfaction</p>
      </div>
    </div>
  </div>
</div>
<!-- Stats Section End -->

<script>
// GSAP Initializations
gsap.registerPlugin(ScrollTrigger);

// Preloader Animation
window.addEventListener('load', () => {
  const tl = gsap.timeline();
  tl.to('.preloader-progress', { duration: 1.5, left: '0%', ease: 'power3.inOut' })
    .to('.preloader-logo', { duration: 0.8, opacity: 1, y: -20, ease: 'back.out(1.7)' })
    .to('#preloader', { duration: 1, opacity: 0, display: 'none', ease: 'power4.inOut', delay: 0.5 })
    .from('.navbar', { duration: 1.2, y: -100, opacity: 0, ease: 'power4.out' }, '-=0.5')
    .from('.special-offer-banner', { duration: 0.8, opacity: 0, y: -20, ease: 'power2.out' }, '-=0.3')
    .from('.carousel-caption', { duration: 1.2, y: 80, opacity: 0, ease: 'expo.out' }, '-=0.7');
});

// Advanced Scroll Reveals
const revealElements = document.querySelectorAll(".gsap-reveal");
revealElements.forEach((el) => {
  gsap.fromTo(el, 
    { opacity: 0, y: 60, scale: 0.98 },
    {
      opacity: 1,
      y: 0,
      scale: 1,
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

// Staggered Stats Count (Mock)
gsap.from(".col-sm-3 h2", {
  scrollTrigger: {
    trigger: ".col-sm-3",
    start: "top 80%"
  },
  innerHTML: 0,
  duration: 2,
  snap: { innerHTML: 1 },
  stagger: 0.2,
  ease: "power2.out"
});
</script>

<?php
  include('Footer.php')
?>
</body>
</html>