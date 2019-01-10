		<section class="content">
			<input type="hidden" name="page" id="page" value="requirements" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header" style="border-bottom:none;">
								<h2 class="col-md-6" style="padding:0px;">Contracter Details</h2>
								<div class="col-md-6" style="padding:0px; text-align:right;">
									 <a href="javascript:void(0)"class="btn btn-info btn_client" data-toggle="modal" data-target="#shortlist">Short List</a>
								</div>
							</div>
							<div class="body">
								<fieldset>
									<legend>General Information </legend>
									<div class="form-group" style="clear:both;">
										<h2 class="col-md-12"><?php echo $data['name']; ?></h2>
										<label class="col-md-12"><?php echo $data['city'].','.$data['state_code']; ?></label>
										<label class="col-md-12"><?php echo 'Resume Key: '.$data['post_id']; ?></label>
									</div>
								</fieldset>
								<fieldset>
									<legend>Details:</legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2">Job Name:</label>
										<div class="col-md-10"><?php echo $data['jobname']; ?></div>
										<label class="col-md-2">Job Info:</label>
										<div class="col-md-10"><?php echo $data['jobinfo']; ?></div>
										<label class="col-md-2">Url:</label>
										<div class="col-md-10"><a href="<?php echo $data['job_url']; ?>" onclick="return !window.open(this.href)"><?php echo $data['jobname']; ?></a></div>
									</div>
								</fieldset>
								<div class="form-group" style="clear:both;">
									<div class="col-md-12">
										<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['recruiter_user_id']; ?>">
										<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
										<input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $data['requirement_id']; ?>">
										<a href="<?php echo site_url('recruiter/requirements') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<style type="text/css">
			label {font-weight:normal;}
			div.card div.header h2,div.body fieldset h2{font-size:21px;font-weight:normal;}
		</style>
		<div id="shortlist" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" style="color:#3458A4;"><strong>Add Contracter</strong></h4>
					</div>
					<?php echo form_open_multipart('recruiter/requirements/contracter_save_data', array('id' =>'contracter_form','name'=>'contracter_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
						<div class="modal-body">
							<input type="hidden" name="ph_no" id="ph_no" value="">
							<div class="form-group">
								<label class="col-md-4"> Name <span class="mandatory">*</span></label>
								<div class="col-md-8">
									<input type="text" name="contractor_name" id="contractor_name" class="form-control" value="<?php echo $data['name']; ?>" />
									<label id="contractor_name-error" class="error" for="contractor_name"></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4"> Phone </label>
								<div class="col-md-8">
									<input type="text" name="phone_1" id="phone_1" class="form-control" value="<?php echo $data['phone']; ?>" />
									<label id="phone_1-error" class="error" for="phone_1"></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4"> E-mail </label>
								<div class="col-md-8">
									<input type="text" name="email_1" id="email_1" class="form-control" value="<?php echo $data['email']; ?>" />
									<label id="email_1-error" class="error" for="email_1"></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4"> Location <span class="mandatory">*</span></label>
								<div class="col-md-8">
									<input type="text" name="location" id="location" class="form-control" value="<?php echo $data['city'].','.$data['state_code']; ?>" />
									<label id="location-error" class="error" for="location"></label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4"> Details <span class="mandatory">*</span></label>
								<div class="col-md-8">
									<?php $htmlNew='';
										$htmlNew .='<h2><strong>Job Name</strong></h2>';
										$htmlNew .='<p>'.$data['jobname'].'</p>';
										$htmlNew .='<h2><strong>Job Info</strong></h2>';
										$htmlNew .='<p>'.$data['jobinfo'].'</p>';
									?>
									<textarea name="details" id="details" class="form-control"><?php echo $htmlNew; ?></textarea>
									<label id="details-error" class="error" for="details"></label>
								</div>
							</div>
								
						</div>
						<div class="modal-footer" style="clear:both;">
							<input type="hidden" name="resumekey" id="resumekey" value="<?php echo $data['post_id']; ?>" />
							<input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $data['requirement_id']; ?>" />
							<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['recruiter_user_id']; ?>">
							<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
							<button type="submit" class="btn btn-success">Save</button>
							<button type="button" class="btn primary" data-dismiss="modal">Close</button>
						</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script type="text/javascript">
			CKEDITOR.replace( 'details' );
		</script>
		<script type="text/javascript">
			$(function() {
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				$("form[name='contracter_form']").validate({
					rules: {
						contractor_name: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						newtype: {
							required: true,
							regex:/^[a-zA-Z/ ]*$/,
						},
						location: {
							required: true,
							regex:/^[a-zA-Z, ]*$/,
						},
						details: {
							required: true,
						},
					},
					messages: {
						contractor_name: {
							required: "Please enter name",
							regex: "Special characters and Numbers are not allowed"
						},
						newtype: {
							required: "Please enter type",
							regex: "Special characters and Numbers are not allowed"
						}, 
						location: {
							required: "Please enter location",
							regex: "Special characters and Numbers are not allowed"
						}, 
						details: {
							required: "Please enter Details"
						}, 
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var details = CKEDITOR.instances.details.getData();
						var formData = new FormData();
						formData.append('contractor_name', $('#contractor_name').val());
						formData.append('newtype', $('#newtype').val());
						formData.append('location', $('#location').val());
						formData.append('details', details);
						formData.append('user_id', $('#user_id').val());
						formData.append('resumekey', $('#resumekey').val());
						formData.append('phone_1', $('#phone_1').val());
						formData.append('email_1', $('#email_1').val());
						formData.append('org_id', $('#org_id').val());
						formData.append('requirement_id', $('#requirement_id').val());
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
									$('.modal-backdrop').removeClass('in');
									$('#shortlist').modal('hide');
								}
							}
						});
					}
				});
			});
		</script>