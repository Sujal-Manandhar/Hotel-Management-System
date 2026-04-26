<?php 
session_start();
error_reporting(0);
require('../connection.php');
extract($_REQUEST);
if(isset($login))
{
	if($eid=="" || $pass=="")
	{
	$error= "Please fill all details";	
	}		
	else
	{
	$sql=mysqli_query($con,"select * from admin where username='$eid' && password='$pass' ");
		if(mysqli_num_rows($sql))
		{
		$_SESSION['admin_logged_in']=$eid;	
		header('location:dashboard.php');	
		}
		else
		{
		$error= "Invalid admin credentials";	
		}	
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel - Crown Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="../css/style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      padding-top: 0 !important;
    }
    .admin-login-page {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #0a0e17 0%, #161b22 50%, #0d1117 100%);
      position: relative;
      overflow: hidden;
    }
    .admin-login-page::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle at 30% 50%, rgba(197,160,89,0.04) 0%, transparent 50%),
                  radial-gradient(circle at 70% 80%, rgba(197,160,89,0.03) 0%, transparent 40%);
      animation: adminBgPulse 8s ease-in-out infinite alternate;
    }
    @keyframes adminBgPulse {
      0% { transform: scale(1) rotate(0deg); }
      100% { transform: scale(1.05) rotate(2deg); }
    }

    .admin-card {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 440px;
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 24px;
      padding: 50px 40px;
      box-shadow: 0 30px 80px rgba(0,0,0,0.5);
    }

    .admin-badge {
      text-align: center;
      margin-bottom: 35px;
    }
    .admin-badge .shield-icon {
      width: 80px;
      height: 80px;
      line-height: 80px;
      border-radius: 50%;
      background: rgba(197, 160, 89, 0.1);
      border: 2px solid rgba(197, 160, 89, 0.3);
      color: var(--primary-color);
      font-size: 2em;
      margin: 0 auto 20px auto;
      display: block;
    }
    .admin-badge h2 {
      color: #fff;
      font-size: 1.8em;
      margin: 0 0 5px 0;
    }
    .admin-badge p {
      color: var(--text-secondary);
      font-size: 0.9em;
    }

    .admin-card label {
      color: var(--primary-color);
      font-size: 0.75em;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 6px;
      display: block;
      font-weight: 600;
    }
    .admin-card .form-control {
      margin-bottom: 20px;
      height: 52px;
      font-size: 1em;
    }
    .btn-admin-login {
      display: block;
      width: 100%;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
      color: #000;
      border: none;
      padding: 16px;
      border-radius: 14px;
      font-weight: 700;
      font-size: 1.05em;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      transition: all 0.3s;
      cursor: pointer;
      margin-top: 5px;
    }
    .btn-admin-login:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 30px rgba(197, 160, 89, 0.5);
    }
    .admin-error {
      background: rgba(220, 53, 69, 0.12);
      border: 1px solid rgba(220, 53, 69, 0.25);
      color: #ff6b7a;
      padding: 12px 15px;
      border-radius: 12px;
      font-size: 0.9em;
      margin-bottom: 20px;
      text-align: center;
    }
    .admin-footer-link {
      text-align: center;
      margin-top: 25px;
    }
    .admin-footer-link a {
      color: var(--text-secondary);
      font-size: 0.85em;
      transition: color 0.3s;
    }
    .admin-footer-link a:hover {
      color: var(--primary-color);
    }
    .security-note {
      text-align: center;
      margin-top: 20px;
      padding-top: 20px;
      border-top: 1px solid rgba(255,255,255,0.05);
    }
    .security-note p {
      color: rgba(255,255,255,0.25);
      font-size: 0.75em;
      letter-spacing: 0.5px;
    }
    .security-note i {
      color: rgba(197, 160, 89, 0.4);
      margin-right: 5px;
    }
  </style>
</head>
<body>

<div class="admin-login-page">
  <div class="admin-card">
    <div class="admin-badge">
      <div class="shield-icon"><i class="fa fa-shield"></i></div>
      <h2>Admin Panel</h2>
      <p>Crown Hotel Management System</p>
    </div>

    <?php if(isset($error)) { ?>
      <div class="admin-error"><i class="fa fa-exclamation-triangle"></i> <?php echo $error; ?></div>
    <?php } ?>

    <form action="#" method="post">
      <label><i class="fa fa-user"></i> Username</label>
      <input type="text" class="form-control" name="eid" placeholder="Enter admin username" required>

      <label><i class="fa fa-lock"></i> Password</label>
      <input type="password" class="form-control" name="pass" placeholder="••••••••" required>

      <button type="submit" name="login" class="btn-admin-login"><i class="fa fa-sign-in"></i> Access Dashboard</button>
    </form>

    <div class="admin-footer-link">
      <a href="../index.php"><i class="fa fa-arrow-left"></i> Back to Website</a>
    </div>

    <div class="security-note">
      <p><i class="fa fa-lock"></i> Secure admin access. Unauthorized access is prohibited.</p>
    </div>
  </div>
</div>

</body>
</html>
