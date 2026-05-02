<?php 
// Fetch stats
$room_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM rooms"));
$booking_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM room_booking_details"));
$user_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM create_account"));
$feedback_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedback"));
?>

<div class="row" style="margin-bottom: 30px;">
    <div class="col-md-3 col-sm-6">
        <div class="admin-card text-center" style="border-left: 4px solid var(--primary);">
            <i class="fa fa-bed" style="font-size: 2.5em; color: var(--primary); margin-bottom: 15px;"></i>
            <h2 style="margin: 5px 0;"><?php echo $room_count; ?></h2>
            <p style="color: var(--text-secondary); text-transform: uppercase; font-size: 0.8em; letter-spacing: 1px;">Total Rooms</p>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="admin-card text-center" style="border-left: 4px solid #5dff8f;">
            <i class="fa fa-calendar-check-o" style="font-size: 2.5em; color: #5dff8f; margin-bottom: 15px;"></i>
            <h2 style="margin: 5px 0;"><?php echo $booking_count; ?></h2>
            <p style="color: var(--text-secondary); text-transform: uppercase; font-size: 0.8em; letter-spacing: 1px;">Total Bookings</p>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="admin-card text-center" style="border-left: 4px solid #00d2ff;">
            <i class="fa fa-users" style="font-size: 2.5em; color: #00d2ff; margin-bottom: 15px;"></i>
            <h2 style="margin: 5px 0;"><?php echo $user_count; ?></h2>
            <p style="color: var(--text-secondary); text-transform: uppercase; font-size: 0.8em; letter-spacing: 1px;">Registered Users</p>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="admin-card text-center" style="border-left: 4px solid #ff6b7a;">
            <i class="fa fa-comments" style="font-size: 2.5em; color: #ff6b7a; margin-bottom: 15px;"></i>
            <h2 style="margin: 5px 0;"><?php echo $feedback_count; ?></h2>
            <p style="color: var(--text-secondary); text-transform: uppercase; font-size: 0.8em; letter-spacing: 1px;">Feedbacks</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="admin-card">
            <h3 style="margin-top: 0; color: var(--primary); margin-bottom: 20px;">Recent Bookings</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Guest</th>
                            <th>Room Type</th>
                            <th>Check In</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $recent = mysqli_query($con, "SELECT * FROM room_booking_details ORDER BY id DESC LIMIT 5");
                        while($rb = mysqli_fetch_assoc($recent)) {
                        ?>
                        <tr>
                            <td><?php echo $rb['name']; ?></td>
                            <td><?php echo $rb['room_type']; ?></td>
                            <td><?php echo $rb['check_in_date']; ?></td>
                            <td><span class="label label-success" style="background: rgba(93, 255, 143, 0.1); color: #5dff8f; border: 1px solid rgba(93, 255, 143, 0.2);">Confirmed</span></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="admin-card">
            <h3 style="margin-top: 0; color: var(--primary); margin-bottom: 20px;">Quick Actions</h3>
            <div style="display: flex; flex-direction: column; gap: 10px;">
                <a href="dashboard.php?option=add_rooms" class="btn btn-admin"><i class="fa fa-plus"></i> Add New Room</a>
                <a href="dashboard.php?option=add_slider" class="btn btn-admin" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1);"><i class="fa fa-image"></i> Update Slider</a>
                <a href="../index.php" target="_blank" class="btn btn-admin" style="background: transparent; color: var(--primary); border: 1px solid var(--primary);"><i class="fa fa-external-link"></i> View Website</a>
            </div>
        </div>
    </div>
</div>