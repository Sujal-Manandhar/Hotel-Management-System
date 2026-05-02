<script>
	function delRoom(id)
	{
		if(confirm("Are you sure you want to delete this room? This action cannot be undone."))
		{
		    window.location.href='delete_room.php?id='+id;	
		}
	}
</script>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
    <h3 style="margin: 0; color: var(--primary);">Inventory Management</h3>
    <a href="dashboard.php?option=add_rooms" class="btn btn-admin">
        <i class="fa fa-plus"></i> Add New Room
    </a>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Preview</th>
                <th>Room No</th>
                <th>Type</th>
                <th>Price / Night</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from rooms");
        while($res=mysqli_fetch_assoc($sql))
        {
        $id=$res['room_id'];	
        $img=$res['image'];
        $path="../image/rooms/$img";
        ?>
        <tr>
            <td><span style="opacity: 0.5; font-size: 0.85em;"><?php echo $i++; ?></span></td>
            <td>
                <img src="<?php echo $path;?>" style="width:60px; height:45px; border-radius:8px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
            </td>
            <td><strong style="color:#fff"><?php echo $res['room_no']; ?></strong></td>
            <td><span class="label" style="background: rgba(197, 160, 89, 0.1); color: var(--primary); border: 1px solid rgba(197, 160, 89, 0.2);"><?php echo $res['type']; ?></span></td>
            <td><strong style="color:var(--primary)">$<?php echo $res['price']; ?></strong></td>
            <td>
                <div style="display:flex; gap:8px;">
                    <a href="dashboard.php?option=update_room&id=<?php echo $id; ?>" class="btn btn-sm" style="background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px;" title="Edit Room">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="javascript:void(0)" onclick="delRoom('<?php echo $id; ?>')" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.1); color: #ff6b7a; border: 1px solid rgba(220, 53, 69, 0.2); border-radius: 8px;" title="Delete Room">
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