<?php include 'header.php'; 
	$student_id=$_REQUEST['student_id'];
	$f_student=f(q("SELECT * FROm dt_students WHERE student_id='$student_id'"));
	
	$f_student_course=f(q("SELECT * FROM dt_student_course WHERE is_active_course='Y' and student_id='$student_id'"));

?>

<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Student</h3>	

		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal">
					<div class="alert alert-success" role="alert" id="success" style="display:none">
					<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>" />
					<input type="hidden" name="student_id" id="student_id" value="<?php echo $student_id;?>" />
					<div class="alert alert-danger" role="alert" id="error" style="display:none">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
					
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Student Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control1" id="student_first_name" name="student_first_name" value="<?php echo $f_student['student_first_name'];?>" placeholder="First Name">
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control1" id="student_last_name" name="student_last_name" value="<?php echo $f_student['student_last_name'];?>" placeholder="Last Name">
							</div>	
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Student Email</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="student_email" name="student_email" value="<?php echo $f_student['student_email'];?>"  placeholder="Email">
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Student Phone</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="student_phone" name="student_phone" value="<?php echo $f_student['student_phone'];?>" placeholder="Phone">
							</div>
					</div>

					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Course Name</label>
							<div class="col-sm-8">
								<select name="course_id" id="course_id" class="form-control1">
									<option value="">Select Course</option>			
									<?php $rs_courses=q("SELECT * FROM dt_courses WHERE created_id='".$_SESSION['partner_id']."'");
									      while($f_course=f($rs_courses)){?>
									<option value="<?php echo $f_course['course_id'];?>" <?php if($f_student_course['course_id']==$f_course['course_id']){?> selected="selected" <?php } ?> ><?php echo $f_course['course_name'];?></option>      
									<?php  } ?>
 								</select>
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Student Address</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="student_address_1" name="student_address_1" value="<?php echo $f_student['student_address_1'];?>" placeholder="Address Line 1">
							</div>
					</div>
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="student_address_2" name="student_address_2" value="<?php echo $f_student['student_address_2'];?>" placeholder="Address Line 2">
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Stduent State</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="student_state" name="student_state" value="<?php echo $f_student['student_state'];?>" placeholder="State">
							</div>
					</div>
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Stduent Zip</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="student_zip" name="student_zip" value="<?php echo $f_student['student_zip'];?>" placeholder="Zip">
							</div>
					</div>
					
				
					<div class="form-group offset-10" >
						<button class="btn-success btn" id="btn_submit">Submit</button>	
					</div>
					
					
				</form>	
			</div>
		</div>			
	</div>
</div>
<?php include 'footer.php';?>	
<?php include '../phpjs/partners/student_js.php';?>	