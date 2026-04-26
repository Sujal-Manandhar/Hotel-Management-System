<?php 
session_start();
error_reporting(0);
if(isset($_SESSION['create_account_logged_in']) && $_SESSION['create_account_logged_in']!="")
{
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'Booking_Form.php';
    header('location:' . $redirect);
    exit;
}
require('connection.php');

if(isset($_POST['login']))
{
  $eid = isset($_POST['eid']) ? trim($_POST['eid']) : '';
  $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

  if($eid=="" || $pass=="")
  {
      $error= "fill all details";  
  }   
  else
  {
      $stmt = $con->prepare("SELECT * FROM create_account WHERE email=?");
      $stmt->bind_param("s", $eid);
      $stmt->execute();
      $result = $stmt->get_result();

      if($row = $result->fetch_assoc())
      {
          // Check hash or fallback to plaintext for old accounts
          if(password_verify($pass, $row['password']) || $pass === $row['password'])
          {
              $_SESSION['create_account_logged_in']=$eid;  
              $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'Booking_Form.php';
              header('location:' . $redirect); 
              exit;
          }
          else
          {
              $error= "Invalid login details"; 
          }
      }
      else
      {
          $error= "Invalid login details"; 
      } 
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Guest Login - Crown Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .login-page {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, rgba(10,14,23,0.92), rgba(22,27,34,0.88)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600&q=80') center/cover fixed;
      padding: 40px 20px;
      margin-top: -65px;
      padding-top: 100px;
    }
    .login-container {
      display: flex;
      max-width: 900px;
      width: 100%;
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 30px 80px rgba(0,0,0,0.6);
      border: 1px solid var(--glass-border);
    }
    .login-left {
      flex: 0 0 45%;
      background: linear-gradient(to bottom, rgba(197,160,89,0.15), rgba(10,14,23,0.9)), url('https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=600&q=80') center/cover;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 40px;
    }
    .login-left h2 {
      color: #fff;
      font-size: 2em;
      margin-bottom: 10px;
    }
    .login-left p {
      color: rgba(255,255,255,0.7);
      font-size: 0.95em;
      line-height: 1.6;
    }
    .login-right {
      flex: 1;
      background: rgba(10, 14, 23, 0.95);
      backdrop-filter: blur(20px);
      padding: 50px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .login-brand {
      text-align: center;
      margin-bottom: 35px;
    }
    .login-brand img {
      height: 60px;
      margin-bottom: 15px;
    }
    .login-brand h3 {
      color: #fff;
      font-size: 1.6em;
      margin: 0;
    }
    .login-brand p {
      color: var(--text-secondary);
      font-size: 0.9em;
      margin-top: 5px;
    }
    .login-right label {
      color: var(--primary-color);
      font-size: 0.8em;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 0;
      display: block;
    }
    .login-right .form-control {
      margin-bottom: 0;
      height: 50px;
    }
    .btn-login {
      display: block;
      width: 100%;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
      color: #000;
      border: none;
      padding: 15px;
      border-radius: 14px;
      font-weight: 700;
      font-size: 1.05em;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s;
      margin-top: 5px;
      cursor: pointer;
    }
    .btn-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(197, 160, 89, 0.5);
    }
    .login-links {
      text-align: center;
      margin-top: 25px;
      display: flex;
      justify-content: center;
      gap: 8px;
      flex-wrap: wrap;
    }
    .login-links a {
      color: var(--text-secondary);
      font-size: 0.9em;
      transition: color 0.3s;
    }
    .login-links a:hover {
      color: var(--primary-color);
    }
    .login-links span {
      color: rgba(255,255,255,0.2);
    }
    .login-error {
      background: rgba(220, 53, 69, 0.15);
      border: 1px solid rgba(220, 53, 69, 0.3);
      color: #ff6b7a;
      padding: 12px 15px;
      border-radius: 12px;
      font-size: 0.9em;
      margin-bottom: 20px;
      text-align: center;
    }
    .input-icon-wrap {
      margin-bottom: 20px;
    }
    .input-icon-wrap label i {
      margin-right: 6px;
    }
    .input-icon-wrap .form-control {
      margin-top: 6px;
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
    @media (max-width: 768px) {
      .login-left { display: none; }
      .login-container { max-width: 450px; }
    }
  </style>
</head>
<body>
<?php include('Menu Bar.php'); ?>

<div class="login-page">
  <div class="login-container">
    <!-- Left Visual Panel -->
    <div class="login-left">
      <h2>Welcome Back</h2>
      <p>Sign in to access your reservations, manage your bookings, and enjoy exclusive member benefits at Crown Hotel.</p>
    </div>

    <!-- Right Login Form -->
    <div class="login-right">
      <div class="login-brand">
        <img src="logo/logo2.png" alt="Crown Hotel">
        <h3>Guest Login</h3>
        <p>Access your Crown account</p>
      </div>

      <?php if(isset($error)) { ?>
        <div class="login-error"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?></div>
      <?php } ?>

      <form method="post">
        <div class="input-icon-wrap">
          <label><i class="fa fa-envelope"></i> Email Address</label>
          <input type="email" class="form-control" name="eid" placeholder="you@example.com" autocomplete="off" required>
        </div>
        <div class="input-icon-wrap">
          <label><i class="fa fa-lock"></i> Password</label>
          <div class="pass-wrap">
            <input type="password" class="form-control" id="loginPass" name="pass" placeholder="••••••••" autocomplete="off" required>
            <i class="fa fa-eye pass-toggle" onclick="togglePass('loginPass', this)"></i>
          </div>
        </div>
        <button type="submit" name="login" class="btn-login">Sign In <i class="fa fa-arrow-right"></i></button>
      </form>

      <div class="login-links">
        <a href="Forgot account.php">Forgot Password?</a>
        <span>|</span>
        <a href="Registation form.php<?php echo isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : ''; ?>">Create an Account</a>
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
