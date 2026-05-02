<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from rooms where room_id='$id'");
$res=mysqli_fetch_assoc($sql);

if(isset($_POST['update']))
{
    extract($_POST);
    mysqli_query($con,"update rooms set room_no='$rno',type='$type',price='$price',details='$details' where room_id='$id' ");
    echo "<div class='alert alert-success' style='background:rgba(93,255,143,0.1); border:1px solid rgba(93,255,143,0.2); color:#5dff8f; border-radius:12px; margin-bottom:25px;'>Success: Room details have been updated. Redirecting...</div>";
    echo "<script>setTimeout(function(){ window.location.href='dashboard.php?option=rooms'; }, 1500);</script>";
}
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="admin-card">
            <h3 style="margin-top:0; color:var(--primary); margin-bottom:30px;">
                <i class="fa fa-pencil-square-o"></i> Edit Room Configuration
            </h3>
            
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fa fa-tag"></i> Room Number</label>
                            <input type="text" name="rno" value="<?php echo $res['room_no']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fa fa-bed"></i> Room Type</label>
                            <input type="text" name="type" value="<?php echo $res['type']; ?>" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label><i class="fa fa-money"></i> Price per Night ($)</label>
                    <input type="number" name="price" value="<?php echo $res['price']; ?>" class="form-control" required>
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label><i class="fa fa-info-circle"></i> Room Specifications & Details</label>
                    <textarea name="details" class="form-control" rows="6" required><?php echo $res['details']; ?></textarea>
                </div>

                <div style="margin-top: 35px; display: flex; gap: 15px;">
                    <button type="submit" name="update" class="btn btn-admin" style="flex: 1;">
                        <i class="fa fa-save"></i> Apply Changes
                    </button>
                    <a href="dashboard.php?option=rooms" class="btn btn-admin" style="background: transparent; color: #fff; border: 1px solid rgba(255,255,255,0.1);">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>