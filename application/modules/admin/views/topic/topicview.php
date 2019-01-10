		<section class="content">
			<input type="hidden" name="page" id="page" value="topic" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Topic View</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Topic Name: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['topic_name']; ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/topic/topiclist/') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>