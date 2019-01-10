<?php include 'header.php';
$mode=$_REQUEST['mode'];
$center_id=$_REQUEST['center_id'];
$partner_id=$_SESSION['partner_id'];
if(isset($mode) && $mode=='edit'){
	$f_prospect
=f(q("SELECT * FROM dt_centers WHERE center_id='$center_id' "));
}
?>
<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Add Prospect </h3>
					<div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<div class="alert alert-success" style="display:none" id="success" role="alert">
							<strong>Well done!</strong> You successfully saved prospect.
						   </div>
						   <div class="alert alert-danger" id="error" style="display:none" role="alert">
							<strong>Sorry</strong> Something went wrong
						   </div>
							<form class="form-horizontal">
								<input type="hidden" name="admin_id" id="admin_id" value="<?php echo $partner_id;?>"/>
								<input type="hidden" id="prospect_id" value="<?php echo $f_prospect
['prospect_id'];?>"/>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Prospect Title</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="prospect_title" name="prospect_title" value="<?php echo $f_prospect
['prospect_title'];?>" placeholder="Prospect  Name">
									</div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Prospect Source</label>
									<div class="col-sm-8"><input type="text" class="form-control1" id="prospect_source" name="prospect_source" value="<?php echo $f_prospect
['prospect_source'];?>" placeholder="Prodpect Source"></div>
								</div>
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Description</label>
									<div class="col-sm-8"><input type="text" class="form-control1" id="prospect_description" name="prospect_description" value="<?php echo $f_prospect
['prospect_description'];?>" placeholder="Prospect Description"></div>
								</div>
								
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email -1</label>
									<div class="col-sm-8">
										<input type="text" name="prospect_email_1" id="prospect_email_1" value="<?php echo $f_prospect
['prospect_email_1'];?>" class="form-control1" id="focusedinput" placeholder="Prspect Email 1">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label"> Email -2</label>
									<div class="col-sm-8">
										<input type="text" name="prospect_email_2" id="prospect_email_2" value="<?php echo $f_prospect
['prospect_email_2'];?>" class="form-control1" id="focusedinput" placeholder="Prspect Email 2">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Email -3</label>
									<div class="col-sm-8">
										<input type="text" name="prospect_email_3" id="prospect_email_3" value="<?php echo $f_prospect
['prospect_email_3'];?>" class="form-control1" id="focusedinput" placeholder="Prspect Email 2">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Phone 1</label>
									<div class="col-sm-8">
										<input type="text" name="prospect_phone_1" id="prospect_phone_1" value="<?php echo $f_prospect
['prospect_phone_1'];?>" class="form-control1" id="focusedinput" placeholder="Prospect Phone 1">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Phone 2</label>
									<div class="col-sm-8">
										<input type="text" name="prospect_phone_2" id="prospect_phone_2" value="<?php echo $f_prospect
['prospect_phone_2'];?>" class="form-control1" id="focusedinput" placeholder="Prospect Phone 2">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Phone 3</label>
									<div class="col-sm-8">
										<input type="text" name="prospect_phone_3" id="prospect_phone_3" value="<?php echo $f_prospect
['prospect_phone_3'];?>" class="form-control1" id="focusedinput" placeholder="Prospect Phone 3">
									</div>
								</div>
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Other Infor</label>
									<div class="col-sm-8">
										<textarea name=""></textarea>
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
<?php include '../phpjs/admin/prospect_js.php';?>		