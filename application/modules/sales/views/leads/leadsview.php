
		<section class="content">
			<input type="hidden" name="page" id="page" value="leads" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Leads Details</h2>
								<legend><span style="float: right;font-size: 15px;">									
										<input type="checkbox" name="sendMsg" id="sendMsg" style="position: relative;opacity: 1;left: 0;" />&nbsp;Send Contract&nbsp;&nbsp;<input type="checkbox" name="recMsg" id="recMsg" style="position: relative;opacity: 1;left: 0;" />&nbsp;Receive Contract</span>
								</legend>
							</div>							
							<div class="body">
								<div class="form-group">
									<label class="col-md-2"> Client Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['contact_name']; ?></div>
									<label class="col-md-2"> Contact Name: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['decision_maker_name']; ?></div>
								</div>
								<div class="form-group" style="clear: both;">
								    <label class="col-md-2"> Industry: </label>									
									<div class="col-md-4"><?php echo $ljp_Data[0]['cat_id']; ?></div>
									<!-- <label class="col-md-2"> Prospact Type: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['prospect_type']; ?></div> -->
									<label class="col-md-2"> Primary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['phone_1']; ?></div>
								</div>
								<div class="form-group" style="clear: both;">
									<label class="col-md-2"> Primary E-mail: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['email_1']; ?></div>
									<label class="col-md-2"> Secondary E-mail: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['email_2']; ?></div>
								</div>
								<div class="form-group" style="clear: both;">
									<label class="col-md-2"> Secondary Phone: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['phone_2']; ?></div>
									<label class="col-md-2"> Department: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['department']; ?></div>
								</div>							
								<div class="form-group" style="clear: both;">
									<label class="col-md-2"> Fax: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['fax']; ?></div>
									<label class="col-md-2"> Job Title: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['job_title']; ?></div>
								</div>
								<div class="form-group" style="clear: both;">
									<label class="col-md-2"> Linkedin: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['linkedin']; ?></div>
									<label class="col-md-2"> Address: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['address']; ?></div>
								</div>
								<div class="form-group" style="clear: both;">
									<label class="col-md-2"> Twitter: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['twitter']; ?></div>
									<label class="col-md-2"> Website: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['website']; ?></div>
								</div>
								<div class="form-group" style="clear: both;">
									<label class="col-md-2"> Skype Id: </label>
									<div class="col-md-4"><?php echo $ljp_Data[0]['skype_id']; ?></div>
									<label class="col-md-2"> File Upload : </label>
									<div class="col-md-4">
									<button type="button" class="btn btn-default" data-toggle="modal" data-target="#UploadUsingModel">Upload</button>
									</div>
								</div>
								<div class="form-group" style="clear: both;">
									<input type="hidden" name="contact_id" id="contact_id" value="<?php echo $ljp_Data[0]['contact_id']; ?>">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
									<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
									<div class="col-md-12">
										<a href="<?php echo site_url('sales/leads/') ?>" class="btn btn-default">Back</a>
									</div>
								</div>
							</div>
						</div>
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
						<div id="massage"></div>
						<?php echo form_open_multipart('sales/leads/leads_file_save', array('id' =>'leads_file','name'=>'leads_file','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
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
				$("form[name='leads_file']").validate({
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
							required: "Please enter file name",
							regex: "Special characters and Numbers are not allowed"
						},
						documentfile: {
							required: "Please select proper file",
							extension: "Those file are allowed. Ex: docx|jpeg|doc|pdf|jpg|xls|xlsx|csv|ppt|pptx"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('document_file_name', $('#pfile_name').val());
						formData.append('contact_id', $('#contact_id').val());
						if($('#documentfile')[0].files[0]!==''){
							formData.append('document_upload', $('#documentfile')[0].files[0]);
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> The value inserted successfully.</div>';
									$('#massage').html(html);
									$('#UploadUsingModel').modal('hide');
									$('#leads_file')[0].reset();
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This value already exists in the list.</div>';
									$('#massage').html(html);
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
							url: "<?php echo site_url('sales/leads/sendcontract') ?>",
							type: 'POST',
							data: {'id':$('#contact_id').val(),'user_id':$('#user_id').val(),'org_id':$('#org_id').val()},
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
							url: "<?php echo site_url('sales/leads/receivecontract') ?>",
							type: 'POST',
							data: {'id':$('#contact_id').val(),'user_id':$('#user_id').val(),'org_id':$('#org_id').val()},
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