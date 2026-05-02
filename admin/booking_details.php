<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h3 style="margin: 0; color: var(--primary);">Reservation Log</h3>
    <div style="font-size: 0.9em; opacity: 0.6;">Active Bookings: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM room_booking_details")); ?></div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Guest Details</th>
                <th>Room Info</th>
                <th>Check In/Out</th>
                <th>Occupancy</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from room_booking_details ORDER BY id DESC");
        while($res=mysqli_fetch_assoc($sql))
        {
        $oid=$res['id'];
        ?>
        <tr>
            <td><span style="opacity: 0.5; font-size: 0.85em;"><?php echo $i++; ?></span></td>
            <td>
                <div style="font-weight: 700; color: #fff;"><?php echo $res['name']; ?></div>
                <div style="font-size: 0.8em; color: var(--text-secondary);"><?php echo $res['email']; ?></div>
                <div style="font-size: 0.8em; color: var(--text-secondary);"><?php echo $res['phone']; ?></div>
            </td>
            <td>
                <span class="label" style="background: rgba(197, 160, 89, 0.1); color: var(--primary); border: 1px solid rgba(197, 160, 89, 0.2);">
                    <?php echo $res['room_type']; ?>
                </span>
            </td>
            <td>
                <div style="font-size: 0.9em; color: #fff;"><i class="fa fa-sign-in" style="color: #5dff8f;"></i> <?php echo $res['check_in_date']; ?></div>
                <div style="font-size: 0.9em; color: #fff;"><i class="fa fa-sign-out" style="color: #ff6b7a;"></i> <?php echo $res['check_out_date']; ?></div>
            </td>
            <td>
                <?php 
                $status = isset($res['status']) ? $res['status'] : 'Pending';
                if($status == 'Accepted') {
                    echo '<span class="label" style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: 1px solid rgba(40, 167, 69, 0.2);">Accepted</span>';
                } else if($status == 'Canceled') {
                    echo '<span class="label" style="background: rgba(220, 53, 69, 0.1); color: #ff6b7a; border: 1px solid rgba(220, 53, 69, 0.2);">Canceled</span>';
                } else {
                    echo '<span class="label" style="background: rgba(255, 193, 7, 0.1); color: #ffc107; border: 1px solid rgba(255, 193, 7, 0.2);">Pending</span>';
                }
                ?>
                <div style="font-size: 0.85em; color: var(--text-secondary); margin-top: 5px;">Occ: <?php echo $res['Occupancy']; ?></div>
            </td>
            <td class="text-right">
                <div style="display: flex; justify-content: flex-end; gap: 5px;">
                    <?php if($status == 'Pending') { ?>
                    <a href="accept_order.php?booking_id=<?php echo $oid; ?>" class="btn btn-sm" style="background: rgba(40, 167, 69, 0.1); color: #28a745; border: 1px solid rgba(40, 167, 69, 0.2); border-radius: 8px;">
                        <i class="fa fa-check"></i> Accept
                    </a>
                    <?php } ?>
                    
                    <?php if($status != 'Canceled') { ?>
                    <a href="cancel_order.php?booking_id=<?php echo $oid; ?>" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.1); color: #ff6b7a; border: 1px solid rgba(220, 53, 69, 0.2); border-radius: 8px;">
                        <i class="fa fa-times"></i> Cancel
                    </a>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <?php 	
        }
        ?>	
        </tbody>
    </table>
</div>