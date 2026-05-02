<?php 
session_start();
error_reporting(0);
include('connection.php');

if (!isset($_SESSION['create_account_logged_in']) || $_SESSION['create_account_logged_in']=="") {
    header('Location: Login.php');
    exit;
}
$eid = $_SESSION['create_account_logged_in'];

$msg = "";
if(isset($_POST['update']))
{
    $new_email = trim($_POST['email']);
    $name = trim($_POST['name']);
    $mob = trim($_POST['mob']);
    $add = trim($_POST['add']);
    
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    $proceed = true;

    // Check email availability if changed
    if($new_email !== $eid) {
        $check_stmt = $con->prepare("SELECT * FROM create_account WHERE email=?");
        $check_stmt->bind_param("s", $new_email);
        $check_stmt->execute();
        $check_res = $check_stmt->get_result();
        if($check_res->num_rows > 0) {
            $msg = "<div class='alert alert-danger glass-alert'><i class='fa fa-exclamation-circle'></i> Email address is already in use by another account.</div>";
            $proceed = false;
        }
    }

    if($proceed) {
        if(!empty($new_pass) || !empty($confirm_pass)) {
            if($new_pass !== $confirm_pass) {
                $msg = "<div class='alert alert-danger glass-alert'><i class='fa fa-exclamation-circle'></i> New passwords do not match.</div>";
                $proceed = false;
            } else {
                // Update with new password
                $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $stmt = $con->prepare("UPDATE create_account SET name=?, email=?, password=?, mobile=?, address=? WHERE email=?");
                $stmt->bind_param("ssssss", $name, $new_email, $hashed_pass, $mob, $add, $eid);
            }
        } else {
            // Update without changing password
            $stmt = $con->prepare("UPDATE create_account SET name=?, email=?, mobile=?, address=? WHERE email=?");
            $stmt->bind_param("sssss", $name, $new_email, $mob, $add, $eid);
        }

        if($proceed) {
            if($stmt->execute()) {
                if($new_email !== $eid) {
                    $_SESSION['create_account_logged_in'] = $new_email;
                    $eid = $new_email; // Update current variable for display
                }
                $msg = "<div class='alert alert-success glass-alert'><i class='fa fa-check-circle'></i> Profile updated successfully!</div>";
            } else {
                $msg = "<div class='alert alert-danger glass-alert'><i class='fa fa-exclamation-circle'></i> Error updating profile.</div>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Crown Hotel - Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .profile-page {
        min-height: 100vh;
        padding: 80px 20px 60px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }
    .profile-container {
        max-width: 700px;
        width: 100%;
        margin-top: 20px;
    }
    .profile-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .profile-header h1 {
        font-size: 2.8em;
        background: linear-gradient(to right, #fff, var(--primary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 8px;
    }
    .profile-header p {
        color: var(--text-secondary);
        font-size: 1.05em;
    }
    .glass-alert {
        background: rgba(40, 167, 69, 0.15);
        border: 1px solid rgba(40, 167, 69, 0.3);
        color: #fff;
        border-radius: 12px;
        backdrop-filter: blur(10px);
        text-align: center;
        padding: 15px;
        margin-bottom: 30px;
    }
    .glass-alert.alert-danger {
        background: rgba(220, 53, 69, 0.15);
        border-color: rgba(220, 53, 69, 0.3);
    }
    .profile-form .form-group {
        margin-bottom: 25px;
    }
    .profile-form label {
        color: var(--primary-color);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85em;
        margin-bottom: 10px;
        display: block;
    }
    .input-group-addon.glass-addon {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-right: none;
        color: var(--primary-color);
        border-radius: 12px 0 0 12px;
    }
    .profile-form .form-control {
        border-radius: 0 12px 12px 0;
        border-left: none;
    }
    .profile-form .form-control[readonly] {
        background: rgba(0, 0, 0, 0.2) !important;
        color: var(--text-secondary) !important;
        cursor: not-allowed;
    }
    .gender-badge {
        display: inline-block;
        background: rgba(197, 160, 89, 0.15);
        color: var(--primary-color);
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        border: 1px solid rgba(197, 160, 89, 0.3);
        letter-spacing: 1px;
    }
    .btn-update {
        width: 100%;
        margin-top: 20px;
        padding: 14px;
        font-size: 1.1em;
    }
  </style>
</head>
<body>
<?php include('Menu Bar.php'); ?>

<?php
    $sql= mysqli_query($con,"select * from create_account where email='$eid' "); 
    $result=mysqli_fetch_assoc($sql);
?>

<div class="profile-page">
  <div class="profile-container">
    <div class="profile-header">
        <h1><i class="fa fa-user-circle-o"></i> My Profile</h1>
        <p>Manage your account details and preferences</p>
    </div>

    <?php echo $msg; ?>

    <div class="glass-panel">
        <form method="post" class="profile-form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Full Name</label>
                        <div class="input-group">
                            <span class="input-group-addon glass-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="name" value="<?php echo htmlspecialchars($result['name']); ?>" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-group">
                            <span class="input-group-addon glass-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" value="<?php echo htmlspecialchars($result['email']); ?>" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <div class="input-group">
                            <span class="input-group-addon glass-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="mob" value="<?php echo htmlspecialchars($result['mobile']); ?>" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <div style="padding-top: 5px;">
                            <span class="gender-badge">
                                <?php if(strtolower($result['gender']) == 'male') { ?>
                                    <i class="fa fa-male"></i>
                                <?php } else if(strtolower($result['gender']) == 'female') { ?>
                                    <i class="fa fa-female"></i>
                                <?php } ?>
                                <?php echo htmlspecialchars($result['gender']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Address</label>
                <div class="input-group">
                    <span class="input-group-addon glass-addon"><i class="fa fa-map-marker"></i></span>
                    <input type="text" name="add" value="<?php echo htmlspecialchars($result['address']); ?>" class="form-control" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>New Password</label>
                        <div class="input-group">
                            <span class="input-group-addon glass-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="new_pass" class="form-control" placeholder="Leave blank to keep current">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-addon glass-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="confirm_pass" class="form-control" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" name="update" class="btn btn-primary btn-update">
                <i class="fa fa-save"></i> Save Changes
            </button>
        </form>
    </div>
  </div>
</div>

<?php include('Footer.php'); ?>
</body>
</html>
