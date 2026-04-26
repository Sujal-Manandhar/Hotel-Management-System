<?php
include('connection.php');

if(isset($_POST['save']))
{
  $fname = trim($_POST['fname']);
  $email = trim($_POST['email']);
  $Passw = password_hash($_POST['Passw'], PASSWORD_DEFAULT);
  $mobi = trim($_POST['mobi']);
  $addr = trim($_POST['addr']);
  $gend = $_POST['gend'];
  $countr = $_POST['countr'];

  $stmt = $con->prepare("SELECT * FROM create_account WHERE email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if($result->num_rows > 0)
  {
      $msg= "An account already exists with this email.";
      $msg_type = "error";
  }
  else
  {
      $stmt = $con->prepare("INSERT INTO create_account(name,email,password,mobile,address,gender,country) VALUES(?,?,?,?,?,?,?)");
      $stmt->bind_param("sssssss", $fname, $email, $Passw, $mobi, $addr, $gend, $countr);
      if($stmt->execute())
      {
          header('location:Login.php'); 
          exit;
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Account - Crown Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .reg-page {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, rgba(10,14,23,0.92), rgba(22,27,34,0.88)), url('https://images.unsplash.com/photo-1542314831-c53cd3816002?w=1600&q=80') center/cover fixed;
      padding: 40px 20px;
      margin-top: -65px;
      padding-top: 100px;
    }
    .reg-container {
      display: flex;
      max-width: 950px;
      width: 100%;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 30px 80px rgba(0,0,0,0.6);
      border: 1px solid var(--glass-border);
    }
    .reg-left {
      flex: 0 0 40%;
      background: linear-gradient(to bottom, rgba(197,160,89,0.15), rgba(10,14,23,0.95)), url('https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=600&q=80') center/cover;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 40px;
    }
    .reg-left h2 {
      color: #fff;
      font-size: 2em;
      margin-bottom: 10px;
    }
    .reg-left p {
      color: rgba(255,255,255,0.7);
      font-size: 0.95em;
      line-height: 1.6;
    }
    .reg-right {
      flex: 1;
      background: rgba(10, 14, 23, 0.95);
      backdrop-filter: blur(20px);
      padding: 45px 40px;
    }
    .reg-brand {
      text-align: center;
      margin-bottom: 30px;
    }
    .reg-brand img {
      height: 50px;
      margin-bottom: 12px;
    }
    .reg-brand h3 {
      color: #fff;
      font-size: 1.5em;
      margin: 0;
    }
    .reg-brand p {
      color: var(--text-secondary);
      font-size: 0.85em;
      margin-top: 4px;
    }
    .reg-right .field-group {
      margin-bottom: 16px;
    }
    .reg-right .field-group label {
      color: var(--primary-color);
      font-size: 0.75em;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 5px;
      display: block;
      font-weight: 600;
    }
    .reg-right .field-group label i {
      margin-right: 5px;
    }
    .reg-right .form-control {
      height: 46px;
      margin-bottom: 0;
    }
    .reg-right textarea.form-control {
      height: 70px;
      resize: none;
    }
    /* Fix dropdown visibility - dark text on native white dropdown */
    .reg-right select.form-control {
      color: #fff;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23c5a059' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 15px center;
      padding-right: 35px;
    }
    .reg-right select.form-control option {
      background: #1a1f2e;
      color: #fff;
    }
    .reg-row {
      display: flex;
      gap: 15px;
    }
    .reg-row .field-group {
      flex: 1;
    }
    .gender-options {
      display: flex;
      gap: 20px;
      padding-top: 8px;
    }
    .gender-options label {
      color: #fff !important;
      text-transform: none !important;
      font-size: 0.95em !important;
      letter-spacing: 0 !important;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .gender-options input[type="radio"] {
      accent-color: var(--primary-color);
      width: 16px;
      height: 16px;
    }
    .pass-wrap {
      position: relative;
    }
    .pass-wrap .form-control {
      padding-right: 45px;
    }
    .pass-toggle {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-secondary);
      cursor: pointer;
      font-size: 1.1em;
      transition: color 0.3s;
      z-index: 2;
    }
    .pass-toggle:hover {
      color: var(--primary-color);
    }
    .btn-register {
      display: block;
      width: 100%;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
      color: #000;
      border: none;
      padding: 14px;
      border-radius: 14px;
      font-weight: 700;
      font-size: 1.05em;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
      margin-top: 20px;
      cursor: pointer;
    }
    .btn-register:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(197, 160, 89, 0.5);
    }
    .reg-footer {
      text-align: center;
      margin-top: 20px;
    }
    .reg-footer a {
      color: var(--primary-color);
      font-weight: 700;
    }
    .reg-footer p {
      color: var(--text-secondary);
      font-size: 0.9em;
    }
    .reg-error {
      background: rgba(220, 53, 69, 0.15);
      border: 1px solid rgba(220, 53, 69, 0.3);
      color: #ff6b7a;
      padding: 12px 15px;
      border-radius: 12px;
      font-size: 0.9em;
      margin-bottom: 18px;
      text-align: center;
    }
    @media (max-width: 768px) {
      .reg-left { display: none; }
      .reg-container { max-width: 500px; }
      .reg-row { flex-direction: column; gap: 0; }
    }
  </style>
</head>
<body>
<?php include('Menu Bar.php'); ?>

<div class="reg-page">
  <div class="reg-container">
    <!-- Left Visual -->
    <div class="reg-left">
      <h2>Join the Crown</h2>
      <p>Create your account to unlock exclusive member benefits, seamless bookings, and personalized luxury experiences.</p>
    </div>

    <!-- Right Form -->
    <div class="reg-right">
      <div class="reg-brand">
        <img src="logo/logo2.png" alt="Crown Hotel">
        <h3>Create Account</h3>
        <p>Begin your luxury journey</p>
      </div>

      <?php if(isset($msg)) { ?>
        <div class="reg-error"><i class="fa fa-exclamation-circle"></i> <?php echo $msg; ?></div>
      <?php } ?>

      <form method="post">
        <div class="reg-row">
          <div class="field-group">
            <label><i class="fa fa-user"></i> Full Name</label>
            <input type="text" name="fname" class="form-control" placeholder="Your full name" required>
          </div>
          <div class="field-group">
            <label><i class="fa fa-envelope"></i> Email</label>
            <input type="email" name="email" class="form-control" placeholder="you@example.com" autocomplete="off" required>
          </div>
        </div>

        <div class="reg-row">
          <div class="field-group">
            <label><i class="fa fa-lock"></i> Password</label>
            <div class="pass-wrap">
              <input type="password" id="regPass" name="Passw" class="form-control" placeholder="••••••••" autocomplete="off" required>
              <i class="fa fa-eye pass-toggle" onclick="togglePass('regPass', this)"></i>
            </div>
          </div>
          <div class="field-group">
            <label><i class="fa fa-phone"></i> Mobile</label>
            <input type="text" name="mobi" class="form-control" placeholder="Enter your mobile number" required>
          </div>
        </div>

        <div class="field-group">
          <label><i class="fa fa-map-marker"></i> Address</label>
          <textarea name="addr" class="form-control" placeholder="Street, City, District" required></textarea>
        </div>

        <div class="reg-row">
          <div class="field-group">
            <label><i class="fa fa-venus-mars"></i> Gender</label>
            <div class="gender-options">
              <label><input type="radio" name="gend" value="male" required> Male</label>
              <label><input type="radio" name="gend" value="female"> Female</label>
              <label><input type="radio" name="gend" value="other"> Other</label>
            </div>
          </div>
          <div class="field-group">
            <label><i class="fa fa-globe"></i> Country</label>
            <select name="countr" class="form-control" required>
              <option value="Nepal">Nepal</option>
              <option value="India">India</option>
              <option value="USA">USA</option>
              <option value="UK">United Kingdom</option>
              <option value="Australia">Australia</option>
              <option value="China">China</option>
              <option value="Canada">Canada</option>
              <option value="Japan">Japan</option>
              <option value="Germany">Germany</option>
              <option value="France">France</option>
              <option value="Brazil">Brazil</option>
              <option value="Bangladesh">Bangladesh</option>
              <option value="Pakistan">Pakistan</option>
              <option value="Sri Lanka">Sri Lanka</option>
              <option value="Thailand">Thailand</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

        <button type="submit" name="save" class="btn-register">Create Account <i class="fa fa-arrow-right"></i></button>
      </form>

      <div class="reg-footer">
        <p>Already a member? <a href="Login.php">Sign In</a></p>
      </div>
    </div>
  </div>
</div>

<script>
function togglePass(id, icon) {
  var inp = document.getElementById(id);
  if (inp.type === 'password') {
    inp.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  } else {
    inp.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  }
}
</script>
</body>
</html>
