
		<section class="content">
			<input type="hidden" name="page" id="page" value="jobs" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2><?php echo $urlname; ?> Details</h2>
							</div>
							<div class="body">
								<fieldset>
									<legend><?php echo $urlname; ?> Opening Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Job Title </label>
										<div class="col-md-4"><?php echo $results[0]['jobtitle'] ?></div>
										<label class="col-md-2"> Company </label>
										<div class="col-md-4"><?php echo $results[0]['company'] ?></div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> City, State, Country </label>
										<div class="col-md-4"><?php echo $results[0]['formattedLocation'].', '.$results[0]['country'] ?></div>
										<label class="col-md-2"> language </label>
										<div class="col-md-4"><?php echo $results[0]['language'] ?></div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Source </label>
										<div class="col-md-4"><?php echo $results[0]['source'] ?></div>
										<label class="col-md-2"> Date </label>
										<div class="col-md-4"><?php echo $results[0]['date'] ?></div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Snippet </label>
										<div class="col-md-4"><?php echo $results[0]['snippet'] ?></div>
										<label class="col-md-2"> Formatted Relative Time </label>
										<div class="col-md-4"><?php echo $results[0]['formattedRelativeTime'] ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Url </label>
										<div class="col-md-4"><a href="<?php echo $results[0]['url'] ?>" onclick="return !window.open(this.href)"><?php echo $results[0]['jobtitle'] ?></a></div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<a href="<?php echo site_url('sales/jobs/') ?>" class="btn btn-default">Cancel</a>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>