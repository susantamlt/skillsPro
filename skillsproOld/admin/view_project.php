<?php include 'header.php';
$project_id=$_GET['project_id'];
$student_id=$_GET['student_id'];

$mode=$_GET['mode'];
$f_project=f(q("SELECT * FROM dt_student_submit_project WHERE project_id='$project_id' and student_id='$student_id'"));
$files=explode('~', $f_project['student_project_file']);
print_r($files);

?>
			<div id="page-wrapper">
				<div class="graphs">
				<h3 class="blank1">Add Topic </h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						   <div class="alert alert-success" style="display:none" id="success" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <div class="alert alert-danger" id="error" style="display:none" role="alert">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
						   <div class="col-md-2">&nbsp;</div>
		                    <div class="col-md-10"><?php echo $f_project['description'];?></div>
		                    <div class="clearfix"></div>
		                    <div class="col-md-2">&nbsp;</div>
		                    <div class="col-md-10"><a href="<?php echo WEBDIR.ROOT;?>uploads/courses/<?php echo $files[1];?>">Download File</a></div>
		                     <div class="clearfix" style="padding-bottom:50px; "></div>
						   <form class="form-horizontal">
						   		<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>"/>
						   		<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>"/>
							   	<input type="hidden" id="topic_id" value="<?php echo $f_topic['topic_id'];?>"/>
							   	<div class="form-group">
                            <label for="focusedinput" class="col-sm-2 conrol-label">Teachers Comment</label>
                            <div class="col-sm-8">
                                <textarea rows="10" cols="96" id="project_description" name="project_description" placeholder="Default Input"></textarea> 
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
<?php include '../phpjs/partners/topic_js.php';?>					   