<?php 
session_start();
error_reporting(1);
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Blog - Crown Hotel | Hospitality Insights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <meta name="description" content="Read the latest news, travel tips, and luxury hospitality stories from the Crown Hotel blog. Discover the art of fine dining and luxury living.">
</head>
<body>
  <?php include('Menu Bar.php'); ?>

  <div class="container" style="margin-top:40px;">
    <div class="text-center">
      <h1 style="font-size: 3.5em; margin-bottom: 10px;">Our <span style="color:var(--accent-color)">Blog</span></h1>
      <p style="color:var(--text-secondary); font-size: 1.2em; max-width: 600px; margin: 0 auto 40px auto;">Insights and stories from the heart of luxury hospitality.</p>
    </div>

    <div class="row">
      <!-- Blog Post 1 -->
      <div class="col-md-4 col-sm-6">
        <div class="glass-panel" style="padding: 20px;">
          <img src="https://images.unsplash.com/photo-1542314831-c53cd3816002?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px; height: 220px; width: 100%; object-fit: cover;" alt="The Art of Fine Dining">
          <p class="text-muted" style="font-size: 0.8em; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Hospitality | 5 min read</p>
          <h3 style="font-size: 1.4em; line-height: 1.3; margin-bottom: 15px; min-height: 3.6em;">The Art of Fine Dining at Crown Hotel</h3>
          <p class="text-justify" style="font-size: 0.95em; color: var(--text-secondary); margin-bottom: 20px;">Explore the culinary wonders of our world-class kitchen. From locally sourced ingredients to exquisite presentation...</p>
          <a href="#" class="btn btn-primary btn-sm">Read Article</a>
        </div>
      </div>

      <!-- Blog Post 2 -->
      <div class="col-md-4 col-sm-6">
        <div class="glass-panel" style="padding: 20px;">
          <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px; height: 220px; width: 100%; object-fit: cover;" alt="Relaxing Weekend Tips">
          <p class="text-muted" style="font-size: 0.8em; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Wellness | 4 min read</p>
          <h3 style="font-size: 1.4em; line-height: 1.3; margin-bottom: 15px; min-height: 3.6em;">5 Tips for a Perfectly Relaxing Weekend</h3>
          <p class="text-justify" style="font-size: 0.95em; color: var(--text-secondary); margin-bottom: 20px;">Modern life can be hectic, but your stay at Crown Hotel doesn't have to be. We've compiled the ultimate guide...</p>
          <a href="#" class="btn btn-primary btn-sm">Read Article</a>
        </div>
      </div>

      <!-- Blog Post 3 -->
      <div class="col-md-4 col-sm-6">
        <div class="glass-panel" style="padding: 20px;">
          <img src="https://images.unsplash.com/photo-1551882547-ff40c0d5bf8f?w=800&q=80" class="img-responsive" style="border-radius:15px; margin-bottom:20px; height: 220px; width: 100%; object-fit: cover;" alt="Sustainability in Hospitality">
          <p class="text-muted" style="font-size: 0.8em; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;">Eco-Friendly | 6 min read</p>
          <h3 style="font-size: 1.4em; line-height: 1.3; margin-bottom: 15px; min-height: 3.6em;">Our Commitment to Sustainability</h3>
          <p class="text-justify" style="font-size: 0.95em; color: var(--text-secondary); margin-bottom: 20px;">At Crown Hotel, we believe luxury should be responsible. Learn about our new solar initiative and kitchen policies...</p>
          <a href="#" class="btn btn-primary btn-sm">Read Article</a>
        </div>
      </div>
    </div>
  </div>

  <?php include('Footer.php'); ?>
</body>
</html>
