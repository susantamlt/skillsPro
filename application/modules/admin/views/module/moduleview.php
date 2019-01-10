		<section class="content">
			<input type="hidden" name="page" id="page" value="module" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Module View</h2>
							</div>
							<div class="body">
								<div class="form-group" style="clear:both;">
									<label class="col-md-2"> Module  Name: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['module_name']; ?></div>
									<label class="col-md-2"> Section Name: </label>
									<div class="col-md-4"><?php echo $ljp_data[0]['section_name']; ?></div>
								</div>
								<div class="form-group" style="clear:both;">
									<?php $contain_type = array(''=>'','V'=>'Video','A'=>'Audio','T'=>'Text/PDF/Word/Excel','W'=>'Website Link/Blog Link', 'S'=>'Twitter Content/Facebook Content'); ?>
									<label class="col-md-2">Contain Type: </label>
									<div class="col-md-4"><?php echo $contain_type[$ljp_data[0]['content_type']]; ?></div>
                                    <?php $status = array('' =>'','Y'=>'Active','N'=>'In Active'); ?>
									<label class="col-md-2"> Status: </label>
									<div class="col-md-4"><?php echo $status[$ljp_data[0]['is_active']]; ?></div>
								</div>
								<div class="form-group">
									<div class="col-md-12">
										<a href="<?php echo site_url('admin/module/modulelist/') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
					
						</div>
					</div>
				</div>
			</div>
		</section>