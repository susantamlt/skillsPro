<?php include 'header.php'; 
	$teacher_id=$_REQUEST['teacher_id'];
	$f_teacher=f(q("SELECT * FROm dt_teachers WHERE teacher_id='$teacher_id'"));
	$course_arr=explode('~',$f_teacher['course_id']);
	
	
?>

<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Teacher</h3>	
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal">
					<div class="alert alert-success" role="alert" id="success" style="display:none">
					<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>" />
					<input type="hidden" name="teacher_id" id="teacher_id" value="<?php echo $teacher_id;?>" />
					<div class="alert alert-danger" role="alert" id="error" style="display:none">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
					
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Teacher Name</label>
							<div class="col-sm-4">
								<input type="text" class="form-control1" id="teacher_first_name" name="teacher_first_name" value="<?php echo $f_teacher['teacher_first_name'];?>" placeholder="First Name">
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control1" id="teacher_last_name" name="teacher_last_name" value="<?php echo $f_teacher['teacher_last_name'];?>" placeholder="Last Name">
							</div>	
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Teacher Email</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="teacher_email" name="teacher_email" value="<?php echo $f_teacher['teacher_email'];?>"  placeholder="Email">
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Teacher Phone</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="teacher_phone" name="teacher_phone" value="<?php echo $f_teacher['teacher_phone'];?>" placeholder="Phone">
							</div>
					</div>

					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Course Name</label>
							<div class="col-sm-8">
								<select name="course_id" id="course_id" class="form-control1" multiple="multiple">
									<option value="">Select Course</option>			
									<?php $rs_courses=q("SELECT * FROM dt_courses WHERE created_id='".$_SESSION['partner_id']."'");
									      while($f_course=f($rs_courses)){?>
									<option value="<?php echo $f_course['course_id'];?>" <?php if(in_array($f_course['course_id'],$course_arr)){ ?> selected="selected" <?php } ?> ><?php echo $f_course['course_name'];?></option>      
									<?php  } ?>
 								</select>
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Teacher Address</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="teacher_address_1" name="teacher_address_1" value="<?php echo $f_teacher['teacher_address_1'];?>" placeholder="Address Line 1">
							</div>
					</div>
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label"></label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="teacher_address_2" name="teacher_address_2" value="<?php echo $f_teacher['teacher_address_2'];?>" placeholder="Address Line 2">
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Teacher State</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="teacher_state" name="teacher_state" value="<?php echo $f_teacher['teacher_state'];?>" placeholder="State">
							</div>
					</div>
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Teacher Zip</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="teacher_zip" name="teacher_zip" value="<?php echo $f_teacher['teacher_zip'];?>" placeholder="Zip">
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
<?php include '../phpjs/partners/teacher_js.php';?>	