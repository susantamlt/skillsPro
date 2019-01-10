<?php include 'header.php';
	$rs_exam=q("SELECT a.*,b.course_name FROM dt_online_test a INNER JOIN dt_courses b ON a.`course_id`=b.`course_id` AND b.created_id='".$_SESSION['partner_id']."'");


?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List of Exam/Practice Exam</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Exam Name</th>
								<th>Course Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_exam=f($rs_exam)){?>
							  <tr>
								<th scope="row"><?php echo $i;?></th>
								<td><?php echo $f_exam['online_test_name'];?></td>
								<td><?php echo $f_exam['course_name'];?></td>
								<td><?php echo $f_exam['start_date'];?></td>
								<td><?php echo $f_exam['end_date'];?></td>
								<td><a href="add_exam.php?mode=edit&online_test_id=<?php echo $f_exam['online_test_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="list_exam.php?mode=delete&online_test_id=<?php echo $f_exam['online_test_id'];?>">Delete</a></td>
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
<?php include '../phpjs/admin/center_js.php';?>	  

