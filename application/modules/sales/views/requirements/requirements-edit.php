<section class="content">
			<input type="hidden" name="page" id="page" value="requirements" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit Requirments</h2>
								<div id="massage"></div>
							</div>
							<div class="body">
								<?php echo form_open_multipart('sales/requirements/requirements_save', array('id'=>'requirments_form','name'=>'requirments_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> No of Requirement<span class="mandatory" style="color: red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="no_of_requirement" id="no_of_requirement" class="form-control" value="<?php echo $ljp_data[0]['no_of_requirement']; ?>" placeholder="No of Requirement" />
											<label id="no_of_requirement-error" class="error" for="no_of_requirement"></label>
										</div>
										<label class="col-md-2"> Prospect Title </label>
										<div class="col-md-4"><?php echo $ljp_data[0]['prospect_title']; ?></div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> No of Requirement Fullfilled</label>
										<div class="col-md-4">
											<input type="text" name="no_requirement_fullfilled" id="no_requirement_fullfilled" class="form-control" value="<?php echo $ljp_data[0]['no_requirement_fullfilled']; ?>" placeholder="No of Requirement Fullfilled" />
											<label id="no_requirement_fullfilled-error" class="error" for="no_requirement_fullfilled"></label>
										</div>
										<label class="col-md-2"> Proposed Rate </label>
										<div class="col-md-4">
											<input type="text" name="proposed_hourly_rate" id="proposed_hourly_rate" class="form-control" value="<?php echo $ljp_data[0]['proposed_hourly_rate']; ?>" placeholder="Proposed Rate" />
											<label id="proposed_hourly_rate-error" class="error" for="proposed_hourly_rate"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> Final Rate </label>
										<div class="col-md-4">
											<input type="text" name="final_hourly_rate" id="final_hourly_rate" class="form-control" value="<?php echo $ljp_data[0]['final_hourly_rate']; ?>" placeholder="Final Rate" />
											<label id="final_hourly_rate" class="error" for="final_hourly_rate"></label>
										</div>
										<label class="col-md-2"> Final Comments on Requirement </label>
										<div class="col-md-4">
											<input type="text" name="final_comments_on_requirement" id="final_comments_on_requirement" class="form-control" value="<?php echo $ljp_data[0]['final_comments_on_requirement']; ?>" placeholder="Final Comments on Requirement" />
											<label id="final_comments_on_requirement-error" class="error" for="final_comments_on_requirement"></label>
										</div>
									</div>	
									<div class="form-group demo-masked-input">
										<label class="col-md-2">Requirement Status </label>
										<div class="col-md-4">
											<?php $array= array(''=>'--Select One--','FU'=>'Full Filled','PF'=>'Partially Filled','VA'=>'Vacant'); ?>
											<?php echo form_dropdown('requirement_status',$array,$ljp_data[0]['requirement_status'],'class="form-control" id="requirement_status"') ?>
											<label id="requirement_status_error" class="error" for="requirement_status"></label>
										</div>
										<label class="col-md-2"> Expected Date of Closure </label>
										<div class="col-md-4">
											<input type="text" name="expected_date_of_closure" id="expected_date_of_closure" class="form-control date" value="<?php echo date('m/d/Y',strtotime($ljp_data[0]['expected_date_of_closure'])); ?>" placeholder="Expected Date of Closure"/>
											<label id="expected_date_of_closure-error" class="error" for="expected_date_of_closure"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-12"> Requirement </label>
										<div class="col-md-12">
											<textarea name="requirement" id="requirement" class="form-control" placeholder="Requirement"><?php echo $ljp_data[0]['requirement']; ?></textarea>
											<label id="requirement-error" class="error" for="requirement"></label>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $ljp_data[0]['requirement_id'];?>">
											<button type="submit" class="btn btn-success"> Update </button>
											<a href="<?php echo site_url('sales/requirements/') ?>" class="btn btn-default">Cancel</a>
										</div>
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script type="text/javascript">
			CKEDITOR.replace( 'requirement' );
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
				$("form[name='requirments_form']").validate({
					rules: {
						prospect_title: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						no_of_requirement: {
							required: true,
							number: true,
							maxlength:5,
							regex: /^[0-9]*$/,
						},
						no_requirement_fullfilled: {
							required: false,
							number: true,
							maxlength: 5,
							regex: /^[0-9]*$/,
             			},
             			proposed_hourly_rate: {
             				number:true,
             				//regex:/^\$(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/,
             			},
             			final_hourly_rate: {
             				number:true,
             				//regex:/^\$(\d{1,3}(\,\d{3})*|(\d+))(\.\d{2})?$/,
             			},
             		},
             		messages: {
						prospect_title: {
							required: "Please enter prospect title",
							regex: "Special character and Number not allowed"
						},
						no_of_requirement:{
							required: "Please enter No of requirements",
							number:"Please Enter number",
							regex: "Special character and alphabets notallowed",
							maxlength: "Number maximum 5 digits allowed"
						},
						no_requirement_fullfilled: {
							required: "Please enter no of requirements fullfilled.",
							number: "Please enter number.",
							regex: "Special character and alphabets notallowed",
							maxlength: "Number maximum 5 digits allowed"
						},
						proposed_hourly_rate: {
							regex: "Please enter valid ammount.",
							number: "Alphabets not allowed",
						},
						final_hourly_rate: {
							regex: "Please enter a valid ammount.",
							number: "Alphabets not allowed",
						},
						primary_email: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						},
						secoundary_email: {
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						},
						job_titlt: {
							required: "Please enter job title",
							regex: "Special character and Number not allowed"
						},
						address: {
							required: "Please enter Address."
						},
						fax_no: {
							regex:"Enter valid fax number"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var requirement = CKEDITOR.instances.requirement.getData();
						var formData = new FormData();
						var noofreq=$('#no_of_requirement').val();
						var noofreqfulfld=$('#no_requirement_fullfilled').val();
						 if(noofreqfulfld!='' && noofreq!='' && noofreqfulfld>noofreq)
					      {
					       $("#no_requirement_fullfilled-error").show().html('Requirment fullfilled should not be greater than Requirement').delay(10000).fadeOut();
					       $('#no_requirement_fullfilled').val(noofreq);
					       return false;
					      }
						formData.append('requirement_id', $('#requirement_id').val());
						formData.append('org_id', $('#org_id').val());
						formData.append('user_id', $('#user_id').val());
						formData.append('no_of_requirement', $('#no_of_requirement').val());
						formData.append('no_requirement_fullfilled', $('#no_requirement_fullfilled').val());
						formData.append('proposed_hourly_rate', $('#proposed_hourly_rate').val());
						formData.append('final_hourly_rate', $('#final_hourly_rate').val());
						formData.append('final_comments_on_requirement', $('#final_comments_on_requirement').val());
						formData.append('requirement_status', $('#requirement_status').val());
						formData.append('expected_date_of_closure', $('#expected_date_of_closure').val());
						formData.append('requirement', requirement);
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> The value update successfully .</div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('sales/requirements') ?>";
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
			});
		</script>
		<!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
          var $demoMaskedInput = $('.demo-masked-input');
          //Date
          $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
          //Time
          $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:__ _m', alias: 'time12', hourFormat: '12' });
        </script>