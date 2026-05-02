<script>
	function delFeedback(id)
	{
		if(confirm("Are you sure you want to delete this Feedback? This action cannot be undone."))
		{
		    window.location.href='delete_feedback.php?id='+id;	
		}
	}
</script>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h3 style="margin: 0; color: var(--primary);">Guest Feedbacks</h3>
    <div style="font-size: 0.9em; opacity: 0.6;">Total Records: <?php echo mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedback")); ?></div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Guest Name</th>
                <th>Email Address</th>
                <th>Mobile</th>
                <th>Message</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=1;
        $sql=mysqli_query($con,"select * from feedback ORDER BY id DESC");
        while($res=mysqli_fetch_assoc($sql))
        {
        $id=$res['id'];	
        ?>
        <tr>
            <td><span style="opacity: 0.5; font-size: 0.85em;"><?php echo $i++; ?></span></td>
            <td><strong style="color:#fff"><?php echo $res['name']; ?></strong></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['mobile']; ?></td>
            <td style="max-width: 300px; white-space: normal; font-size: 0.9em; line-height: 1.5;"><?php echo $res['message']; ?></td>
            <td class="text-right">
                <a href="javascript:void(0)" onclick="delFeedback('<?php echo $id; ?>')" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.1); color: #ff6b7a; border: 1px solid rgba(220, 53, 69, 0.2); border-radius: 8px;" title="Delete Feedback">
                    <i class="fa fa-trash-o"></i> Delete
                </a>
            </td>
        </tr>	
        <?php 	
        }
        ?>	
        </tbody>
    </table>
</div>