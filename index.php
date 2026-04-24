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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="css/style.css" rel="stylesheet"/>
  <meta name="description" content="Welcome to Crown Hotel - Experience luxury and comfort at our premier destination. Book your stay today for an unforgettable experience with world-class amenities.">
  <meta name="keywords" content="Hotel, Luxury Stay, Crown Hotel, Room Booking, Vacation, Travel">
</head> <!--Head Open  Here-->
<body>
  <?php
      include('Menu Bar.php')
  ?>
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
    
    <div class="scroll-indicator" onclick="document.getElementById('rooms-section').scrollIntoView({behavior: 'smooth'})">
      <span></span>
    </div>
    
</div> <!--Room Info Start Here-->

 <div class="container-fluid" id="red">
<div class="container text-center" id="rooms-section">    
  <h2 class="section-title">Our <span style="color:var(--primary-color)">Rooms</span></h2>
  <hr>
  <p style="color:var(--text-secondary); margin-bottom: 50px;">Experience the perfect blend of luxury, comfort, and style.</p>
  
  <div class="row">
	<?php 
	$sql=mysqli_query($con,"select * from rooms");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	<div class="col-sm-4 room-card-wrapper">
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
<div class="container-fluid features-section reveal">
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
<div class="container-fluid reviews-section reveal">
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

<script>
function reveal() {
  var reveals = document.querySelectorAll(".reveal");
  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;
    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    }
  }
}
window.addEventListener("scroll", reveal);
reveal(); // Initial check
</script>

<?php
  include('Footer.php')
?>
</body>
</html>