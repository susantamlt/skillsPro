<?php include 'header.php';
	$student_id=$_REQUEST['student_id'];
	$rs_student=q("SELECT * FROm dt_students WHERE partner_id='".$_SESSION['partner_id']."' ");

	if($_REQUEST['mode']=='delete'){
    	//echo "DELETE FROm dt_students WHERE student_id='$student_id'";
    	q("DELETE FROm dt_students WHERE student_id='$student_id'");
    	if(!mysql_error()){
    		$msg="Student deleted successfully";
    		header('location:list_students.php');
    	}
    }
?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Students

			</h3>
			<div class="col-md-6 col-md-offset-8"><button class="btn-success btn" id="btn_student" style="width:50%;margin-bottom:20px;">Add Student</button></div>
			<div class="clearfix"></div>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Student Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							 while($f_student=f($rs_student)){?>
							  <tr>
								<td scope="row"><?php echo $i;?></th>
								<td style="width:45%"><?php 
								if($f_student['student_first_name']!='')
									echo stripslashes($f_student['student_first_name']);
								else
									echo stripslashes($f_student['student_user_name']);
								?></td>
								<td><?php echo stripslashes($f_student['student_email']);?></td>
								<td><?php echo stripslashes($f_student['student_phone']);?></td>
								<td><a href="add_student.php?mode=edit&student_id=<?php echo $f_student['student_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="list_students.php?mode=delete&student_id=<?php echo $f_student['student_id'];?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
								</td>
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
<?php include '../phpjs/partners/student_js.php';?>	  

