<?php include 'header.php';
$mode=$_REQUEST['mode'];
$class_id=$_REQUEST['class_id'];

if(isset($mode) && $mode=='edit'){
	$f_class=f(q("SELECT * FROM dt_class WHERE class_id='$class_id' "));
	$start_date_arr=explode('-', $f_class['class_start_date']);
	$end_date_arr=explode('-', $f_class['class_end_date']);

	$start_date=$start_date_arr[2].'/'.$start_date_arr[1].'/'.$start_date_arr[0];
	$end_date=$end_date_arr[2].'/'.$end_date_arr[1].'/'.$end_date_arr[0];
	$class_code=$f_class['class_code'];


}
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Class </h3>
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
								<input type="hidden" id="class_id" value="<?php echo $f_class['class_id'];?>"/>
								<input type="hidden" id="class_code" value="<?php echo $class_code;?>"/>
								<input type="hidden" name="mode" id="mode" value="<?php echo $mode;?>"/>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Class Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="class_name" name="class_name" value="<?php echo $f_class['class_name'];?>" placeholder="Class  Name">
									</div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Course Name</label>
									<div class="col-sm-8">
											<select name="course_id" id="course_id" class="form-control1">
											<option value="">Select Course</option>
											<?php 

											$rs_course=q("SELECT course_id,course_name FROM dt_courses WHERE created_id='".$_SESSION['partner_id']."'");
											      while($f_course=f($rs_course)){?>
											<option value="<?php echo $f_course['course_id'];?>" <?php if($f_class['course_id']==$f_course['course_id']){?>selected="selected"<?php } ?>><?php echo $f_course['course_name'];?></option>      
											<?php } ?>      
										</select>
									</div>
								</div>
								
								<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Duration</label>
								<div class="col-sm-8">
									<input style="width:40%" type="text" class="form-control1" id="start_date" name="start_date" placeholder="Start Date" value="<?php echo $start_date;?>"  >
									
									<input style="width:40%" type="text" class="form-control1" id="end_date" name="end_date" placeholder="End Date" value="<?php echo $end_date;?>">
									
								</div>
								</div>
								<div class="form-group">

										<label for="focusedinput" class="col-sm-2 control-label">Class Timing</label>
										<div class="col-sm-8">
										Start Time:<input type="time" name="batch_start_time" id="start_time" value="<?php echo $f_class['class_start_time'];?>" />
										End Time:<input type="time" name="batch_end_time" id="end_time" value="<?php echo $f_class['class_end_time'];?>"/>
										</div>
								</div>		
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Repeat on</label>
									<div class="col-sm-8">
										<input type="checkbox" name="is_repeated" id="is_repeated" value="1">
									</div>
									
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Repeated Class</label>
									<div class="col-sm-8">
										Daily <input type="checkbox" name="repeated_class"  value="1">&nbsp; 6 days per week <input type="checkbox" name="repeated_class" id="6days" value="2">&nbsp; 5 days per week <input type="checkbox" name="repeated_class" id="5days" value="3">&nbsp; Weekly once <input type="checkbox" name="repeated_class" id="weekly" value="4">&nbsp; Once every month <input type="checkbox" name="repeated_class" id="monthly" value="5">&nbsp; On Selected Days <input type="checkbox" name="repeated_class" id="selected_days" value="6">
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
					<div class="clearfix"> </div>
				</div>
			</div>
<?php include 'footer.php';?>
<?php include '../phpjs/partners/class_js.php';?>		