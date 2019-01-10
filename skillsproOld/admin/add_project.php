<?php include 'header.php';
	$mode=$_REQUEST['mode'];
	$project_id=$_REQUEST['project_id'];
	$partner_id=$_SESSION['partner_id'];
	if(isset($mode) && $mode=='edit'){
		$f_project=f(q("SELECT * FROM dt_projects WHERE project_id='$project_id' "));
	}
?>
<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Projects/Assignments</h3>	
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal">
					<div class="alert alert-success" role="alert" id="success" style="display:none">
						<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>" />
					<input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id;?>" />
					<div class="alert alert-danger" role="alert" id="error" style="display:none">
						<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Type</label>
						<div class="col-sm-8">
							<input type="radio" id="option_type_1" name="option_type" value="P" <?php if($f_project['type'] == 'P'){ echo 'checked="checked"';} ?>>  Project
							<input type="radio" id="option_type_1" name="option_type" value="A" <?php if($f_project['type'] == 'A'){ echo 'checked="checked"';} ?>>  Assignment
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Project Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="project_name" name="project_name" placeholder="Project Name" value="<?php echo $f_project['project_name'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="selector1" class="col-sm-2 control-label">Topic Name</label>
						<div class="col-sm-8">
							<select name="topic_id" id="topic_id" class="form-control1">
								<option>Select Topic</option>
								<?php $rs_topic=q("SELECT * FROM dt_topics WHERE created_id='".$_SESSION['partner_id']."'");
									  while($f_topic=f($rs_topic)){
										//if($f_topic['topic_id'] == $f_project['topic_id']){$sel_top = 'checked="checked"';}else{$sel_top='';}
										?>
									<option value="<?php echo $f_topic['topic_id'];?>" <?php if($f_topic['topic_id'] == $f_project['topic_id']){?> selected="selected" <?php } ?>><?php echo $f_topic['topic_name'];?></option>
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
									$rs_course=q("SELECT * FROM dt_courses WHERE topic_id='".$f_project['topic_id']."' AND  created_id='".$_SESSION['partner_id']."'");
									while($f_cour_pro=f($rs_course)){ 
									?>
								<option value="<?php echo $f_cour_pro['course_id'];?>" <?php if($f_project['course_id']==$f_cour_pro['course_id']){echo 'selected="selected"';} ?>><?php echo $f_cour_pro['course_name'];?></option>	
								<?php 
									}
								} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Only Video Description</label>
						<div class="col-sm-8">
							<input type="radio" id="option_type1" name="is_video" value="Y" <?php if($f_project['is_video'] == 'Y'){echo 'checked="checked"';} ?>> Yes
							<input type="radio" id="option_type2" name="is_video" value="N" <?php if($f_project['is_video'] == 'N'){echo 'checked="checked"';} ?>> No
							<input type="radio" id="option_type3" name="is_video" value="B" <?php if($f_project['is_video'] == 'B'){echo 'checked="checked"';} ?>> Both
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Project Description Video Link</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="project_video_link" name="project_video_link" placeholder="Default Input" value="<?php echo $f_project['project_video_link'];?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Project Description</label>
						<div class="col-sm-8">
							<textarea rows="10" cols="96" id="project_description" name="project_description" placeholder="Default Input"><?php echo $f_project['project_description'];?></textarea> 
						</div>
					</div>
					<div class="form-group">
						<input type="hidden" name="course_pic" id="course_pic"/>
						<label for="focusedinput" class="col-sm-2 control-label">Upload Prject Files (You can upload multiple files)</label>
						<div class="col-sm-8">
							<div id="fileuploader">Upload File(s)</div>
							<input type="hidden" name="hid_doc_file" id="hid_doc_file" value=""/>
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
<?php include '../phpjs/partners/project_js.php';?>	