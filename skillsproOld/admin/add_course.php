<?php include 'header.php';
$mode=$_REQUEST['mode'];
$course_id =$_REQUEST['course_id'];
$partner_id=$_SESSION['partner_id'];
$start_date='';
$end_date='';
if(isset($mode) && $mode=='edit'){
	$f_course=f(q("SELECT * FROM dt_courses WHERE course_id='$course_id' "));
	
	$start_date=date('d/m/Y',$f_course['date_from']);
	$end_date=date('d/m/Y',$f_course['date_from']);
}
?>
<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Course</h3>	
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal">
					
					<div class="alert alert-success" role="alert" id="success" style="display:none">
					<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>" />
					<input type="hidden" id="course_id" value="<?php echo $course_id;?>"/>
					<div class="alert alert-danger" role="alert" id="error" style="display:none">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
			<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Course Name</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="course_name" name="course_name" placeholder="Course Name" value="<?php echo $f_course['course_name'];?>">
					</div>
			</div>
			<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Topic Name</label>
					<div class="col-sm-8">
						<select name="topic_id" id="topic_id" class="form-control1">
							<option value="">Select Topic</option>			
							<?php $rs_topics=q("SELECT * FROM dt_topics WHERE created_id='".$_SESSION['partner_id']."'");
								  while($f_topics=f($rs_topics)){
									 ?>
							 <option value="<?php echo $f_topics['topic_id'];?>"<?php if($f_topics['topic_id'] == $f_course['topic_id']){ echo 'selected="selected"';}?>><?php echo $f_topics['topic_name'];?></option>     
							<?php } ?>
							<option></option>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Chapter Name</label>
					<div class="col-sm-8">
						<select name="chapter_id" id="chapter_id" class="form-control1" multiple="multiple">
							<?php
							if(isset($_REQUEST['mode'])){
								$chapter_name = q("SELECT * FROM dt_chapters where topic_id='".$f_course['topic_id']."'");
								while($chp_nm = f($chapter_name)){
									$data_chapter_id = explode('~',$f_course['chapter_id']);
									if(in_array($chp_nm['chapter_id'],$data_chapter_id)){ $selected='selected="selected"';}else{$selected='';}
									echo "<option value='".$chp_nm['chapter_id']."' ".$selected.">".$chp_nm['chapter_name']."</option>";
								}
							}else{
								echo "<option value=''>Select Chapters</option>";	
							}
							?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">City Name</label>
					<div class="col-sm-8">
						<select name="city_id" id="city_id" class="form-control1">
							<option value=''>Select City</option>
							<?php $rs_city=q("SELECT * FROm dt_city");
								  while($f_city=f($rs_city)){?>
							 <option value="<?php echo $f_city['city_id'];?>"<?php if($f_course['city_id'] == $f_city['city_id']){ echo 'selected="selected"';} ?>><?php echo $f_city['city_name'];?></option>     
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Center Name</label>
					<div class="col-sm-8">
						<select name="center_id" id="center_id" class="form-control1">
							<option value=''>Select Center</option>
							<?php
							
							$f_center_names = q("SELECT * FROM dt_centers WHERE center_city='".$f_course['city_id']."' AND partner_id='$partner_id'");
							while($f_c_names = f($f_center_names)){ ?>
								<option value="<?php echo $f_c_names['center_id']; ?>" <?php if($f_c_names['center_id'] == $f_course['center_id']){ echo 'selected="selected"';} ?>><?php echo $f_c_names['center_name'];?></option>
							<?php
							}
							?>
						</select>
					</div>
			</div>
			<div class="form-group">
				<label for="focusedinput" class="col-sm-2 control-label">Duration</label>
				<div class="col-sm-8">
					<input style="width:40%" type="text" class="form-control1" id="start_date" name="start_date" placeholder="Start Date" value="<?php echo $start_date;?>">
					<input style="width:40%" type="text" class="form-control1" id="end_date" name="end_date" placeholder="End Date" value="<?php echo $end_date; ?>">
				</div>
			</div>
					<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Course Mode</label>
					<div class="col-sm-8">
						<input type="radio" name="course_mode" id="course_mode_1" value="O" <?php if($f_course['is_online_classroom'] == 'O'){ echo "checked";} ?>/>Online
						<input type="radio" name="course_mode" id="course_mode_2" value="C" <?php if($f_course['is_online_classroom'] == 'C'){ echo "checked";} ?>/>Classroom
						<input type="radio" name="course_mode" id="course_mode_3" value="B" <?php if($f_course['is_online_classroom'] == 'B'){ echo "checked";} ?>/>Both
					</div>
				</div>
				<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Course Preview Video Link</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="course_preview_video" name="course_preview_video" placeholder="Course Preview Video Link" value="<?php echo $f_course['course_preview_video']; ?>">
						</div>
				</div>
				<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Course Description</label>
						<div class="col-sm-8">
							<textarea rows="10" cols="66" id="course_description" name="course_description" placeholder="Default Input"><?php echo $f_course['course_description']; ?></textarea> 
						</div>
				</div>
				<div class="form-group">
						<input type="hidden" name="course_pic" id="course_pic"/>
						<label for="focusedinput" class="col-sm-2 control-label"></label>
						<div class="col-sm-8">
							<div id="fileuploader">Upload Course Pic</div>
						</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn-success btn" id="btn_submit" style="width:50%;">Submit</button>
					</div>
				</div>
				</form>	
			</div>
		</div>			
	</div>
</div>
<?php include 'footer.php';?>	
<?php include '../phpjs/partners/course_js.php';?>	