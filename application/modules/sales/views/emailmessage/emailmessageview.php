
		<section class="content">
			<input type="hidden" name="page" id="page" value="emailmessage" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Template Details</h2>
							</div>
							<div class="body">
								<fieldset>
									<legend>Template Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Template Type :</label>
										<div class="col-md-4"><?php echo $results[0]['template_type'] ?></div>
									</div>
									<div class="form-group" style="clear: both;">
										<label class="col-md-2"> Template Title :</label>
										<div class="col-md-4"><?php echo $results[0]['template_title'] ?></div>
									</div>
									<div class="form-group" style="clear: both;">
										<label class="col-md-2">Template Content :</label>
										<div class="col-md-4"><?php echo $results[0]['template_content'] ?></div>
									</div>
									<div class="form-group" style="clear: both;">
										<div class="col-md-12">
											<a href="<?php echo site_url('sales/emailmessage/') ?>" class="btn btn-default">Back</a>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>