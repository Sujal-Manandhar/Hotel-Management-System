<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h3 style="margin: 0; color: var(--primary);">Registered Guest Accounts</h3>
    <div style="font-size: 0.9em; opacity: 0.6;">Total Users: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM create_account")); ?></div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Guest Name</th>
                <th>Email / Login</th>
                <th>Mobile</th>
                <th>Location</th>
                <th>Gender</th>
                <th class="text-right">Account Level</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from create_account ORDER BY id DESC");
        while($res=mysqli_fetch_assoc($sql))
        {
        ?>
        <tr>
            <td><span style="opacity: 0.5; font-size: 0.85em;"><?php echo $i++; ?></span></td>
            <td><strong style="color:#fff"><?php echo $res['name']; ?></strong></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['mobile']; ?></td>
            <td><?php echo $res['country']; ?></td>
            <td><span style="text-transform: capitalize;"><?php echo $res['gender']; ?></span></td>
            <td class="text-right">
                <span class="label label-info" style="background: rgba(0, 210, 255, 0.1); color: #00d2ff; border: 1px solid rgba(0, 210, 255, 0.2); border-radius: 6px;">Verified Guest</span>
            </td>
        </tr>	
        <?php 	
        }
        ?>	
        </tbody>
    </table>
</div>