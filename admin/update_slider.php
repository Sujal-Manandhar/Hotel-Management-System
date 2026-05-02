<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from slider where id='$id' ");
$res=mysqli_fetch_assoc($sql);
$img=$res['image'];
$path="../image/Slider/$img";

if(isset($_POST['update']))
{
    extract($_POST);
    $imgNew=$_FILES['img']['name'];
    if($imgNew=="")
    {
        $sql="update slider set caption='$cap' where id='$id' ";	
    }
    else
    {
        $sql="update slider set caption='$cap',image='$imgNew' where id='$id' ";	
        //delete old image
        if(file_exists($path)) unlink($path);
        move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".$_FILES['img']['name']);
    }
    if(mysqli_query($con,$sql))
    {
        echo "<div class='alert alert-success' style='background:rgba(93,255,143,0.1); border:1px solid rgba(93,255,143,0.2); color:#5dff8f; border-radius:12px; margin-bottom:25px;'>Success: Slider updated. Redirecting...</div>";
        echo "<script>setTimeout(function(){ window.location.href='dashboard.php?option=slider'; }, 1500);</script>";
    }
}
?>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="admin-card">
            <h3 style="margin-top:0; color:var(--primary); margin-bottom:30px;">
                <i class="fa fa-pencil"></i> Edit Slider Asset
            </h3>
            
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label><i class="fa fa-commenting-o"></i> Slider Caption</label>
                    <input type="text" name="cap" value="<?php echo $res['caption']; ?>" class="form-control" required>
                </div>

                <div class="form-group" style="margin-top:25px;">
                    <label><i class="fa fa-image"></i> Current Asset Preview</label>
                    <div style="margin-bottom:15px;">
                        <img src="<?php echo $path; ?>" style="width:100%; height:150px; object-fit: cover; border-radius:12px; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                    </div>
                </div>

                <div class="form-group">
                    <label><i class="fa fa-refresh"></i> Replace Image (Optional)</label>
                    <div style="background: rgba(255,255,255,0.02); border: 1px dashed rgba(197, 160, 89, 0.2); border-radius: 12px; padding: 20px; text-align: center;">
                        <input type="file" name="img" style="display:none;" id="sliderImg" accept="image/*" onchange="document.getElementById('fileName').innerHTML = this.files[0].name">
                        <label for="sliderImg" style="cursor:pointer; margin:0;">
                            <i class="fa fa-cloud-upload" style="font-size: 2em; color: var(--primary); display: block; margin-bottom: 5px;"></i>
                            <span id="fileName" style="color: #fff; font-size: 0.9em;">Click to upload replacement</span>
                        </label>
                    </div>
                </div>

                <div style="margin-top: 35px; display: flex; gap: 15px;">
                    <button type="submit" name="update" class="btn btn-admin" style="flex: 1;">
                        <i class="fa fa-save"></i> Save Changes
                    </button>
                    <a href="dashboard.php?option=slider" class="btn btn-admin" style="background: transparent; color: #fff; border: 1px solid rgba(255,255,255,0.1);">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>