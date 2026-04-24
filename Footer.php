<footer id="footer" class="container-fluid">
  <div class="container">
    <div class="row">
      <!-- About/Logo Column -->
      <div class="col-sm-4 reveal">
        <img src="logo/logo2.png" class="footer-logo" alt="Crown Hotel">
        <p class="footer-text">
          Crown Hotel is a premier luxury destination situated in the heart of Kathmandu. 
          We offer 4-star excellence with world-class amenities and personalized services 
          designed to make every stay unforgettable.
        </p>
        <div class="social-links">
          <a href="#" class="social-icon">f</a>
          <a href="#" class="social-icon">t</a>
          <a href="#" class="social-icon">i</a>
          <a href="#" class="social-icon">y</a>
        </div>
      </div>

      <!-- Contact Info Column -->
      <div class="col-sm-3 col-sm-offset-1 reveal">
        <h3 style="color:var(--primary-color); margin-bottom: 25px;">Contact Us</h3>
        <p style="margin-bottom: 15px;"><strong>Address:</strong><br>Hetauda-10, Main Road, Nepal</p>
        <p style="margin-bottom: 15px;"><strong>Phone:</strong><br>+977 057-5020589</p>
        <p style="margin-bottom: 15px;"><strong>Email:</strong><br>Crownhotel@gmail.com</p>
      </div>

      <!-- Feedback Column -->
      <div class="col-sm-4 reveal">
        <div class="feedback-panel">
          <h3>Share Feedback</h3>
          <form method="post" action="Footer.php">
            <input type="text" name="n" class="form-control" placeholder="Your Name" required>
            <input type="email" name="e" class="form-control" placeholder="Email Address" required>
            <input type="text" name="p" class="form-control" placeholder="Mobile Number" required>
            <textarea name="msg" class="form-control" placeholder="Your Message" rows="3" required></textarea>
            <button type="submit" name="send" class="btn btn-primary btn-block">Send Feedback</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container-fluid text-center" style="margin-top: 60px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.05);">
    <p style="font-size: 0.9em; opacity: 0.6;">Developed By Sujal Manandhar | All Rights Reserved © 2025</p>
  </div>
</footer>

<?php 
if(isset($_POST['send']))
{
  $name = $_POST['n'];
  $email = $_POST['e'];
  $phone = $_POST['p'];
  $msg = $_POST['msg'];
  
  $stmt = $con->prepare("INSERT INTO feedback (name, email, mobile, message) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $phone, $msg);
  if($stmt->execute()) {
    echo "<script>alert('Feedback sent successfully!')</script>";
  }
}
?>