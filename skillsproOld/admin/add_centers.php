<?php include 'header.php';
$mode=$_REQUEST['mode'];
$center_id=$_REQUEST['center_id'];
$partner_id=$_SESSION['partner_id'];
if(isset($mode) && $mode=='edit'){
	$f_center=f(q("SELECT * FROM dt_centers WHERE center_id='$center_id' "));
}
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Centers </h3>
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
								<input type="hidden" id="center_id" value="<?php echo $f_center['center_id'];?>"/>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Center Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="center_name" name="center_name" value="<?php echo $f_center['center_name'];?>" placeholder="Center  Name">
									</div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Center Address</label>
									<div class="col-sm-8"><input type="text" class="form-control1" id="center_address" name="center_address" value="<?php echo $f_center['center_address'];?>" placeholder="Center  Address"></div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Center State</label>
									<div class="col-sm-8">
									   	<select name="center_state" id="center_state" class="form-control1">
											<option value="">Select State</option>
											<?php 

											$rs_state=q("SELECT state_id,state_name FROM dt_state");
											      while($f_state=f($rs_state)){?>
											<option value="<?php echo $f_state['state_id'];?>" <?php if($f_center['center_state']==$f_state['state_id']){?>selected="selected"<?php } ?>><?php echo $f_state['state_name'];?></option>      
											<?php } ?>      
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Center City</label>
									<div class="col-sm-8">
										<select name="center_city" id="center_city" class="form-control1">
											<option value="">Select City</option>
											<?php if($mode=='edit'){
												$rs_city=q("SELECT * FROM dt_city WHERE state_id='".$f_center['center_state']."'");
												while($f_city=f($rs_city)){ 
												?>
											<option value="<?php echo $f_city['city_id'];?>" <?php if($f_center['center_city']==$f_city['city_id']){?> selected="selected"<?php } ?>><?php echo $f_city['city_name'];?></option>	
											<?php 
												}
											} ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Center Email</label>
									<div class="col-sm-8">
										<input type="text" name="center_email" id="center_email" value="<?php echo $f_center['center_email'];?>" class="form-control1" id="focusedinput" placeholder="Center Email">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Center Contact Person</label>
									<div class="col-sm-8">
										<input type="text" name="center_in_charge" id="center_in_charge" value="<?php echo $f_center['center_in_charge'];?>" class="form-control1" id="focusedinput" placeholder="Center  Contact Person">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Center Contact Person Telephone</label>
									<div class="col-sm-8">
										<input type="text" name="center_in_charge_contact_no" value="<?php echo $f_center['center_in_charge_contact_no'];?>" id="center_in_charge_contact_no" class="form-control1" id="focusedinput" placeholder="Center Contact Person Telephone">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Center Phone</label>
									<div class="col-sm-8">
										<input type="text" name="center_contact_no" id="center_contact_no" value="<?php echo $f_center['center_contact_no'];?>" class="form-control1" id="focusedinput" placeholder="Center  Phone">
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
<?php include '../phpjs/partners/center_js.php';?>		