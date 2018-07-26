<section class="content">
			<input type="hidden" name="page" id="page" value="clients" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit Clients</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('sales/clients/clients_save', array('id'=>'clients_form','name'=>'clients_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Contact Name </label>
										<div class="col-md-4">
										    <input type="text" name="contact_name" id="contact_name" class="form-control" value="<?php echo $ljp_data[0]['contact_name']; ?>" placeholder="Contact Name" />
											<label id="contact_name-error" class="error" for="contact_name"></label>
										</div>
										<label class="col-md-2">Decision Maker Name</label>
										<div class="col-md-4">
											<input type="text" name="decision_maker_name" id="decision_maker_name" class="form-control" value="<?php echo $ljp_data[0]['decision_maker_name']; ?>" placeholder="Decision Maker Name" />
											<label id="decision_maker_name-error" class="error" for="dicision_maker_name"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> Primary Phone Number</label>
										<div class="col-md-4">
											<input type="text" name="primary_phone_no" id="primary_phone_no" class="form-control" value="<?php echo $ljp_data[0]['phone_1']; ?>" placeholder="Phone No 1" />
											<label id="primary_phone_no-error" class="error" for="primary_phone_no"></label>
										</div>
										<label class="col-md-2"> Secondary Phone number </label>
										<div class="col-md-4">
											<input type="text" name="secondary_phone_no" id="secondary_phone_no" class="form-control" value="<?php echo $ljp_data[0]['phone_2']; ?>" placeholder="Phone No 2" />
											<label id="secondary_phone_no-error" class="error" for="secondary_phone_no"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> Primary Email-ID </label>
										<div class="col-md-4">
											<input type="text" name="primary_email" id="primary_email" class="form-control" value="<?php echo $ljp_data[0]['email_1']; ?>" placeholder="Primary Email-ID" />
											<label id="primary_email-error" class="error" for="primary_email"></label>
										</div>
										<label class="col-md-2"> Secoundary Email-ID </label>
										<div class="col-md-4">
											<input type="text" name="secoundary_email" id="secoundary_email" class="form-control" value="<?php echo $ljp_data[0]['email_2']; ?>" placeholder="Secoundary Email-ID" />
											<label id="secoundary_email-error" class="error" for="secoundary_email"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> Depertment Name </label>
										<div class="col-md-4">
											<input type="text" name="depertment_name" id="depertment_name" class="form-control" value="<?php echo $ljp_data[0]['department']; ?>" placeholder="Depertment Name" />
											<label id="depertment_name-error" class="error" for="depertment_name"></label>
										</div>
										<label class="col-md-2">Fax Number </label>
										<div class="col-md-4">
											<input type="text" name="fax_no" id="fax_no" class="form-control" value="<?php echo $ljp_data[0]['fax']; ?>" placeholder="Fax  Number"/>
											<label id="fax_no-error" class="error" for="fax_no"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> Job Title </label>
										<div class="col-md-4">
											<input type="text" name="job_titlt" id="job_titlt" class="form-control" value="<?php echo $ljp_data[0]['job_title']; ?>" placeholder="Job Title" />
											<label id="job_titlt-error" class="error" for="job_titlt"></label>
										</div>
										<label class="col-md-2"> Address </label>
										<div class="col-md-4">
											<input type="text" name="address" id="address" class="form-control" value="<?php echo $ljp_data[0]['address']; ?>" placeholder="Address" />
											<label id="address-error" class="error" for="address"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2">Skype ID </label>
										<div class="col-md-4">
											<input type="text" name="skype_id" id="skype_id" class="form-control" value="<?php echo $ljp_data[0]['skype_id']; ?>" placeholder="Skype ID" />
											<label id="skype_id-error" class="error" for="skype_id"></label>
										</div>
										<label class="col-md-2"> Twitter ID </label>
										<div class="col-md-4">
											<input type="text" name="twitter_id" id="twitter_id" class="form-control" value="<?php echo $ljp_data[0]['twitter']; ?>" placeholder="Twitter ID" />
											<label id="twitter_id-error" class="error" for="twitter_id"></label>
										</div>
									</div>	
									<div class="form-group">
										<label class="col-md-2"> Linkedin </label>
										<div class="col-md-4">
											<input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo $ljp_data[0]['linkedin']; ?>" placeholder="Linkedin" />
											<label id="linkedin-error" class="error" for="linkedin"></label>
										</div>
										<label class="col-md-2"> Website Address </label>
										<div class="col-md-4">
											<input type="text" name="Website_address" id="Website_address" class="form-control" value="<?php echo $ljp_data[0]['website']; ?>" placeholder="Website Address" />
											<label id="Website_address-error" class="error" for="Website_address"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="client_id" id="client_id" value="<?php echo $ljp_data[0]['client_id']; ?>">
											<button type="submit" class="btn btn-success"> Update </button>
											<a href="<?php echo site_url('sales/clients/') ?>" class="btn btn-default">Cancel</a>
										</div>
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>
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
				$("form[name='clients_form']").validate({
					rules: {
						contact_name: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},

                        decision_maker_name:{
                        	required: false,
							regex:/^[a-zA-Z ]*$/,
                        },
                        primary_phone_no: {
							required: true,
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						secondary_phone_no: {
							required: false,
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						depertment_name: {
                            required: false,
							regex:/^[a-zA-Z ]*$/,
						},
						primary_email: {
							required: true,
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						},
						secoundary_email: {
                            required: false,
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,

						},
						job_titlt:{
							required: false,
							regex:/^[a-zA-Z ]*$/,
						},
						address:{
							required:true,
						},
                         fax_no:{
						regex: /^\+?[0-9]+$/,
                         },	
                         Website_address: {
							required:false,
                             regex:/^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$/,
						},				    
					},
					messages: {
						contact_name: {
							required: "Please enter name",
							regex: "Special character and Number not allowed"
						},
						decision_maker_name:{
							required: "Please enter name",
							regex: "Special character and Number not allowed"
						},
						primary_phone_no: {
							required: "Please enter a phone number.",
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						secondary_phone_no: {
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						depertment_name: {
							required: "Please enter name",
							regex: "Special character and Number not allowed"
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
							required: "Please enter your address with Post Code."
						},
						fax_no: {
							regex:"Enter valid fax number"
						},
						Website_address : {
							regex:"Please Enter valid Url"
						}
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('client_id', $('#client_id').val());
						formData.append('contact_name', $('#contact_name').val());
						formData.append('decision_maker_name',$('#decision_maker_name').val());
						formData.append('phone_1', $('#primary_phone_no').val());
						formData.append('phone_2', $('#secondary_phone_no').val());
						formData.append('email_1', $('#primary_email').val());
						formData.append('email_2', $('#secoundary_email').val());
						formData.append('department', $('#depertment_name').val());
						formData.append('fax', $('#fax_no').val());
						formData.append('job_title', $('#job_titlt').val());
						formData.append('address', $('#address').val());
						formData.append('skype_id', $('#skype_id').val());
						formData.append('twitter', $('#twitter_id').val());
						formData.append('linkedin', $('#linkedin').val());
						formData.append('website', $('#Website_address').val());
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
										location.href = "<?php echo site_url('sales/clients') ?>";
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