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
      <h1 style="font-size: 3.5em; margin-bottom: 10px;">The <span style="color:var(--accent-color)">Editorial</span></h1>
      <p style="color:var(--text-secondary); font-size: 1.2em; max-width: 600px; margin: 0 auto 60px auto;">Curated stories from the world of luxury hospitality and travel.</p>
    </div>

    <!-- Blog List Container -->
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        
        <!-- Blog Post 1 -->
        <article class="blog-list-item">
          <div class="blog-image-wrapper">
            <img src="https://images.unsplash.com/photo-1542314831-c53cd3816002?w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;" alt="The Art of Fine Dining">
          </div>
          <div class="blog-content-wrapper">
            <p class="text-muted" style="font-size: 0.8em; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">Hospitality | 5 min read</p>
            <h2 style="font-size: 2em; margin-bottom: 20px; color: var(--text-primary);">The Art of Fine Dining at Crown Hotel</h2>
            <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 30px;">Explore the culinary wonders of our world-class kitchen. From locally sourced ingredients to exquisite presentation, our chefs are dedicated to creating an unforgettable gastronomic journey for every guest...</p>
            <div>
              <a href="#" class="btn btn-primary">Read Full Story</a>
            </div>
          </div>
        </article>

        <!-- Blog Post 2 -->
        <article class="blog-list-item">
          <div class="blog-image-wrapper">
            <img src="https://images.unsplash.com/photo-1584132967334-10e028bd69f7?w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;" alt="Relaxing Weekend Tips">
          </div>
          <div class="blog-content-wrapper">
            <p class="text-muted" style="font-size: 0.8em; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">Wellness | 4 min read</p>
            <h2 style="font-size: 2em; margin-bottom: 20px; color: var(--text-primary);">5 Tips for a Perfectly Relaxing Weekend</h2>
            <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 30px;">Modern life can be hectic, but your stay at Crown Hotel doesn't have to be. We've compiled the ultimate guide to unwinding in our spa, finding true serenity during your stay...</p>
            <div>
              <a href="#" class="btn btn-primary">Read Full Story</a>
            </div>
          </div>
        </article>

        <!-- Blog Post 3 -->
        <article class="blog-list-item">
          <div class="blog-image-wrapper">
            <img src="https://images.unsplash.com/photo-1551882547-ff40c0d5bf8f?w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;" alt="Sustainability">
          </div>
          <div class="blog-content-wrapper">
            <p class="text-muted" style="font-size: 0.8em; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 10px;">Eco-Friendly | 6 min read</p>
            <h2 style="font-size: 2em; margin-bottom: 20px; color: var(--text-primary);">Our Commitment to Sustainability</h2>
            <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 30px;">At Crown Hotel, we believe luxury should be responsible. Learn about our new solar initiative, zero-waste kitchen policies, and how we're working to preserve the beautiful environment...</p>
            <div>
              <a href="#" class="btn btn-primary">Read Full Story</a>
            </div>
          </div>
        </article>

      </div>
    </div>
  </div>

  <?php include('Footer.php'); ?>
</body>
</html>
