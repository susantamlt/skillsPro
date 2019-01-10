
		<section class="content">
			<input type="hidden" name="page" id="page" value="jobs" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>View <?php echo $urlname; ?></h2>
							</div>
							<div class="body">
								<fieldset>
									<legend>Job Opening Information <span style="float: right;font-size: 15px;"><input type="checkbox" name="sendMsg" id="sendMsg" style="position: relative;opacity: 1;left: 0;" />&nbsp;Send Contract&nbsp;&nbsp;<input type="checkbox" name="recMsg" id="recMsg" style="position: relative;opacity: 1;left: 0;" />&nbsp;Receive Contract</span></legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> <?php echo $urlname; ?> Title: </label>
										<div class="col-md-4"><?php echo $jobs[0]['prospect_title']; ?></div>
										<label class="col-md-2"> Client Name: </label>
										<div class="col-md-4"><?php echo $jobs[0]['contact_name']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Date Opened: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime($jobs[0]['date_of_prospect'])); ?></div>
										<label class="col-md-2"> Target Date: </label>
										<div class="col-md-4"><?php echo date('d/m/Y',strtotime($jobs[0]['expected_date'])); ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> <?php echo $urlname; ?> Type: </label>
										<div class="col-md-4"><?php echo $jobs[0]['lead_type']; ?></div>
										<label class="col-md-2"> <?php echo $urlname; ?> Status: </label>
										<div class="col-md-4"><?php echo $jobs[0]['lead_status']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Domain Type: </label>
										<div class="col-md-4"><?php echo $jobs[0]['cat_id']; ?></div>
										<label class="col-md-2"> Category: </label>
										<div class="col-md-4"><?php echo $jobs[0]['prospect_type']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Country: </label>
										<div class="col-md-4"><?php echo $jobs[0]['country_name']; ?></div>
										<label class="col-md-2"> State/Province: </label>
										<div class="col-md-4"><?php echo $jobs[0]['state']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> City: </label>
										<div class="col-md-4"><?php echo $jobs[0]['city']; ?></div>
										<label class="col-md-2"> Zip/Postal Code: </label>
										<div class="col-md-4"><?php echo $jobs[0]['zip_code']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Work Experience: </label>
										<div class="col-md-4"><?php echo $jobs[0]['work_experience']; ?></div>
										<label class="col-md-2"> Salary: </label>
										<div class="col-md-4">
											<div class="col-md-7" style="padding-left:0px;"><?php echo $jobs[0]['salary']; ?></div>
											<div class="col-md-5" style="padding-left:0px;padding-right:0px;"><?php echo $jobs[0]['type_salary'] ?></div>
										</div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Comment </label>
										<div class="col-md-4">
											<button type="button" class="btn btn-default" data-toggle="modal" data-target="#CommentUsingModel">Comment</button>
										</div>
										<label class="col-md-2"> File Upload </label>
										<div class="col-md-4">
											<button type="button" class="btn btn-default" data-toggle="modal" data-target="#UploadUsingModel">Upload</button>
										</div>
									</div>
								</fieldset>
								<fieldset>
									<legend> Forecast Details </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Number of Positions: </label>
										<div class="col-md-4"><?php echo $jobs[0]['no_of_prospect']; ?></div>
										<label class="col-md-2"> Revenue per Position: </label>
										<div class="col-md-4"><?php echo $jobs[0]['revenue_per_position']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Expected Revenue: </label>
										<div class="col-md-4"><?php echo $jobs[0]['expected_revenue']; ?></div>
										<label class="col-md-2"> Actual Revenue: </label>
										<div class="col-md-4"><?php echo $jobs[0]['actual_revenue']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Missed Revenue: </label>
										<div class="col-md-4"><?php echo $jobs[0]['missed_revenue']; ?></div>
									</div>
								</fieldset>
								<fieldset>
									<legend>Description Information </legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-12"> Leads Description: </label>
										<div class="col-md-12"><?php echo $jobs[0]['prospect_description']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-12"> Requirements: </label>
										<div class="col-md-12"><?php echo $jobs[0]['requirements_details']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-12"> Other Info: </label>
										<div class="col-md-12"><?php echo $jobs[0]['prospect_other_info']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-6"> Comments: </label>
										<label class="col-md-6"> Documents: </label>
										<?php if(!empty($jobs[0]['comments'])) { ?>											
											<div class="col-md-6">
												<?php foreach ($jobs[0]['comments'] as $ck => $_cData) { ?>
													<?php if($_cData['stage_of_prospect']==1) {
														$label = 'label-primary';
													} else if($_cData['stage_of_prospect']==2) {
														$label = 'label-warning';
													} else if($_cData['stage_of_prospect']==3) {
														$label = 'label-info';
													} else if($_cData['stage_of_prospect']==4) {
														$label = 'label-danger';
													} else if($_cData['stage_of_prospect']==4) {
														$label = 'label-success';
													} else {
														$label = 'label-default';
													} ?>
													<h5 id="comments-<?php echo $_cData['pcmt_id']; ?>"><span><?php echo date('jS M Y',strtotime($_cData['pcmt_date'])); ?></span>&nbsp;&nbsp; <?php echo $_cData['comment']; ?> <span class="label <?php echo $label; ?>"><?php echo $ljp_projectStage[$_cData['stage_of_prospect']]; ?></span></h5>
												<?php } ?>
											</div>
										<?php } ?>
										<?php if(!empty($jobs[0]['documentsfile'])) { ?>
											<div class="col-md-6">
												<?php foreach ($jobs[0]['documentsfile'] as $dfk => $_dfData) { ?>
													<h5 id="documentsfile-<?php echo $_dfData['pfile_id']; ?>"><span><?php echo date('jS M Y',strtotime($_dfData['pfile_date'])); ?></span>&nbsp;&nbsp; <a href="<?php echo config_item('assets_dir').'jobs/doc/'.$_dfData['documentfile']; ?>" onclick="return !window.open(this.href)"><?php echo $_dfData['pfile_name']; ?></a></h5>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
										<input type="hidden" name="prospect_id" id="prospect_id" value="<?php echo $jobs[0]['prospect_id']; ?>">
										<a href="<?php echo site_url('sales/jobs/') ?>" class="btn btn-default">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="CommentUsingModel" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color:#3458A4;"><strong>Comment</strong></h4>
						</div>
						<?php echo form_open_multipart('sales/jobs/jobs_comment_save', array('id' =>'jobs_Comment','name'=>'jobs_Comment','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
							<div class="modal-body">
								<div class="form-group">
									<label class="col-md-4"> Stage of Job <span class="mandatory">*</span></label>
									<div class="col-md-8">
										<?php echo form_dropdown('stage_of_prospect',$ljp_projectStage,'','class="form-control" id="stage_of_prospect"') ?>
										<label id="stage_of_prospect-error" class="error" for="stage_of_prospect"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"> Comment <span class="mandatory">*</span></label>
									<div class="col-md-8">
										<textarea name="comment" id="comment" class="form-control"></textarea>
										<label id="comment-error" class="error" for="comment"></label>
									</div>
								</div>
							</div>
							<div class="modal-footer" style="clear:both;">
								<button type="submit" class="btn btn-success">Save</button>
								<button type="button" class="btn primary" data-dismiss="modal">Close</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			<div id="UploadUsingModel" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color:#3458A4;"><strong>Document Upload</strong></h4>
						</div>
						<?php echo form_open_multipart('sales/jobs/jobs_file_save', array('id' =>'jobs_file','name'=>'jobs_file','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
							<div class="modal-body">
								<div class="form-group">
									<label class="col-md-4"> Name of the File <span class="mandatory">*</span></label>
									<div class="col-md-8">
										<input type="text" name="pfile_name" id="pfile_name" value="" placeholder="File Name">
										<label id="pfile_name-error" class="error" for="pfile_name"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"> File <span class="mandatory">*</span></label>
									<div class="col-md-8">
										<input type="file" name="documentfile" id="documentfile" value="" placeholder="File">
										<label id="documentfile-error" class="error" for="documentfile"></label>
									</div>
								</div>
							</div>
							<div class="modal-footer" style="clear:both;">
								<button type="submit" class="btn btn-success">Save</button>
								<button type="button" class="btn primary" data-dismiss="modal">Close</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			$(function() {
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				$("form[name='jobs_Comment']").validate({
					rules: {
						stage_of_prospect: {
							required: true,
						},
						comment: {
							required: true,
						},
					},
					messages: {
						comment: {
							required: "Please enter comment"
						},
						stage_of_prospect: {
							required: "Please select stage of job"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('comment', $('#comment').val());
						formData.append('stage_of_prospect', $('#stage_of_prospect').val());
						formData.append('prospect_id', $('#prospect_id').val());
						$.ajax({
							url: form.action,
							type: form.method,
							async:false,
							cache:false,
							contentType:false,
							enctype:'multipart/form-data',
							processData:false,
							data: formData,
							success: function(res) {
								var resD = $.parseJSON(res);
								if(resD.status=='1'){
									$('#CommentUsingModel').modal('hide');
									$('#jobs_Comment')[0].reset();
								} else { 
									$('.error_msg').show();
									$('.error_msg').html(resD.message);
								}
							}
						});
					}
				});
				$("form[name='jobs_file']").validate({
					rules: {
						pfile_name: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						documentfile: {
							required: true,
							extension: "docx|jpeg|doc|pdf|jpg|xls|xlsx|csv|ppt|pptx",
						},
					},
					messages: {
						pfile_name: {
							required: "Please enter name",
							regex: "Special characters and Numbers are not allowed"
						},
						documentfile: {
							required: "Please select stage of job",
							extension: "Those file are allowed. Ex: docx|jpeg|doc|pdf|jpg|xls|xlsx|csv|ppt|pptx"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('pfile_name', $('#pfile_name').val());
						formData.append('prospect_id', $('#prospect_id').val());
						if($('#documentfile')[0].files[0]!==''){
							formData.append('documentfile', $('#documentfile')[0].files[0]);
						}
						$.ajax({
							url: form.action,
							type: form.method,
							async:false,
							cache:false,
							contentType:false,
							enctype:'multipart/form-data',
							processData:false,
							data: formData,
							success: function(res) {
								var resD = $.parseJSON(res);
								if(resD.status=='1'){
									$('#UploadUsingModel').modal('hide');
									$('#jobs_file')[0].reset();
								} else { 
									$('.error_msg').show();
									$('.error_msg').html(resD.message);
								}
							}
						});
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).on('click','#sendMsg',function(){
				if ($(this).is(':checked')) {
					if(!confirm('Are you sure you want send contract to client?')){
						$('#sendMsg').removeAttr('checked');
					} else {
						$.ajax({
							url: "<?php echo site_url('sales/jobs/sendcontract') ?>",
							type: 'POST',
							data: {'id':$('#prospect_id').val(),'user_id':$('#user_id').val(),'org_id':$('#org_id').val()},
							success: function(res) {
								var resD = $.parseJSON(res);
								if(resD.status!='1'){
									$('.error_msg').show();
									$('.error_msg').html(resD.message);
								}
							}
						});
					}
				} else {
					$('#sendMsg').removeAttr('checked');
				}
			});
			$(document).on('click','#recMsg',function(){
				if ($(this).is(':checked')) {
					if(!confirm('Are you sure you got confirmation from client?')){
						$('#recMsg').removeAttr('checked');
					} else {
						$.ajax({
							url: "<?php echo site_url('sales/jobs/receivecontract') ?>",
							type: 'POST',
							data: {'id':$('#prospect_id').val(),'user_id':$('#user_id').val(),'org_id':$('#org_id').val()},
							success: function(res) {
								var resD = $.parseJSON(res);
								if(resD.status!='1'){
									$('.error_msg').show();
									$('.error_msg').html(resD.message);
								}
							}
						});
					}
				} else {
					$('#recMsg').removeAttr('checked');
				}
			});
		</script>