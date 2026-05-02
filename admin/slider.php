<script>
	function delSlider(id)
	{
		if(confirm("Are you sure you want to delete this slider image? This action cannot be undone."))
		{
		    window.location.href='delete_slider.php?id='+id;	
		}
	}
</script>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h3 style="margin: 0; color: var(--primary);">Homepage Slider Settings</h3>
    <a href="dashboard.php?option=add_slider" class="btn btn-admin">
        <i class="fa fa-plus"></i> Add New Image
    </a>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Slider Preview</th>
                <th>Caption Text</th>
                <th class="text-right">Actions Management</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from slider");
        while($res=mysqli_fetch_assoc($sql))
        {
        $id=$res['id'];	
        $img=$res['image'];
        $path="../image/Slider/$img";
        ?>
        <tr>
            <td><span style="opacity: 0.5; font-size: 0.85em;"><?php echo $i++; ?></span></td>
            <td>
                <img src="<?php echo $path;?>" style="width:120px; height:60px; border-radius:10px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
            </td>
            <td>
                <?php if($res['caption']) { ?>
                    <span style="color:#fff; font-size: 0.95em;"><?php echo $res['caption']; ?></span>
                <?php } else { ?>
                    <span style="opacity: 0.3; font-style: italic;">No caption provided</span>
                <?php } ?>
            </td>
            <td class="text-right">
                <div style="display:flex; gap:8px; justify-content: flex-end;">
                    <a href="dashboard.php?option=update_slider&id=<?php echo $id; ?>" class="btn btn-sm" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;" title="Edit Slider">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="javascript:void(0)" onclick="delSlider('<?php echo $id; ?>')" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.1); color: #ff6b7a; border: 1px solid rgba(220, 53, 69, 0.2); border-radius: 8px;" title="Delete Slider">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </div>
            </td>
        </tr>	
        <?php 	
        }
        ?>	
        </tbody>
    </table>
</div>