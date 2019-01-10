<?php include 'header.php'; ?>

<div id="page-wrapper">
	<div class="graphs">
		<h3 class="blank1">Add Batch</h3>	
		<div class="tab-content">
			<div class="tab-pane active" id="horizontal-form">
				<form class="form-horizontal">
					<div class="alert alert-success" role="alert" id="success" style="display:none">
					<strong>Well done!</strong> You successfully read this important alert message.
					</div>
					<input type="hidden" name="partner_id" id="partner_id" value="<?php echo $_SESSION['partner_id'];?>" />
					<div class="alert alert-danger" role="alert" id="error" style="display:none">
							<strong>Well done!</strong> You successfully read this important alert message.
						   </div>
					
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Batch Type</label>
							<div class="col-sm-8">
								<select name="batch_type" id="batch_type" class="form-control1">
									<option value="">Select Batch Type</option>
									<option value="MOR">MORNING</option>
									<option value="AFT">AFTERNOON</option>
									<option value="EVE">EVENING</option>
									<option value="NIG">NIGHT</option>
									<option value="WEEK">WEEKEND</option>			
									
							</select>
						 </div>	
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Center Name</label>
							<div class="col-sm-8">
								<select name="center_id" id="center_id" class="form-control1">
									<option value="">Select Center</option>			
									<?php $rs_center=q("SELECT * FROM dt_centers WHERE partner_id='".$_SESSION['partner_id']."'");
									      while($f_center=f($rs_center)){?>
									 <option value="<?php echo $f_center['center_id'];?>"><?php echo $f_center['center_name'];?></option>     
									<?php } ?>
									<option></option>
								</select>
							</div>
					</div>
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Course Name</label>
							<div class="col-sm-8">
								<select name="course_id" id="course_id" class="form-control1">
									<option value="">Select Course</option>			
									
								</select>
							</div>
					</div>
					
					
					
					
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Batch Code Prefix</label>
							<div class="col-sm-4">
								<input type="text" class="form-control1" id="batch_code_prefix" name="batch_code_prefix" placeholder="Default Input">
							</div>
					</div>
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Class Type</label>
							<div class="col-sm-4">
								<input type="radio"  id="class_type_1" name="class_type" value="OL" />&nbsp;ONLINE
								<input type="radio" id="class_type_2" name="class_type" value="OF" />&nbsp;OFFLINE

							</div>
					</div>
					
					<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Duration</label>
							<div class="col-sm-8">
								<input style="width:40%" type="text" class="form-control1" id="start_date" name="start_date" placeholder="Start Date">
								
								<input style="width:40%" type="text" class="form-control1" id="end_date" name="end_date" placeholder="End Date">
								
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
<?php include '../phpjs/partners/batch_js.php';?>	