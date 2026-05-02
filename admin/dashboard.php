<?php 
session_start();
extract($_REQUEST);
include('../connection.php');
$admin=$_SESSION['admin_logged_in'];	
if($admin=="")
{
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Admin Dashboard | Crown Hotel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Outfit:wght@600;800&display=swap" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../logo/logo2.png">
    <style>
      :root {
        --primary: #c5a059;
        --sidebar-bg: #0f141e;
        --main-bg: #0a0e17;
        --glass: rgba(255, 255, 255, 0.03);
        --text: #f0f2f5;
      }
      
      body {
        font-family: 'Inter', sans-serif;
        background-color: var(--main-bg);
        color: var(--text);
        margin: 0;
        padding-top: 0;
      }

      /* Navbar Styling */
      .admin-nav {
        background: rgba(15, 20, 30, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(197, 160, 89, 0.1);
        padding: 10px 0;
        z-index: 1001;
      }
      .navbar-brand {
        font-family: 'Outfit', sans-serif;
        color: var(--primary) !important;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
      }
      
      /* Sidebar Modernization */
      .sidebar {
        background-color: var(--sidebar-bg);
        border-right: 1px solid rgba(197, 160, 89, 0.1);
        padding: 0;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        width: 260px;
        z-index: 1000;
        transition: all 0.3s ease;
      }
      
      .sidebar-header {
        padding: 25px;
        text-align: center;
        border-bottom: 1px solid rgba(197, 160, 89, 0.05);
        position: relative;
      }
      
      .close-sidebar {
        display: none;
        position: absolute;
        top: 15px;
        right: 15px;
        font-size: 2.2em;
        color: var(--primary);
        cursor: pointer;
        line-height: 1;
        transition: transform 0.3s;
      }
      .close-sidebar:hover {
        transform: rotate(90deg);
      }
      
      .sidebar-header img {
        height: 45px;
        margin-bottom: 10px;
      }

      .nav-sidebar {
        margin: 20px 0;
      }
      
      .nav-sidebar li a {
        color: #9ea7b3;
        padding: 15px 25px;
        font-weight: 500;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        text-decoration: none;
      }
      
      .nav-sidebar li a i {
        width: 25px;
        font-size: 1.1em;
        margin-right: 12px;
      }
      
      .nav-sidebar li a:hover {
        background: rgba(197, 160, 89, 0.05);
        color: var(--primary);
      }
      
      .nav-sidebar li.active a {
        background: linear-gradient(to right, rgba(197, 160, 89, 0.15), transparent);
        color: var(--primary);
        border-left: 3px solid var(--primary);
      }

      /* Main Content */
      .main-content {
        margin-left: 260px;
        padding: 40px;
        min-height: 100vh;
      }
      
      .page-header-admin {
        margin-bottom: 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      
      .page-header-admin h1 {
        font-family: 'Outfit', sans-serif;
        font-size: 2em;
        margin: 0;
        color: #fff;
      }

      .admin-card {
        background: var(--glass);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      }

      /* Mobile Toggle and Overlay */
      .mobile-toggle {
        display: none;
        color: var(--primary);
        font-size: 1.5em;
        cursor: pointer;
        padding: 5px;
        transition: transform 0.3s;
      }
      .mobile-toggle:hover {
        transform: scale(1.1);
      }

      .sidebar-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(4px);
        z-index: 999;
        opacity: 0;
        transition: opacity 0.3s;
      }

      @media (max-width: 992px) {
        .close-sidebar {
          display: block;
        }
        .sidebar {
          left: -260px;
          z-index: 1001;
          box-shadow: 20px 0 50px rgba(0,0,0,0.5);
        }
        .sidebar.active {
          left: 0;
        }
        .sidebar.active ~ .sidebar-overlay {
          display: block;
          opacity: 1;
        }
        .main-content {
          margin-left: 0;
          padding: 20px;
        }
        .mobile-toggle {
          display: block;
        }
        .page-header-admin h1 {
          font-size: 1.5em;
        }
      }

      /* Global Table Styling */
      .table {
        color: var(--text) !important;
        margin-bottom: 0;
      }
      .table>thead>tr>th {
        border-bottom: 2px solid rgba(197, 160, 89, 0.2) !important;
        color: var(--primary);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85em;
        letter-spacing: 1px;
        padding: 15px 10px !important;
      }
      .table>tbody>tr>td {
        border-top: 1px solid rgba(255, 255, 255, 0.05) !important;
        padding: 15px 10px !important;
        vertical-align: middle !important;
      }
      .table>tbody>tr {
        transition: background-color 0.3s;
      }
      .table>tbody>tr:hover {
        background-color: rgba(255, 255, 255, 0.03) !important;
      }

      /* Global Forms & Buttons */
      .btn-admin {
        background: linear-gradient(135deg, var(--primary), #a68444);
        color: #000;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s;
      }
      .btn-admin:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(197, 160, 89, 0.4);
        color: #000;
      }
      
      .form-control {
        background: rgba(0, 0, 0, 0.3) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #fff !important;
        border-radius: 8px;
        padding: 10px 15px;
        height: auto;
      }
      .form-control:focus {
        border-color: var(--primary) !important;
        box-shadow: 0 0 0 2px rgba(197, 160, 89, 0.2) !important;
      }
      
      /* Admin Card Interactive */
      .admin-card {
        transition: transform 0.3s, box-shadow 0.3s;
      }
      .admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.4);
      }

      /* Custom Scrollbar */
      ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
      }
      ::-webkit-scrollbar-track {
        background: var(--main-bg); 
      }
      ::-webkit-scrollbar-thumb {
        background: rgba(197, 160, 89, 0.3); 
        border-radius: 4px;
      }
      ::-webkit-scrollbar-thumb:hover {
        background: rgba(197, 160, 89, 0.6); 
      }
    </style>
  </head>
  <body>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="adminSidebar">
      <div class="sidebar-header">
        <span class="close-sidebar" onclick="toggleSidebar()">&times;</span>
        <img src="../logo/logo2.png" alt="Logo">
        <div style="color:var(--primary); font-size: 0.8em; font-weight: 700; letter-spacing: 2px;">ADMIN PANEL</div>
      </div>
      
      <ul class="nav nav-sidebar">
        <?php $opt = $_GET['option'] ?? ''; ?>
        <li class="<?php echo ($opt == '') ? 'active' : ''; ?>">
          <a href="dashboard.php"><i class="fa fa-dashboard"></i> Overview</a>
        </li>
        <li class="<?php echo ($opt == 'rooms' || $opt == 'add_rooms' || $opt == 'update_room') ? 'active' : ''; ?>">
          <a href="dashboard.php?option=rooms"><i class="fa fa-bed"></i> Manage Rooms</a>
        </li>
        <li class="<?php echo ($opt == 'booking_details') ? 'active' : ''; ?>">
          <a href="dashboard.php?option=booking_details"><i class="fa fa-calendar-check-o"></i> Bookings</a>
        </li>
        <li class="<?php echo ($opt == 'user_registration') ? 'active' : ''; ?>">
          <a href="dashboard.php?option=user_registration"><i class="fa fa-users"></i> Registered Users</a>
        </li>
        <li class="<?php echo ($opt == 'feedback') ? 'active' : ''; ?>">
          <a href="dashboard.php?option=feedback"><i class="fa fa-comments"></i> Feedback</a>
        </li>
        <li class="<?php echo ($opt == 'slider' || $opt == 'add_slider' || $opt == 'update_slider') ? 'active' : ''; ?>">
          <a href="dashboard.php?option=slider"><i class="fa fa-image"></i> Slider Settings</a>
        </li>
        <li class="<?php echo ($opt == 'update_password') ? 'active' : ''; ?>">
          <a href="dashboard.php?option=update_password"><i class="fa fa-lock"></i> Security</a>
        </li>
      </ul>
      
      <div style="position: absolute; bottom: 20px; width: 100%; padding: 0 25px;">
        <a href="logout.php" class="btn btn-danger btn-block" style="border-radius: 10px; background: rgba(220, 53, 69, 0.15); border: 1px solid rgba(220, 53, 69, 0.3); color: #ff6b7a;">
          <i class="fa fa-sign-out"></i> Logout
        </a>
      </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <div class="page-header-admin">
        <div style="display:flex; align-items:center; gap:15px;">
          <span class="mobile-toggle" onclick="toggleSidebar()"><i class="fa fa-bars"></i></span>
          <h1><?php 
            if($opt=="") echo "Overview";
            else if($opt=="rooms") echo "Manage Rooms";
            else if($opt=="booking_details") echo "Bookings";
            else if($opt=="user_registration") echo "Registered Users";
            else if($opt=="feedback") echo "Feedback";
            else if($opt=="slider") echo "Slider Settings";
            else if($opt=="update_password") echo "Security Settings";
            else if($opt=="admin_profile") echo "Admin Profile";
            else echo ucfirst(str_replace('_', ' ', $opt));
          ?></h1>
        </div>
        
        <div class="admin-user-info" style="display:flex; align-items:center; gap:15px;">
          <div style="text-align:right">
            <div style="font-weight:700; color:#fff;"><?php echo $admin; ?></div>
            <div style="font-size:0.75em; color:var(--primary);">Super Admin</div>
          </div>
          <a href="dashboard.php?option=admin_profile" style="color: var(--primary); font-size: 2.5em; line-height: 1;">
            <i class="fa fa-user-circle"></i>
          </a>
        </div>
      </div>

      <div class="admin-card">
        <?php 
        if($opt=="") include('reports.php');	
        else if($opt=="feedback") include('feedback.php');	
        else if($opt=="slider") include('slider.php');	
        else if($opt=="update_slider") include('update_slider.php');	
        else if($opt=="add_slider") include('add_slider.php');	
        else if($opt=="update_password") include('update_password.php');	
        else if($opt=="rooms") include('rooms.php');	
        else if($opt=="add_rooms") include('add_rooms.php');	
        else if($opt=="delete_room") include('delete_room.php');	
        else if($opt=="update_room") include('update_room.php');
        else if($opt=="booking_details") include('booking_details.php');
        else if($opt=="user_registration") include('user_registration.php');
        else if($opt=="admin_profile") include('admin_profile.php');
        ?>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script>
      function toggleSidebar() {
        document.getElementById('adminSidebar').classList.toggle('active');
      }
    </script>
  </body>
</html>

