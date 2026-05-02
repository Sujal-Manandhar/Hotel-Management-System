<?php 
if(isset($update))
{
    $sql=mysqli_query($con,"select * from admin where username='$admin' and password='$op' ");
	if(mysqli_num_rows($sql))
	{
		if($np==$cp)
		{
		    mysqli_query($con,"update admin set password='$np' where username='$admin' ");	
		    echo "<div class='alert alert-success' style='background:rgba(93,255,143,0.1); border:1px solid rgba(93,255,143,0.2); color:#5dff8f; border-radius:12px; margin-bottom:25px;'><i class='fa fa-check-circle'></i> Success: Password updated successfully. Your new credentials are active.</div>";
		}
		else
		{
			echo "<div class='alert alert-danger' style='background:rgba(220,53,69,0.1); border:1px solid rgba(220,53,69,0.2); color:#ff6b7a; border-radius:12px; margin-bottom:25px;'><i class='fa fa-exclamation-triangle'></i> Error: New and confirmation passwords do not match.</div>";
		}
	}
	else
	{
	    echo "<div class='alert alert-danger' style='background:rgba(220,53,69,0.1); border:1px solid rgba(220,53,69,0.2); color:#ff6b7a; border-radius:12px; margin-bottom:25px;'><i class='fa fa-times-circle'></i> Error: The old password you entered is incorrect.</div>";	
	}
}
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="admin-card">
            <h3 style="margin-top:0; color:var(--primary); margin-bottom:30px;">
                <i class="fa fa-shield"></i> Security Management
            </h3>
            
            <form method="post">
                <div class="form-group">
                    <label style="color: var(--text-secondary); font-size: 0.85em; text-transform: uppercase; letter-spacing: 1px;">Current Password</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 15px; top: 12px; color: var(--primary);"><i class="fa fa-lock"></i></span>
                        <input type="password" name="op" class="form-control" placeholder="Verification required" style="padding-left: 45px;" required>
                    </div>
                </div>

                <hr style="border-color: rgba(255,255,255,0.05); margin: 25px 0;">

                <div class="form-group">
                    <label style="color: var(--text-secondary); font-size: 0.85em; text-transform: uppercase; letter-spacing: 1px;">New Password</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 15px; top: 12px; color: var(--primary);"><i class="fa fa-key"></i></span>
                        <input type="password" name="np" class="form-control" placeholder="Create strong password" style="padding-left: 45px;" required>
                    </div>
                </div>

                <div class="form-group" style="margin-top:20px;">
                    <label style="color: var(--text-secondary); font-size: 0.85em; text-transform: uppercase; letter-spacing: 1px;">Confirm New Password</label>
                    <div style="position: relative;">
                        <span style="position: absolute; left: 15px; top: 12px; color: var(--primary);"><i class="fa fa-check-square-o"></i></span>
                        <input type="password" name="cp" class="form-control" placeholder="Repeat for confirmation" style="padding-left: 45px;" required>
                    </div>
                </div>

                <div style="margin-top: 35px;">
                    <button type="submit" name="update" class="btn btn-admin btn-block">
                        <i class="fa fa-refresh"></i> Update System Password
                    </button>
                    <p style="text-align: center; font-size: 0.8em; color: var(--text-secondary); margin-top: 15px;">
                        <i class="fa fa-info-circle"></i> For security, you may be required to log in again after changing your password.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>