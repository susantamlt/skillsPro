<section class="content">
			<input type="hidden" name="page" id="page" value="contractors" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>View Constractors</h2>
							</div>
							<div class="body">
								<fieldset>
									<legend> Contractor Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Contractor Name: </label>
										<div class="col-md-4"><?php echo $contractor[0]['contractor_name']; ?></div>
										
										<label class="col-md-2"> Organization Name: </label>
										<div class="col-md-4"><?php echo $contractor[0]['org_name']; ?></div>

									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Address: </label>
										<div class="col-md-4"><?php echo $contractor[0]['address']; ?></div>
										
										<label class="col-md-2"> Mobile No: </label>
										<div class="col-md-4"><?php echo $contractor[0]['mobile']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Skill Set: </label>
										<div class="col-md-4"><?php echo $contractor[0]['skillset']; ?></div>
										
										<label class="col-md-2"> Experience: </label>
										<div class="col-md-4"><?php echo $contractor[0]['experience']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Worked With Us: </label>
										<div class="col-md-4"><?php echo $contractor[0]['worked_with_us']; ?></div>
										
										<label class="col-md-2"> Pay Rate Range: </label>
										<div class="col-md-4"><?php echo $contractor[0]['pay_rate_range']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Current Status: </label>
										<div class="col-md-4"><?php echo $contractor[0]['current_status']; ?></div>
										
										<label class="col-md-2">Future Rating: </label>
										<div class="col-md-4"><?php echo $contractor[0]['future_rating']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Pay Rate Rating: </label>
										<div class="col-md-4"><?php echo $contractor[0]['pay_rate_rating']; ?></div>
										
										<label class="col-md-2"> Experiance Rating: </label>
										<div class="col-md-4"><?php echo $contractor[0]['experience_rating']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Email ID: </label>
										<div class="col-md-4"><?php echo $contractor[0]['email_id']; ?></div>
										<label class="col-md-2"> Created Date: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime($contractor[0]['cons_date'])); ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">  Zip/Post Code: </label>
										<div class="col-md-4"><?php echo $contractor[0]['zip_code']; ?></div>
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $contractor[0]['contractor_id']; ?>">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
										
										<a href="<?php echo site_url('sales/contractors/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>