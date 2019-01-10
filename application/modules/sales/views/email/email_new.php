
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
								<?php if($this->session->flashdata('success_message')){?>
								<div class="alert alert-success" id="success_email"><?php echo $this->session->flashdata('success_message');?></div>
								<?php } ?>
								<?php echo form_open_multipart('sales/emaildetails/email_save', array('id' =>'email_form','name'=>'email_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<fieldset>
										
										<div class="form-group">
											<label class="col-md-4"> Email Template <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-8">
												<select name="template_id" class="form-control" id="template_id"'>
													<option value="">Select Template</option>
													<?php foreach($templates as $t){?>
													<option value="<?php echo $t->message_temaplte_id?>"><?php echo $t->template_title;?></option>
													<?php } ?>
												</select>
												
												<label id="template_id-error" class="error" for="template_id"></label>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4"> <?php echo $urlname; ?> To <span class="mandatory"style="color: red">*</span></label>
												<div class="col-md-8">
													<input type="text" name="email_to" id="email_to" class="form-control" value="" placeholder="<?php echo $urlname; ?> To (Email Address)" />
													<label id="email_to-error" class="error" for="email_to"></label>
												</div>
									   </div>
									   <div class="form-group">
											<label class="col-md-4"> <?php echo $urlname; ?> Subject <span class="mandatory" style="color: red">*</span></label>
												<div class="col-md-8">
													<input type="text" name="email_subject" id="email_subject" class="form-control" value="" placeholder="<?php echo $urlname; ?> Subject" />
													<label id="email_subject-error" class="error" for="email_subject"></label>
												</div>
									   </div>	

									   <div class="form-group">
											<label class="col-md-12"> Email Content <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-12">
												<textarea name="email_content" id="email_content" class="form-control"></textarea>
												<label id="email_content-error" class="error" for="email_content"></label>
											</div>
										</div>	

										<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('sales/emaildetails/') ?>" class="btn btn-default">Cancel</a>
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
				
				$("form[name='email_form']").validate({
					rules: {
						template_id: {
							required: true,
						},
						email_to: {
							required: true,
						},
						email_subject: {
							required: true,
						},
						email_content: {
							required: true,
						},
					},
					messages: {
						email_to: {
							required: "Please enter Email ID"
						},
						email_subject: {
							required: "Please enter Email Subject"
						},
						email_content: {
							required: "Please enter Email Content"
						},
						template_id: {
							required: "Please select template"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('email_to', $('#email_to').val());
						formData.append('email_subject', $('#email_subject').val());
						formData.append('email_content', $('#email_content').val());
						formData.append('send_by', $('#user_id').val());
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
									$("#success_div").show();
									$("#success_div").text("Email send successfully");
								} else { 
									$('.error_msg').show();
									$('.error_msg').html(resD.message);
								}
							}
						});
					}
				});
				
		</script>
		<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
		<script type="text/javascript">
			CKEDITOR.replace( 'email_content' );
			
		</script>
		<link rel="stylesheet" type="text/css" href="<?php echo config_item('assets_dir');?>css/bootstrap-datepicker.css" />
		<script type="text/javascript" src="<?php echo config_item('assets_dir');?>js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
			$("#template_id").change(function(data){
				var template_id=$(this).val();

				if(template_id!='custom'){
						$.ajax({
							type:"POST",
							url:"<?php echo base_url();?>sales/emaildetails/get_email_content",
							data:{"template_id":template_id},
							dataType:"json",
							success:function(data){
								alert(data.result);
								CKEDITOR.instances['email_content'].setData(data.result);
								
							}
						});
				}
			});
		</script>
		
		</script>