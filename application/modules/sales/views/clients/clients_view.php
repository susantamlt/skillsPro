<section class="content">
			<input type="hidden" name="page" id="page" value="clients" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>View Clients</h2>
							</div>
							<div class="body">
								<fieldset>
									<legend> Client Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Contact Name: </label>
										<div class="col-md-4"><?php echo $clients[0]['contact_name']; ?></div>
										
										<label class="col-md-2"> Decision Maker Name: </label>
										<div class="col-md-4"><?php echo $clients[0]['decision_maker_name']; ?></div>
									</div>

									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Primary Phono No: </label>
										<div class="col-md-4"><?php echo $clients[0]['phone_1']; ?></div>
										
										<label class="col-md-2"> Secondary Phone No: </label>
										<div class="col-md-4"><?php echo $clients[0]['phone_2']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Primary Email ID : </label>
										<div class="col-md-4"><?php echo $clients[0]['email_1']; ?></div>
										
										<label class="col-md-2">Secondary Email ID: </label>
										<div class="col-md-4"><?php echo $clients[0]['email_2']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">Depertment Name: </label>
										<div class="col-md-4"><?php echo $clients[0]['department']; ?></div>
										
										<label class="col-md-2"> Fax Number: </label>
										<div class="col-md-4"><?php echo $clients[0]['fax']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Job Title: </label>
										<div class="col-md-4"><?php echo $clients[0]['job_title']; ?></div>
										
										<label class="col-md-2"> Address: </label>
										<div class="col-md-4"><?php echo $clients[0]['address']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Skype ID: </label>
										<div class="col-md-4"><?php echo $clients[0]['skype_id']; ?></div>
										
										<label class="col-md-2"> Twitter ID: </label>
										<div class="col-md-4"><?php echo $clients[0]['twitter']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Linkedin: </label>
										<div class="col-md-4"><?php echo $clients[0]['linkedin']; ?></div>
										
										<label class="col-md-2">Website: </label>
										<div class="col-md-4"><?php echo $clients[0]['website']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Created Date: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime( $clients[0]['created_at'])); ?></div>
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="clients_id" id="clients_id" value="<?php echo $clients[0]['client_id']; ?>">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
										<a href="<?php echo site_url('sales/clients/') ?>" class="btn btn-default" style="color: #cc0000,background-color:#cc0000">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>