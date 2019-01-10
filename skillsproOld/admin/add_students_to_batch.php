<?php include 'header.php';
    $course_id=$_GET['course_id'];
    $batch_id=$_GET['batch_id'];
	$rs_students=q("SELECT b.* FROM dt_student_course a INNER JOIN dt_students b ON a.student_id=b.student_id  WHERE course_id='$course_id' and b.student_id NOT IN ( select student_id from dt_course_batch_student where course_id='$course_id')");



?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">Assign Students to a Batch</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<input type="hidden" name="batch_id" id="batch_id" value="<?php echo $batch_id;?>">
				<input type="hidden" name="course_id" id="course_id" value="<?php echo $course_id;?>">
				<div><button class="btn-success btn" id="btn_assign" style="width:50%;">Assign</button></div>
				<div class="table-responsive">
						
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th><input type="checkbox" name="select_all" id="select_all"></th>
								<th>Student Name</th>
								<th>Student Email</th>
								
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_students=f($rs_students)){?>
							  <tr>
								<th scope="row"><input type="checkbox" name="student_<?php echo $f_students['student_id'];?>" id="student_<?php echo $f_students['student_id'];?>" class="chk_student" value="<?php echo $f_students['student_id'];?>"></th>
								<td><?php echo $f_students['student_first_name'].' '.$f_students['student_last_name'];?></td>
								<td><?php echo $f_students['student_email'];?></td>
								
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
<?php include '../phpjs/partners/batch_js.php';?>	  

