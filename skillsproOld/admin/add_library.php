<?php include 'header.php';
$library_file_id=$_GET['library_file_id'];
echo $sql_material="SELECT * FROM dt_elibrary a INNER JOIN dt_objects b ON a.object_id=b.object_id WHERE library_file_id='$library_file_id'";
$f_library=f(q($sql_material));
$mode=$_REQUEST['mode'];
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Library </h3>
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
								<input type="hidden" id="library_file_id" value="<?php echo $library_file_id;?>"/>
								<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>">

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Topic Name</label>
									<div class="col-sm-8">
										<select name="topic_id" id="topic_id" class="form-control1">
											<option>Select Topic</option>
											<?php $rs_topic=q("SELECT * FROM dt_topics WHERE created_id='".$_SESSION['partner_id']."'");
											      while($f_topic=f($rs_topic)){?>
												<option value="<?php echo $f_topic['topic_id'];?>" <?php if($f_library['topic_id']==$f_topic['topic_id']){?> selected="selected" <?php } ?>><?php echo $f_topic['topic_name'];?></option>
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
												//echo "SELECT * FROM dt_courses WHERE topic_id='".$f_library['topic_id']."' AND  created_id='".$_SESSION['partner_id']."'";
												$rs_course=q("SELECT * FROM dt_courses WHERE topic_id='".$f_library['topic_id']."' AND  created_id='".$_SESSION['partner_id']."'");
												while($f_course=f($rs_course)){ 
												?>
											<option value="<?php echo $f_course['course_id'];?>" <?php if($f_course['course_id']==$f_library['course_id']){?> selected="selected"<?php } ?>><?php echo $f_course['course_name'];?></option>	
											<?php 
												}
											} ?>
										</select>
									</div>
									
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Chapter Name</label>
									<div class="col-sm-8">
									    <?php if($mode!='edit'){?>
										<select name="chapter_id" id="chapter_id" class="form-control1">
											<option>Select Chapter</option>
										</select>
										<?php }else{ ?>
											<select name="chapter_id" id="chapter_id" class="form-control1">
												<option>Select Chapter</option>
												<?php $rs_chapter=q("SELECT * FROm dt_chapters WHERE topic_id='".$f_library['topic_id']."'");
													while($f_chapters=f($rs_chapter)){?>
													<option value="<?php echo $f_chapters['chapter_id'];?>" <?php if($f_chapters['chapter_id']==$f_library['chapter_id']){?> selected="selected" <?php } ?>><?php echo $f_chapters['chapter_name'];?></option>	
													<?php  } ?>	
											</select>
										<?php } ?>	
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Object Name</label>
									<div class="col-sm-8">
										<select name="object_id" id="object_id" class="form-control1">
											<option>Select Object</option>
											<?php $rs_object=q("SELECT * FROm dt_objects");
												while($f_object=f($rs_object)){
											?>
											<option value="<?php echo $f_object['object_id'];?>" <?php if($f_library['object_id']==$f_object['object_id']){?> selected="selected" <?php } ?> ><?php echo $f_object['object_name'];?></option>
											<?php } ?>
										</select>
									</div>
								</div>	

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Object Title</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="library_file_title" name="library_file_title" placeholder="Object Title" value="<?php echo $f_library['library_file_title'];?>">
									</div>
								</div>
								<div class="form-group">
										<input type="hidden" name="course_pic" id="course_pic"/>
										<label for="focusedinput" class="col-sm-2 control-label">Upload Library File </label>
										<div class="col-sm-8">
											<div id="fileuploader">Upload Course Pic</div>
											<input type="hidden" name="hid_doc_file" id="hid_doc_file" value="<?php echo $f_library['uploaded_file_name'];?>"/>
										</div>
								</div>				
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Object URL/Twitter Hashtag (without hash sign)</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="url_of_the_object" name="url_of_the_object" placeholder="Object Title" value="<?php echo $f_library['url_of_the_object'];?>">
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Minimum Time to Spent</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="minimum_time_to_spent" name="minimum_time_to_spent" placeholder="Object Title" value="<?php echo $f_library['minimum_time_to_spent'];?>">
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Points Secured</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="point_secured" name="point_secured" placeholder="Object Title" value="<?php echo $f_library['point_secured'];?>">
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
<?php include '../phpjs/partners/library_js.php';?>	