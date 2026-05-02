<?php 
if(isset($add))
{
	$sql=mysqli_query($con,"select * from rooms where room_no='$rno'");
	if(mysqli_num_rows($sql))
	{
	    echo "<div class='alert alert-danger' style='background:rgba(220,53,69,0.1); border:1px solid rgba(220,53,69,0.2); color:#ff6b7a; border-radius:12px;'>Error: This room number already exists in the system.</div>";	
	}		
	else
	{	
	    $img=$_FILES['img']['name'];
	    mysqli_query($con,"insert into rooms values('','$rno','$type','$price','$details','$img')");	
	    move_uploaded_file($_FILES['img']['tmp_name'],"../image/rooms/".$_FILES['img']['name']);
	    echo "<div class='alert alert-success' style='background:rgba(93,255,143,0.1); border:1px solid rgba(93,255,143,0.2); color:#5dff8f; border-radius:12px;'>Success: New room has been added to inventory.</div>";
	}
}
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="admin-card">
            <h3 style="margin-top:0; color:var(--primary); margin-bottom:30px;">
                <i class="fa fa-plus-circle"></i> Add New Room to Inventory
            </h3>
            
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fa fa-tag"></i> Room Number</label>
                            <input type="text" name="rno" class="form-control" placeholder="e.g. 101" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i class="fa fa-bed"></i> Room Type</label>
                            <input type="text" name="type" class="form-control" placeholder="e.g. Deluxe Room" required>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label><i class="fa fa-money"></i> Price per Night ($)</label>
                    <input type="number" name="price" class="form-control" placeholder="e.g. 250" required>
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label><i class="fa fa-info-circle"></i> Room Specifications & Details</label>
                    <textarea name="details" class="form-control" rows="4" placeholder="Describe the room amenities, view, bed type, etc." required></textarea>
                </div>

                <div class="form-group" style="margin-top:15px;">
                    <label><i class="fa fa-image"></i> Room Presentation Image</label>
                    <div style="background: rgba(255,255,255,0.02); border: 2px dashed rgba(197, 160, 89, 0.2); border-radius: 12px; padding: 20px; text-align: center;">
                        <input type="file" name="img" style="display:none;" id="roomImg" required onchange="document.getElementById('fileName').innerHTML = this.files[0].name">
                        <label for="roomImg" style="cursor:pointer; margin:0;">
                            <i class="fa fa-cloud-upload" style="font-size: 2em; color: var(--primary); display: block; margin-bottom: 10px;"></i>
                            <span id="fileName">Click to upload room photo</span>
                            <div style="font-size: 0.8em; color: var(--text-secondary); font-weight: 400; margin-top: 5px;">Recommended size: 800x600px (JPG/PNG)</div>
                        </label>
                    </div>
                </div>

                <div style="margin-top: 35px; display: flex; gap: 15px;">
                    <button type="submit" name="add" class="btn btn-admin" style="flex: 1;">
                        <i class="fa fa-check"></i> Save Room to System
                    </button>
                    <a href="dashboard.php?option=rooms" class="btn btn-admin" style="background: transparent; color: #fff; border: 1px solid rgba(255,255,255,0.1);">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>