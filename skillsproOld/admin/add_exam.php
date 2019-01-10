<?php include 'header.php';
$mode=$_REQUEST['mode'];
$online_test_id=$_REQUEST['online_test_id'];
$partner_id=$_SESSION['partner_id'];
if(isset($mode) && $mode=='edit'){
	$f_exam=f(q("SELECT * FROM dt_online_test WHERE online_test_id='$online_test_id'"));
	$topic_id=$f_exam['topic_id'];
	$s_date=explode('-',$f_exam['start_date']);
	$start_date=$s_date[2].'/'.$s_date[1].'/'.$s_date[0];
	$e_date=explode('-',$f_exam['end_date']);
	$end_date=$e_date[2].'/'.$e_date[1].'/'.$e_date[0];

}
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Exam </h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<div class="alert alert-success" style="display:none" id="success" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <div class="alert alert-danger" id="error" style="display:none" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
							<form class="form-horizontal">
								<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $partner_id;?>"/>
								<input type="hidden" id="online_test_id" value="<?php echo $f_exam['online_test_id'];?>"/>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Exam Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="online_test_name" name="online_test_name" value="<?php echo $f_exam['online_test_name'];?>" placeholder="Exam  Name">
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
									<label for="focusedinput" class="col-sm-2 control-label">Exam Type</label>
									<div class="col-sm-8">
										<input type="radio" name="online_test_type" id="online_test_type1" value="E" <?php if($f_exam['online_test_type']=='E'){?> checked="checked" <?php } ?>>&nbsp;Examination
										<input type="radio" name="online_test_type" id="online_test_type2" value="P" <?php if($f_exam['online_test_type']=='P'){?> checked="checked" <?php } ?>>&nbsp;Practice
									</div>
									
								</div>
								<div class="form-group">
									<?php echo $f_exam['question_assignment'];?>
									<label for="focusedinput" class="col-sm-2 control-label">Question Assignment</label>
									<div class="col-sm-8">
										<input type="radio" name="question_assignment" id="question_assignment1" value="A" <?php if($f_exam['question_assignment']=='A'){?> checked="checked" <?php } ?>>&nbsp;Automatic
										<input type="radio" name="question_assignment" id="question_assignment2" value="M" <?php if($f_exam['question_assignment']=='M'){?> checked="chekced" <?php } ?>>&nbsp;Manual
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Exam Type</label>
									<div class="col-sm-8">
										<input type="radio" name="online_test_level" id="online_test_type1" value="E" <?php if($f_exam['online_test_level']=='E'){?> checked="checked" <?php } ?>>&nbsp;Easy
										<input type="radio" name="online_test_level" id="online_test_type2" value="M" <?php if($f_exam['online_test_level']=='M'){?> checked="checked" <?php } ?>>&nbsp;Medium
										<input type="radio" name="online_test_level" id="online_test_type3" value="H" <?php if($f_exam['online_test_level']=='H'){?> checked="checked" <?php } ?>>&nbsp;Hard
										<input type="radio" name="online_test_level" id="online_test_type3" value="C" <?php if($f_exam['online_test_level']=='C'){?> checked="checked" <?php } ?>>&nbsp;Combined
									</div>
									
								</div>
								<div class="form-group">									
									<label for="focusedinput" class="col-sm-2 control-label">Student Assignment</label>
									<div class="col-sm-8">
										<input type="radio" name="student_assignment" id="student_assignment1" value="A" <?php if($f_exam['student_assignment']=='A'){?> checked="checked" <?php } ?>>&nbsp;Automatic
										<input type="radio" name="student_assignment" id="student_assignment2" value="M" <?php if($f_exam['student_assignment']=='M'){?> checked="checked" <?php } ?>>&nbsp;Manual
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Number of Questions</label>
									<div class="col-sm-8">
										<input type="text" name="number_of_questions" id="number_of_questions" value="<?php echo $f_exam['number_of_questions'];?>" class="form-control1" id="focusedinput" placeholder="Number of Questions">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Time Duration</label>
									<div class="col-sm-2">
										<input type="text" name="time_duration_hours" value="<?php echo $f_exam['time_duration_hours'];?>" id="time_duration_hours" class="form-control1" placeholder="Time duration Hours">
										
									</div>
									<div class="col-sm-2">
									<input type="text" name="time_duration_minutes" value="<?php echo $f_exam['time_duration_minutes'];?>" id="time_duration_minutes" class="form-control1" placeholder="Time duration Minutes">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Duration</label>
									<div class="col-sm-8">
										<input style="width:40%" type="text" class="form-control1" value="<?php echo $start_date?>" id="start_date" name="start_date" placeholder="Start Date">
										
										<input style="width:40%" type="text" class="form-control1" value="<?php echo $end_date?>" id="end_date" name="end_date" placeholder="End Date">
										
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-4">
										<button class="btn-success btn" id="btn_submit" style="width:50%;">Submit</button>
									</div>
								</div>
							</form>
						</div>
					<div class="clearfix"> </div>
				</div>
			</div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/exam_js.php';?>		
      