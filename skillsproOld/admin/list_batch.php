<?php include 'header.php';
	$rs_batch=q("SELECT a.*,b.center_name,c.course_name FROM dt_batch a INNER JOIN dt_centers b ON a.center_id=b.center_id INNER JOIN dt_courses c ON a.course_id=c.course_id WHERE a.partner_id='".$_SESSION['partner_id']."' ");



?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Batches</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="alert alert-success" style="display:none" id="success" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
				<div class="alert alert-danger" id="error" style="display:none" role="alert">
					<strong>Well done!</strong> You successfully read this important alert message.
				</div>
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Center Name</th>
								<th>Course Name</th>
								<th>Batch Code</th>
								<th>Batch Type</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_batch=f($rs_batch)){?>
							  <tr id="row_id_<?php echo $i;?>">
								<td scope="row" ><?php echo $i;?></td>
								<td><?php echo $f_batch['center_name'];?></td>
								<td><?php echo $f_batch['course_name'];?></td>
								<td><?php echo $f_batch['batch_code'];?></td>
								<td><?php 
								if($f_batch['batch_type']=='MOR')
									echo 'Morning';
								if($f_batch['batch_type']=='AFT')
									echo 'Afternoon';
								if($f_batch['batch_type']=='EVE')
									echo 'Evening';
								if($f_batch['batch_type']=='NIG')
									echo 'Night';
								if($f_batch['batch_type']=='WEEK')
									echo 'Weekend';
								?></td>
								<td><a href="add_batch.php?mode=edit&batch_id=<?php echo $f_batch['batch_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="javascript:void(0)" data-row_id="<?php echo $i;?>" onclick="delete_partner_batch(this,<?php echo $f_batch['batch_id'];?>)">Delete</a>&nbsp;|&nbsp; <a href="add_students_to_batch.php?batch_id=<?php echo $f_batch['batch_id'];?>;?>&course_id=<?php echo $f_batch['course_id'];?>" >Add Students to Batch</a></td>
							  </tr>
							  <?php 
							  $i++;
							  } ?>
							</tbody>
						  </table>
						</div>
			</div>	
		</div>
	  </div>
	  <button name="btn_force_modal" data-toggle="modal" data-target="#myModal" style="display:none"></button>
	  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
  	<input type="text" name="batch_id" id="batch_id" value="">
  	<input type="text" name="course_id" id="course_id" value="">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/batch_js.php';?>	  

