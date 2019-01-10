<?php include 'header.php';
$topic_id=$_GET['topic_id'];
$mode=$_GET['mode'];
$f_topic=f(q("SELECT * FROM dt_topics WHERE topic_id='$topic_id'"));
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
						   <form class="form-horizontal">
						   		<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>"/>
						   		<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>"/>
							   	<input type="hidden" id="topic_id" value="<?php echo $f_topic['topic_id'];?>"/>
							   	<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Topic Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" id="topic_name" name="topic_name" value="<?php echo $f_topic['topic_name'];?>" placeholder="Topic  Name">
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