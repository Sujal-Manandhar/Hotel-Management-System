<?php 
if(isset($update))
{
	$imgNew=$_FILES['img']['name'];
	$sql="insert into slider values('','$imgNew','$cap')";	
	if(mysqli_query($con,$sql))
	{
	    move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".$_FILES['img']['name']);	
	    echo "<div class='alert alert-success' style='background:rgba(93,255,143,0.1); border:1px solid rgba(93,255,143,0.2); color:#5dff8f; border-radius:12px;'>Success: Slider image added successfully. Redirecting...</div>";
        echo "<script>setTimeout(function(){ window.location.href='dashboard.php?option=slider'; }, 1500);</script>";
	}
}
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="admin-card">
            <h3 style="margin-top:0; color:var(--primary); margin-bottom:30px;">
                <i class="fa fa-image"></i> Add New Slider Image
            </h3>
            
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label><i class="fa fa-commenting-o"></i> Slider Caption</label>
                    <input type="text" name="cap" class="form-control" placeholder="e.g. Welcome to Crown Hotel" required>
                </div>

                <div class="form-group" style="margin-top:20px;">
                    <label><i class="fa fa-file-image-o"></i> Upload Image Asset</label>
                    <div style="background: rgba(255,255,255,0.02); border: 2px dashed rgba(197, 160, 89, 0.2); border-radius: 12px; padding: 30px; text-align: center;">
                        <input type="file" name="img" style="display:none;" id="sliderImg" accept="image/*" required onchange="document.getElementById('fileName').innerHTML = this.files[0].name">
                        <label for="sliderImg" style="cursor:pointer; margin:0;">
                            <i class="fa fa-cloud-upload" style="font-size: 3em; color: var(--primary); display: block; margin-bottom: 10px;"></i>
                            <span id="fileName" style="color: #fff; font-weight: 600;">Choose Slider Image</span>
                            <div style="font-size: 0.8em; color: var(--text-secondary); font-weight: 400; margin-top: 5px;">Best resolution: 1920x800px</div>
                        </label>
                    </div>
                </div>

                <div style="margin-top: 35px; display: flex; gap: 15px;">
                    <button type="submit" name="update" class="btn btn-admin" style="flex: 1;">
                        <i class="fa fa-upload"></i> Upload Slider
                    </button>
                    <a href="dashboard.php?option=slider" class="btn btn-admin" style="background: transparent; color: #fff; border: 1px solid rgba(255,255,255,0.1);">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>