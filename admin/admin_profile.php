<?php 
$sql=mysqli_query($con,"select * from admin");
while($res=mysqli_fetch_assoc($sql))
{
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="admin-card text-center">
            <div style="position: relative; display: inline-block; margin-bottom: 30px;">
                <img src="../image/clipart/user.png" style="width:150px; height:150px; border: 4px solid var(--primary); padding: 5px; border-radius: 50%;">
                <div style="position: absolute; bottom: 5px; right: 5px; background: var(--primary); width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #000; border: 3px solid var(--sidebar-bg);">
                    <i class="fa fa-check"></i>
                </div>
            </div>
            
            <h2 style="color: #fff; margin-bottom: 5px;"><?php echo $res['username']; ?></h2>
            <p style="color: var(--primary); font-weight: 600; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85em; margin-bottom: 30px;">System Administrator</p>
            
            <div style="text-align: left;">
                <div class="form-group">
                    <label>Admin Username</label>
                    <div class="form-control" style="display: flex; align-items: center; background: rgba(255,255,255,0.02) !important;">
                        <i class="fa fa-user" style="margin-right: 15px; color: var(--text-secondary);"></i>
                        <?php echo $res['username']; ?>
                    </div>
                </div>
                
                <div class="form-group" style="margin-top: 20px;">
                    <label>Access Level</label>
                    <div class="form-control" style="display: flex; align-items: center; background: rgba(255,255,255,0.02) !important;">
                        <i class="fa fa-shield" style="margin-right: 15px; color: var(--text-secondary);"></i>
                        Full Superuser Privileges
                    </div>
                </div>

                <div style="margin-top: 35px;">
                    <a href="dashboard.php?option=update_password" class="btn btn-admin btn-block">
                        <i class="fa fa-key"></i> Change Security Password
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 	
}
?>