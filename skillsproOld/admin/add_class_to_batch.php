<?php include 'header.php';
    $class_id=$_GET['class_id'];
    $f_course=f(q("SELECT course_id FROM dt_class WHERE class_id='$class_id' "));
    $rs_batch=q("SELECT a.*,b.course_name FROM dt_batch a INNER JOIN dt_courses c ON a.course_id=b.course_id  WHERE a.course_id='$course_id' AND is_active='Y'");     
    


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">Assign Class to a Batch</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<input type="hidden" name="class_id" id="class_id" value="<?php echo $class_id;?>">

				<div><button class="btn-success btn" id="btn_assign_batch" style="width:50%;">Assign</button></div>
				<div class="table-responsive">
						
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th><input type="checkbox" name="select_all_batch" id="select_all_batch"></th>
								<th>Batch Code</th>
								<th>Course</th>
								
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_batches=f($rs_batch)){?>
							  <tr>
								<th scope="row"><input type="checkbox" name="batch_<?php echo $f_batches['batch_id'];?>" id="batch_<?php echo $f_batches['batch_id'];?>" class="chk_batch" value="<?php echo $f_batches['batch_id'];?>"></th>
								<td><?php echo $f_batches['batch_code'];?></td>
								<td><?php echo $f_batches['course_name'];?></td>
								
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
	  
<?php include 'footer.php';?>
<?php include '../phpjs/partners/class_js.php';?>	  

