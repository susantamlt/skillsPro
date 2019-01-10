
		<section class="content">
			<input type="hidden" name="page" id="page" value="jobs" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add <?php echo $urlname; ?></h2>
							</div>
							<div id="message"></div>
							<div class="body">
								<?php echo form_open_multipart('sales/jobs/jobs_save', array('id' =>'jobs_form','name'=>'jobs_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<fieldset>
										<legend><?php echo $urlname; ?> Opening Information </legend>
										<div class="form-group">
											<label class="col-md-2"> <?php echo $urlname; ?> Title <span class="mandatory"style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="prospect_title" id="prospect_title" class="form-control" value="" placeholder="<?php echo $urlname; ?> Title" />
												<label id="prospect_title-error" class="error" for="prospect_title"></label>
											</div>
											<label class="col-md-2"> Client Name <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('client_id',$ljp_clients,'','class="form-control" id="client_id"') ?>
												<label id="client_id-error" class="error" for="client_id"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Date Opened <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="date_of_prospect" id="date_of_prospect" class="form-control datepicker" value="" placeholder="dd/mm/yyyy" />
												<label id="date_of_prospect-error" class="error" for="date_of_prospect"></label>
											</div>
											<label class="col-md-2"> Target Date <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="expected_date" id="expected_date" class="form-control datepicker" value="" placeholder="dd/mm/yyyy" />
												<label id="expected_date-error" class="error" for="expected_date"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> <?php echo $urlname; ?> Type <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('lead_type',$ljp_leadtype,'','class="form-control" id="lead_type"') ?>
												<label id="lead_type-error" class="error" for="lead_type"></label>
											</div>
											<label class="col-md-2"> <?php echo $urlname; ?> Status <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('lead_status',$ljp_status,'','class="form-control" id="lead_status"') ?>
												<label id="lead_status-error" class="error" for="lead_status"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Domain Type <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('cat_id',$ljp_catid,'','class="form-control" id="cat_id"') ?>
												<label id="cat_id-error" class="error" for="cat_id"></label>
											</div>
											<label class="col-md-2"> Category <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('prospect_type_id',$ljp_industry,'','class="form-control" id="prospect_type_id"') ?>
												<label id="prospect_type_id-error" class="error" for="prospect_type_id"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Country <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('country_code',$ljp_country,'','class="form-control" id="country_code"') ?>
												<label id="country_code-error" class="error" for="country_code"></label>
											</div>
											<label class="col-md-2"> State/Province <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="state_code" id="state_code" class="form-control" value="" placeholder="State/Province" />
												<label id="state_code-error" class="error" for="state_code"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> City <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="city_id" id="city_id" class="form-control" value="" placeholder="City" />
												<label id="city_id-error" class="error" for="city_id"></label>
											</div>
											<label class="col-md-2"> Zip/Postal Code <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="zip_code" id="zip_code" class="form-control" value="" placeholder="Zip/Postal Code" />
												<label id="zip_code-error" class="error" for="zip_code"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Work Experience </label>
											<div class="col-md-4">
												<input type="text" name="work_experience" id="work_experience" class="form-control" value="" placeholder="Work Experience" />
												<label id="work_experience-error" class="error" for="work_experience"></label>
											</div>
											<label class="col-md-2"> Salary </label>
											<div class="col-md-4">
												<div class="col-md-7" style="padding-left:0px;">
													<input type="text" name="salary" id="salary" class="form-control" value="" placeholder="Salary" />
													<label id="salary-error" class="error" for="salary"></label>
												</div>
												<div class="col-md-5" style="padding-left:0px;padding-right:0px;">
													<?php echo form_dropdown('type_salary',$ljp_typeSalary,'','class="form-control" id="type_salary"') ?>
													<label id="type_salary-error" class="error" for="type_salary"></label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Comment </label>
											<div class="col-md-4">
												<input id="pcmt_id" name="pcmt_id" type="hidden" value="" />
												<button type="button" class="btn btn-default" data-toggle="modal" data-target="#CommentUsingModel">Comment</button>
											</div>
											<label class="col-md-2"> File Upload </label>
											<div class="col-md-4">
												<input id="pfile_id" name="pfile_id" type="hidden" value="" />
												<button type="button" class="btn btn-default"  data-toggle="modal" data-target="#UploadUsingModel">Upload</button>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<legend> Forecast Details </legend>
										<div class="form-group">
											<label class="col-md-2"> Number of Positions <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="no_of_prospect" id="no_of_prospect" class="form-control" value="" placeholder="Number of Positions" />
												<label id="no_of_prospect-error" class="error" for="no_of_prospect"></label>
											</div>
											<label class="col-md-2"> Revenue per Position </label>
											<div class="col-md-4">
												$<input type="text" name="revenue_per_position" id="revenue_per_position" class="form-control" value="" placeholder="0" style="display:inline-block;width:97%" />
												<label id="revenue_per_position-error" class="error" for="revenue_per_position"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Expected Revenue </label>
											<div class="col-md-4">
												$<input type="text" name="expected_revenue" id="expected_revenue" class="form-control" value="" placeholder="0" style="display:inline-block;width:97%" />
												<label id="expected_revenue-error" class="error" for="expected_revenue"></label>
											</div>
											<label class="col-md-2"> Actual Revenue </label>
											<div class="col-md-4">
												$<input type="text" name="actual_revenue" id="actual_revenue" class="form-control" value="" placeholder="0" style="display:inline-block;width:97%" />
												<label id="actual_revenue-error" class="error" for="actual_revenue"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2"> Missed Revenue </label>
											<div class="col-md-4">
												$<input type="text" name="missed_revenue" id="missed_revenue" class="form-control" value="" placeholder="0" style="display:inline-block;width:97%" />
												<label id="missed_revenue-error" class="error" for="missed_revenue"></label>
											</div>
										</div>
									</fieldset>
									<fieldset>
										<legend>Description Information </legend>
										<div class="form-group">
											<label class="col-md-12"> Jobs Description <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-12">
												<textarea name="prospect_description" id="prospect_description" class="form-control"></textarea>
												<label id="j_title-error" class="error" for="j_title"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-12"> Requirements <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-12">
												<textarea name="requirements_details" id="requirements_details" class="form-control"></textarea>
												<label id="requirements_details-error" class="error" for="requirements_details"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-12"> Other Info </label>
											<div class="col-md-12">
												<textarea name="prospect_other_info" id="prospect_other_info" class="form-control"></textarea>
												<label id="prospect_other_info-error" class="error" for="prospect_other_info"></label>
											</div>
										</div>
									</fieldset>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
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
						<?php echo form_open_multipart('sales/jobs/jobs_comment_save', array('id' =>'jobs_Comment','name'=>'jobs_Comment','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
							<div class="modal-body">
								<div class="form-group">
									<label class="col-md-4"> Stage of Job <span class="mandatory" style="color: red">*</span></label>
									<div class="col-md-8">
										<?php echo form_dropdown('stage_of_prospect',$ljp_projectStage,'','class="form-control" id="stage_of_prospect"') ?>
										<label id="stage_of_prospect-error" class="error" for="stage_of_prospect"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"> Comment <span class="mandatory" style="color: red">*</span></label>
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
									<label class="col-md-4"> Name of the File <span class="mandatory" style="color: red">*</span></label>
									<div class="col-md-8">
										<input type="text" name="pfile_name" id="pfile_name" value="" placeholder="File Name">
										<label id="pfile_name-error" class="error" for="pfile_name"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"> File <span class="mandatory" style="color: red">*</span></label>
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
				$("form[name='jobs_form']").validate({
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
						cat_id : {
							required: false,
						},
						prospect_type_id : {
							required: false,
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
						work_experience: {
							number:true,
							maxlength:2,
						},
						salary: {
							regex: /^(\d*\.)?\d+$/
						},
						type_salary: {
							required: function(element){
								return $("#salary").val()!="";
							}
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
						reason: {
							required: true,
						},
						no_of_prospect: {
							required: true,
							number: true,
							maxlength:4,
						},
						revenue_per_position: {
							regex: /^(\d*\.)?\d+$/
						},
						expected_revenue: {
							regex: /^(\d*\.)?\d+$/
						},
						actual_revenue: {
							regex: /^(\d*\.)?\d+$/
						},
						missed_revenue: {
							regex: /^(\d*\.)?\d+$/
						},     
					},
					messages: {
						prospect_title: {
							required: "Please enter job title",
							regex: "Special characters and Numbers are not allowed"
						},
						client_id: {
							required: "Please select client name"
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
						cat_id : {
							required: "Please select domin type"
						},
						prospect_type_id : {
							required: "Please select category"
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
						work_experience:{
							regex: "Special characters are not allowed"
						},
						salary: {
							regex: "Special characters are not allowed"
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
						no_of_prospect: {
							required: "Please enter number of positions",
							regex: "Special characters are not allowed"
						},
						revenue_per_position: {
							regex: "Special characters are not allowed"
						},
						expected_revenue: {
							regex: "Special characters are not allowed"
						},
						actual_revenue: {
							regex: "Special characters are not allowed"
						},
						missed_revenue: {
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
						formData.append('prospect_title', $('#prospect_title').val());
						formData.append('client_id', $('#client_id').val());
						formData.append('date_of_prospect', neDateOP);
						formData.append('expected_date',neDateED);
						formData.append('lead_type', $('#lead_type').val());
						formData.append('lead_status', $('#lead_status').val());
						formData.append('cat_id', $('#cat_id').val());
						formData.append('prospect_type_id', $('#prospect_type_id').val());
						formData.append('country_code', $('#country_code').val());
						formData.append('state_code', $('#state_code').val());
						formData.append('city_id', $('#city_id').val());
						formData.append('zip_code', $('#zip_code').val());
						formData.append('work_experience', $('#work_experience').val());
						formData.append('salary', $('#salary').val());
						formData.append('type_salary', $('#type_salary').val());
						formData.append('no_of_prospect', $('#no_of_prospect').val());
						formData.append('revenue_per_position', $('#revenue_per_position').val());
						formData.append('expected_revenue', $('#expected_revenue').val());
						formData.append('actual_revenue', $('#actual_revenue').val());
						formData.append('missed_revenue', $('#missed_revenue').val());
						formData.append('prospect_description', prospect_description);
						formData.append('requirements_details', requirements_details);
						formData.append('prospect_other_info', prospect_other_info);
						formData.append('pfile_id', $('#pfile_id').val());
						formData.append('pcmt_id', $('#pcmt_id').val());
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
									window.setTimeout(function () {
										var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> The value successfully insert.</div>';
									$('#massage').html(html);
										location.href = "<?php echo site_url('sales/jobs') ?>";
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
						url: "<?php echo base_url('sales/jobs/contactdetails'); ?>",
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
			$(document).on('change','#cat_id',function(){
				var cat_id = $(this).val();
				var formData = new FormData();
				formData.append('cat_id', cat_id);
				if(cat_id!=''){
					$.ajax({
						url: "<?php echo base_url('sales/jobs/indtype'); ?>",
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
								$.each(resD.indtype, function(k, v) {
									if(k!=''){
										htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
									}
								});
							}
							$("#prospect_type_id").html(htmlSelect);
						}
					});
				}
			});
		</script>