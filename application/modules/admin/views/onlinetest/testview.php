		<section class="content">
			<input type="hidden" name="page" id="page" value="Test" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Test View</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Course Name: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['course_name']; ?></div>
									<label class="col-md-2"> Test Name: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['online_test_name']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<?php $question_type = array('E'=>'Easy','M'=>'Medium','H'=>'Hard'); ?>
									<?php $status = array('Y'=>'Active','N'=>'In Active'); ?>
									<label class="col-md-2"> Question Type: </label>
									<div class="col-md-4"><?php echo $question_type[$ljp_data[0]['online_test_type']]; ?></div>

									<label class="col-md-2"> Status: </label>
									<div class="col-md-4"><?php echo $status[$ljp_data[0]['status']]; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Start Date: </label>
									<div class="col-md-4"><?php echo date('jS M  Y', strtotime($ljp_data[0]['start_date'])); ?></div>

									<label class="col-md-2"> End Date: </label>
									<div class="col-md-4"><?php echo date('jS M Y', strtotime($ljp_data[0]['end_date'])); ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Test Duration: </label>
									<?php
									$str = explode(":",$ljp_data[0]['time_duration_hours']);
									?> 
									<div class="col-md-4"><?php echo "$str[0] Hours  $str[1] Munites"?></div>
									<!-- <div class="col-md-4"><?php echo date('H:i',strtotime($ljp_data[0]['time_duration_hours'])); ?> -->
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/test/testlist/') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>