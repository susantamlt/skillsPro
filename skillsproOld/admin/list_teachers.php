<?php include 'header.php';
	$teacher_id=$_REQUEST['teacher_id'];
	$rs_teachers=q("SELECT * FROm dt_teachers WHERE partner_id='".$_SESSION['partner_id']."' ");

   if($_REQUEST['mode']=='delete'){
    	echo "DELETE FROm dt_teachers WHERE teacher_id='$teacher_id'";
    	q("DELETE FROm dt_teachers WHERE teacher_id='$teacher_id'");
    	if(!mysql_error()){
    		$msg="Teacher deleted successfully";
    		header('location:list_teachers.php');
    	}
    }
?>
      <div id="page-wrapper">
		<div class="graphs">
			<h3 class="blank1">List Teachers

			</h3>
			<?php if($msg!=''){?>
			<div class="alert alert-success" role="alert" id="success" style="display:none">
					<strong><?php echo $msg;?></strong>
					</div>
			<?php } ?>
			
			<div class="col-md-6 col-md-offset-8"><button class="btn-success btn" id="btn_teacher" style="width:50%;margin-bottom:20px;">Add Teacher</button></div>
			<div class="clearfix"></div>
			<div class="bs-example4" data-example-id="simple-responsive-table">
				<div class="table-responsive">
						  <table class="table table-bordered">
							<thead>
							  <tr>
								<th>#</th>
								<th>Teacher Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Action</th>
								
							  </tr>
							</thead>
							<tbody>
							 <?php 
							 $i=1;
							// echo "DELETE FROm dt_teachers WHERE teacher_id='$teacher_id'";
							 while($f_teacher=f($rs_teachers)){?>
							  <tr>
								<td scope="row"><?php echo $i;?></th>
								<td style="width:45%"><?php 
								if($f_teacher['teacher_first_name']!='')
									echo stripslashes($f_teacher['teacher_first_name']).' '.stripslashes($f_teacher['teacher_last_name']);
								else
									echo stripslashes($f_teacher['teacher_user_name']);
								?></td>
								<td><?php echo stripslashes($f_teacher['teacher_email']);?></td>
								<td><?php echo stripslashes($f_teacher['teacher_phone']);?></td>
								<td><a href="add_teacher.php?mode=edit&teacher_id=<?php echo $f_teacher['teacher_id'];?>">Edit</a>&nbsp;|&nbsp;<a href="list_teachers.php?mode=delete&teacher_id=<?php echo $f_teacher['teacher_id'];?>" onclick="return confirm('Are you want to delete?')">Delete</a>&nbsp;|&nbsp;
							   	<!--/*<a href="assign_student_to_course.php?teacher_id=<?php echo $f_teacher['teacher_id'];?>">Assign Course</a>*/-->
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
<?php include '../phpjs/partners/teachers_js.php';?>	  

