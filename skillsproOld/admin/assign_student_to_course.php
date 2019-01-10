<?php include 'header.php';
$student_id=$_GET['student_id'];
$f_student=f(q("SELECT * FROM dt_students WHERE student_id='$student_id'"));
?>
			<div id="page-wrapper">
				<div class="graphs">
				<h3 class="blank1">Assign Course </h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						   <div class="alert alert-success" style="display:none" id="success" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <div class="alert alert-danger" id="error" style="display:none" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <form class="form-horizontal">
						   		<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>"/>
						   		
							   	<input type="hidden" id="student_id" name="student_name" value="<?php echo $student_id;?>"/>
							   	<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Student Name</label>
										<div class="col-sm-8">
											<?php if($f_student['student_user_name']==''){
												echo $f_student['student_first_name'];
											}else{
												echo $f_student['student_user_name'];
											}	
											?>
										</div>
										
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Topic Name</label>
									<div class="col-sm-8">
										<select name="topic_id" id="topic_id" class="form-control1">
											<option>Select Topic</option>
											<?php $rs_topic=q("SELECT * FROM dt_topics WHERE created_id='".$_SESSION['partner_id']."'");
											      while($f_topic=f($rs_topic)){?>
												<option value="<?php echo $f_topic['topic_id'];?>" <?php if($f_exam['topic_id']==$f_topic['topic_id']){?> selected="selected" <?php } ?>><?php echo $f_topic['topic_name'];?></option>
											<?php  } ?>
										</select>
									</div>
									
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Course Name</label>
									<div class="col-sm-8">
										<select name="course_id" id="course_id" class="form-control1">
											<option>Select Course</option>
											<?php if($mode=='edit'){
												$rs_course=q("SELECT * FROM dt_courses WHERE topic_id='$topic_id' AND  created_id='".$_SESSION['partner_id']."'");
												while($f_course=f($rs_course)){ 
												?>
											<option value="<?php echo $f_course['course_id'];?>" <?php if($f_course['course_id']==$f_exam['course_id']){?> selected="selected"<?php } ?>><?php echo $f_course['course_name'];?></option>	
											<?php 
												}
											} ?>
										</select>
									</div>
									
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<button class="btn-success btn" id="btn_submit" style="width:50%;">Submit</button>
									</div>
								</div>
						   </form>
						</div>
					</div>
				</div>
			</div>	
<?php include 'footer.php';?>
<?php include '../phpjs/partners/student_js.php';?>					   