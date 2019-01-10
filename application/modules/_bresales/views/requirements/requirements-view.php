
		<section class="content">
			<input type="hidden" name="page" id="page" value="requirements" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>View Requirement</h2>
							</div>
							<div class="body">
								<fieldset>
									<legend>Requirement Opening Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Prospect Title: </label>
										<div class="col-md-4"><?php echo $requirement[0]['prospect_title']; ?></div>
										<label class="col-md-2"> Client Name: </label>
										<div class="col-md-4"><?php echo $requirement[0]['contact_name']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> No of Requirement: </label>
										<div class="col-md-4"><?php echo $requirement[0]['no_of_requirement']; ?></div>
										<label class="col-md-2"> No Requirement Fullfilled: </label>
										<div class="col-md-4"><?php echo $requirement[0]['no_requirement_fullfilled']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Proposed Rate: </label>
										<div class="col-md-4"><?php echo '$'.$requirement[0]['proposed_hourly_rate']; ?></div>
										<label class="col-md-2"> Final Rate: </label>
										<div class="col-md-4"><?php echo '$'.$requirement[0]['final_hourly_rate']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Final Comments on Requirement: </label>
										<div class="col-md-4"><?php echo $requirement[0]['final_comments_on_requirement']; ?></div>
										<label class="col-md-2"> Requirement Status: </label>
										<div class="col-md-4"><?php echo $requirement[0]['requirement_status']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Expected Date of Closure: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime($requirement[0]['expected_date_of_closure'])); ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-12"> Requirement: </label>
										<div class="col-md-12"><?php echo $requirement[0]['requirement']; ?></div>
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
										<input type="hidden" name="prospect_id" id="prospect_id" value="<?php echo $requirement[0]['prospect_id']; ?>">
										<a href="<?php echo site_url('sales/requirements/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>