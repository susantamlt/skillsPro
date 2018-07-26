
		<section class="content">
			<input type="hidden" name="page" id="page" value="projects" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit <?php echo $urlname; ?></h2>
							</div>
							<div id='message'></div>
							<div class="body">
								<?php echo form_open_multipart('sales/projects/projects_save', array('id' =>'projects_form','name'=>'projects_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<fieldset>
										<legend><?php echo $urlname; ?> Opening Information </legend>
										<div class="form-group">
											<label class="col-md-2"> <?php echo $urlname; ?> Title <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<input type="text" name="prospect_title" id="prospect_title" class="form-control" value="<?php echo $jobs[0]['prospect_title']; ?>" placeholder="<?php echo $urlname; ?> Title" />
												<label id="prospect_title-error" class="error" for="prospect_title"></label>
											</div>
											<label class="col-md-2"> Client Name <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('client_id',$ljp_clients,$jobs[0]['client_id'],'class="form-control" id="client_id"') ?>
												<label id="client_id-error" class="error" for="client_id"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Date Opened <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<input type="text" name="date_of_prospect" id="date_of_prospect" class="form-control datepicker" value="<?php echo date('d/m/Y',strtotime($jobs[0]['date_of_prospect'])); ?>" placeholder="dd/mm/yyyy" />
												<label id="date_of_prospect-error" class="error" for="date_of_prospect"></label>
											</div>
											<label class="col-md-2"> Target Date <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<input type="text" name="expected_date" id="expected_date" class="form-control datepicker" value="<?php echo date('d/m/Y',strtotime($jobs[0]['expected_date'])); ?>" placeholder="dd/mm/yyyy" />
												<label id="expected_date-error" class="error" for="expected_date"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> <?php echo $urlname; ?> Type <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('lead_type',$ljp_leadtype,$jobs[0]['lead_type'],'class="form-control" id="lead_type"') ?>
												<label id="lead_type-error" class="error" for="lead_type"></label>
											</div>
											<label class="col-md-2"> <?php echo $urlname; ?> Status <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('lead_status',$ljp_status,$jobs[0]['lead_status'],'class="form-control" id="lead_status"') ?>
												<label id="lead_status-error" class="error" for="lead_status"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Country <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('country_code',$ljp_country,$jobs[0]['country_code'],'class="form-control" id="country_code"') ?>
												<label id="country_code-error" class="error" for="country_code"></label>
											</div>
											<label class="col-md-2"> State/Province <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('state_code',$ljp_state,$jobs[0]['state_code'],'class="form-control" id="state_code"') ?>
												<label id="state_code-error" class="error" for="state_code"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> City <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('city_id',$ljp_city,$jobs[0]['city_id'],'class="form-control" id="city_id"') ?>
												<label id="city_id-error" class="error" for="city_id"></label>
											</div>
											<label class="col-md-2"> Zip/Postal Code <span class="mandatory">*</span></label>
											<div class="col-md-4">
												<input type="text" name="zip_code" id="zip_code" class="form-control" value="<?php echo $jobs[0]['zip_code']; ?>" placeholder="Zip/Postal Code" />
												<label id="zip_code-error" class="error" for="zip_code"></label>
											</div>
										</div>
										<div class="form-group">
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
										<div class="form-group">
											<label class="col-md-2"> Approximate Contract Value </label>
											<div class="col-md-4">
												$<input type="text" name="expected_revenue" id="expected_revenue" class="form-control" value="<?php echo $jobs[0]['expected_revenue']; ?>" placeholder="0" style="display:inline-block;width:97%" />
												<label id="expected_revenue-error" class="error" for="expected_revenue"></label>
											</div>
											<label class="col-md-2"> Client Budget </label>
											<div class="col-md-4">
												$<input type="text" name="actual_revenue" id="actual_revenue" class="form-control" value="<?php echo $jobs[0]['actual_revenue']; ?>" placeholder="0" style="display:inline-block;width:97%" />
												<label id="actual_revenue-error" class="error" for="actual_revenue"></label>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<legend>Description Information </legend>
										<div class="form-group">
											<label class="col-md-12"> <?php echo $urlname; ?> Description <span class="mandatory">*</span></label>
											<div class="col-md-12">
												<textarea name="prospect_description" id="prospect_description" class="form-control"><?php echo $jobs[0]['prospect_description']; ?></textarea>
												<label id="j_title-error" class="error" for="j_title"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-12"> Technical Requirements <span class="mandatory">*</span></label>
											<div class="col-md-12">
												<textarea name="requirements_details" id="requirements_details" class="form-control"><?php echo $jobs[0]['requirements_details']; ?></textarea>
												<label id="requirements_details-error" class="error" for="requirements_details"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-12"> Other Info </label>
											<div class="col-md-12">
												<textarea name="prospect_other_info" id="prospect_other_info" class="form-control"><?php echo $jobs[0]['prospect_other_info']; ?></textarea>
												<label id="prospect_other_info-error" class="error" for="prospect_other_info"></label>
											</div>
										</div>
									</fieldset>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<input type="hidden" name="prospect_id" id="prospect_id" value="<?php echo $jobs[0]['prospect_id']; ?>">
											<input type="hidden" name="pro_job" id="pro_job" value="<?php echo $jobs[0]['pro_job']; ?>" />
											<button type="submit" class="btn btn-success"> Update </button>
											<a href="<?php echo site_url('sales/jobs/') ?>" class="btn btn-default">Cancel</a>
										</div>
									</div>
								<?php echo form_close(); ?>
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
						<?php echo form_open_multipart('sales/projects/projects_comment_save', array('id' =>'jobs_Comment','name'=>'jobs_Comment','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
							<div class="modal-body">
								<div class="form-group">
									<label class="col-md-4"> Stage of Project <span class="mandatory">*</span></label>
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
						<?php echo form_open_multipart('sales/projects/projects_file_save', array('id' =>'jobs_file','name'=>'jobs_file','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
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
								<button type="submit" class="btn btn-success">Update</button>
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
				$("form[name='projects_form']").validate({
					rules: {
						prospect_title: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						client_id: {
							required: true,
						},
						date_of_prospect: {
							required: true,
							regex: /^\d{2}\/\d{2}\/\d{4}$/,
						},
						expected_date: {
							required: true,
							regex: /^\d{2}\/\d{2}\/\d{4}$/,
						},
						lead_type: {
							required: true,
						},
						lead_status: {
							required: true,
						},
						country_code: {
							required: true,
						},						
						state_code: {
							required: true,
						},
						city_id: {
							required: true,
						},
						zip_code: {
							required: true,
						},
						prospect_description: {
							required: true,
						},
						requirements_details: {
							required: true,
						},
						prospect_other_info: {
							required: true,
						},
						expected_revenue: {
							regex: /^(\d*\.)?\d+$/
						},
						actual_revenue: {
							regex: /^(\d*\.)?\d+$/
						},    
					},
					messages: {
						prospect_title: {
							required: "Please enter name",
							regex: "Special characters and Numbers are not allowed"
						},
						client_id: {
							required: "Please select client"
						},
						date_of_prospect: {
							required: "Please enter date opened",
							regex: "Special characters and Numbers are not allowed"
						},
						expected_date: {
							required: "Please enter target date"
						},
						lead_type: {
							required: "Please select job type"
						},
						lead_status: {
							required: "Please select job status"
						},
						country_code: {
							required: "Please select country"
						},      
						state_code: {
							required: "Please enter state"
						},
						city_id: {
							required: "Please enter city"
						},
						zip_code: {
							required: "Please enter zipcode"
						},
						prospect_description: {
							required: "Please enter description",
							regex: "Special characters are not allowed"
						},
						requirements_details: {
							required: "Please enter requirement details",
							regex: "Special characters are not allowed"
						},
						prospect_other_info: {
							regex: "Special characters are not allowed"
						},
						expected_revenue: {
							regex: "Special characters are not allowed"
						},
						actual_revenue: {
							regex: "Special characters are not allowed"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						if($('#date_of_prospect').val()!=''){
							var dates = $('#date_of_prospect').val();
							var datesOP = dates.split("/");
							var neDateOP = datesOP[2]+'-'+datesOP[1]+'-'+datesOP[0];
						}
						if($('#expected_date').val()!=''){
							var datesE = $('#expected_date').val();
							var datesED = datesE.split("/");
							var neDateED = datesED[2]+'-'+datesED[1]+'-'+datesED[0];
						}
						var prospect_description = CKEDITOR.instances.prospect_description.getData();
						var requirements_details = CKEDITOR.instances.requirements_details.getData();
						var prospect_other_info = CKEDITOR.instances.prospect_other_info.getData();
						formData.append('prospect_id', $('#prospect_id').val());
						formData.append('prospect_title', $('#prospect_title').val());
						formData.append('client_id', $('#client_id').val());
						formData.append('date_of_prospect', neDateOP);
						formData.append('expected_date',neDateED);
						formData.append('lead_type', $('#lead_type').val());
						formData.append('lead_status', $('#lead_status').val());
						formData.append('country_code', $('#country_code').val());
						formData.append('state_code', $('#state_code').val());
						formData.append('city_id', $('#city_id').val());
						formData.append('zip_code', $('#zip_code').val());
						formData.append('expected_revenue', $('#expected_revenue').val());
						formData.append('actual_revenue', $('#actual_revenue').val());
						formData.append('pro_job', $('#pro_job').val());
						formData.append('prospect_description', prospect_description);
						formData.append('requirements_details', requirements_details);
						formData.append('prospect_other_info', prospect_other_info);
						formData.append('user_id', $('#user_id').val());
						formData.append('org_id', $('#org_id').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> The value successfully insert.</div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('sales/projects') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This value already exists in the list.</div>';
									$('#massage').html(html);
									$('.error_msg').show();
									$('.error_msg').html(res.message);
								}
							}
						});
					}
				});
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
									var pcmt_id = $('#pcmt_id').val();
									if(pcmt_id!=''){
										var pcmt_idN = pcmt_id+','+resD.pcmtid;
										$('#pcmt_id').val(pcmt_idN);
									} else {
										$('#pcmt_id').val(resD.pcmtid);
									}
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
									var pcmt_id = $('#pfile_id').val();
									if(pcmt_id!=''){
										var pcmt_idN = pcmt_id+','+resD.pfileid;
										$('#pfile_id').val(pcmt_idN);
									} else {
										$('#pfile_id').val(resD.pfileid);
									}
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
		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script type="text/javascript">
			CKEDITOR.replace( 'prospect_description' );
			CKEDITOR.replace( 'requirements_details' );
			CKEDITOR.replace( 'prospect_other_info' );
			CKEDITOR.replace( 'reason' );
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('assets_dir');?>css/bootstrap-datepicker.css" />
		<script type="text/javascript" src="<?php echo config_item('assets_dir');?>js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
			$(function () {
				$('.datepicker').datepicker({
					format: 'dd/mm/yyyy',
				});
			});
		</script>
		<script type="text/javascript">
			$(document).on('change','#country_code',function(){
				var country_code = $(this).val();
				var formData = new FormData();
				formData.append('country_code', country_code);
				if(country_code!=''){
					$.ajax({
						url: "<?php echo base_url('country/statelist/'); ?>",
						type: "POST",
						async:false,
						cache:false,
						contentType:false,
						enctype:'multipart/form-data',
						processData:false,
						data: formData,
						success: function(res) {
							var resD = $.parseJSON(res);
							if(resD.status=='1'){
								var htmlSelect = '';
								$.each(resD.state, function(k, v) {
									htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
								});
								$("#state_code").replaceWith('<select name="state_code" id="state_code" class="form-control">'+ htmlSelect +'</select>');
							} else { 
								$("#zip_code").replaceWith('<input name="state_code" id="state_code" type="text" class="form-control" value="" placeholder="State/Province" />');
							}
						}
					});
				}
			});
			$(document).on('change','#state_code',function(){
				var state_code = $(this).val();
				var formData = new FormData();
				formData.append('state_code', state_code);
				if(state_code!=''){
					$.ajax({
						url: "<?php echo base_url('country/citylist/'); ?>",
						type: "POST",
						async:false,
						cache:false,
						contentType:false,
						enctype:'multipart/form-data',
						processData:false,
						data: formData,
						success: function(res) {
							var resD = $.parseJSON(res);
							if(resD.status=='1'){
								var htmlSelect = '<option value="">--Select One--</option>';
								$.each(resD.city, function(k, v) {
									if(k!=''){
										htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
									}
								});
								$("#city_id").replaceWith('<select name="city_id" id="city_id" class="form-control">'+ htmlSelect +'</select>');
							} else { 
								$("#zip_code").replaceWith('<input name="city_id" id="city_id" type="text" class="form-control" value="" placeholder="City" />');
							}
						}
					});
				}
			});
			$(document).on('change','#city_id',function(){
				var city_id = $(this).val();
				var formData = new FormData();
				formData.append('city', $("#city_id option:selected").text());
				formData.append('state_code', $('#state_code').val());
				if(city_id!=''){
					$.ajax({
						url: "<?php echo base_url('country/ziplist/'); ?>",
						type: "POST",
						async:false,
						cache:false,
						contentType:false,
						enctype:'multipart/form-data',
						processData:false,
						data: formData,
						success: function(res) {
							var resD = $.parseJSON(res);
							if(resD.status=='1'){
								var htmlSelect = '<option value="">--Select One--</option>';
								$.each(resD.zip, function(k, v) {
									if(k!=''){
										htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
									}
								});
								$("#zip_code").replaceWith('<select name="zip_code" id="zip_code" class="form-control">'+ htmlSelect +'</select>');
							} else { 
								$("#zip_code").replaceWith('<input name="zip_code" id="zip_code" type="text" class="form-control" value="" placeholder="Zip/Postal Code" />');
							}
						}
					});
				}
			});
			$(document).on('change','#client_id',function(){
				var client_id = $(this).val();
				var formData = new FormData();
				formData.append('client_id', client_id);
				if(client_id!=''){
					$.ajax({
						url: "<?php echo base_url('sales/projects/contactdetails'); ?>",
						type: "POST",
						async:false,
						cache:false,
						contentType:false,
						enctype:'multipart/form-data',
						processData:false,
						data: formData,
						success: function(res) {
							var resD = $.parseJSON(res);
							var htmlSelect = '<option value="">--Select One--</option>';
							if(resD.status=='1'){
								$.each(resD.catid, function(k, v) {
									if(k!=''){
										htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
									}
								});
							}
							$("#cat_id").html(htmlSelect);
						}
					});
				}
			});
		</script>