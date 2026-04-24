<?php 
session_start();
error_reporting(1);
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog - Crown Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
  <?php include('Menu Bar.php'); ?>

  <div class="container" style="margin-top:120px;">
    <h1 class="text-center">Our <span style="color:var(--accent-color)">Blog</span></h1>
    <p class="text-center text-secondary">Discover the latest stories, travel tips, and updates from Crown Hotel.</p>
    <hr><br>

    <div class="row">
      <!-- Blog Post 1 -->
      <div class="col-sm-6">
        <div class="glass-panel">
          <img src="https://images.unsplash.com/photo-1542314831-c53cd3816002?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px;" alt="Hotel Blog">
          <h3>The Art of Fine Dining at Crown Hotel</h3>
          <p class="text-muted">October 24, 2025 | Hospitality</p>
          <p class="text-justify">Explore the culinary wonders of our world-class kitchen. From locally sourced ingredients to exquisite presentation, our chefs are dedicated to creating an unforgettable gastronomic journey for every guest...</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>

      <!-- Blog Post 2 -->
      <div class="col-sm-6">
        <div class="glass-panel">
          <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px;" alt="Hotel Blog">
          <h3>5 Tips for a Perfectly Relaxing Weekend</h3>
          <p class="text-muted">October 20, 2025 | Wellness</p>
          <p class="text-justify">Modern life can be hectic, but your stay at Crown Hotel doesn't have to be. We've compiled the ultimate guide to unwinding in our spa, enjoying our infinity pool, and finding true serenity during your stay...</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Blog Post 3 -->
      <div class="col-sm-6">
        <div class="glass-panel">
          <img src="https://images.unsplash.com/photo-1551882547-ff40c0d5bf8f?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px;" alt="Hotel Blog">
          <h3>Behind the Scenes: Our Commitment to Sustainability</h3>
          <p class="text-muted">October 15, 2025 | Eco-Friendly</p>
          <p class="text-justify">At Crown Hotel, we believe luxury should be responsible. Learn about our new solar initiative, zero-waste kitchen policies, and how we're working to preserve the beautiful environment around us...</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>

      <!-- Blog Post 4 -->
      <div class="col-sm-6">
        <div class="glass-panel">
          <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px;" alt="Hotel Blog">
          <h3>Planning the Perfect Destination Wedding</h3>
          <p class="text-muted">October 10, 2025 | Events</p>
          <p class="text-justify">Your dream wedding deserves a dream venue. Discover why Crown Hotel's grand ballroom and garden terrace have become the most sought-after wedding locations in the region...</p>
          <a href="#" class="btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
  </div>

  <?php include('Footer.php'); ?>
</body>
</html>
