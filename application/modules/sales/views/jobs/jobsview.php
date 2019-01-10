
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

									<legend style="padding-bottom: 20px;">Job Opening Information <span style="float: right;font-size: 15px;">&nbsp; &nbsp;
										<?php if(isset($jobs[0]['client_id']) && $jobs[0]['client_id'] <= 0){ ?>
											<button  type="button" class="btn btn-info btn_client" data-toggle="modal" data-target="#AddClientModal">Add Client</button>&nbsp; &nbsp;
										<?php } ?>
										<button  type="button" class="btn btn-info btn_sms" name="sendMsg" id="sendMsg" >Send Email</button>&nbsp; &nbsp;
										<?php if($this->session->userdata('sales_user_id')=='2' ||  $this->session->userdata('sales_user_id')=='5'){
											if(isset($is_sent) && $is_sent=='Y'){ 
												echo 'Message Sent&nbsp;&nbsp;';  
											} else { ?>
												<button  type="button" class="btn btn-info btn_sms" data-toggle="modal" data-val="<?php echo $jobs[0]['prospect_phone_1']; ?>" data-target="#SendMessagModal">Send Message</button>&nbsp; &nbsp;
											<?php }
										} ?>
										<button  type="button" class="btn btn-info btn_sms" name="recMsg" id="recMsg">Confirmation</button>
									</legend>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> <?php echo $urlname; ?> Title: </label>
										<div class="col-md-4"><?php echo $jobs[0]['prospect_title']; ?></div>
										<label class="col-md-2"> Client Name: </label>
										<div class="col-md-4"><?php echo $jobs[0]['contact_name']; ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> E-mail: </label>
										<div class="col-md-4"><span id="prospect_email_1"><?php echo $jobs[0]['prospect_email_1']; ?></span>&nbsp;&nbsp;<?php if($email_verified==0){?><button  type="button" data-val="<?php echo $jobs[0]['prospect_id']; ?>" data-mail="<?php echo $jobs[0]['prospect_email_1']; ?>" class="btn btn-info btn_validate" id="btn_validate"  >Validate</button><?php } ?> <button  type="button" data-val="<?php echo $jobs[0]['prospect_id']; ?>" data-mail="<?php echo $jobs[0]['prospect_email_1']; ?>" class="btn btn-info btn_validate" id="btn_verified" <?php if($email_verified==0){?> style="display: none;" <?php } ?> >Verifiied</button> </div>
										<label class="col-md-2"> Phone Number: </label>
										<div class="col-md-4"><span id="prospect_phone_1"><?php echo $jobs[0]['prospect_phone_1']; ?></span>&nbsp;&nbsp;<input type="checkbox" name="is_called" id="is_called" style="position: relative;opacity: 1;left: 0;" data-toggle="modal"  data-target="#CalledModel" /> Called</div>
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
											<!-- <div class="col-md-5" style="padding-left:0px;padding-right:0px;"><?php echo $jobs[0]['type_salary'] ?></div> -->
										</div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Job Url: </label>
										<div class="col-md-4"><a href="<?php echo $jobs[0]['job_url']; ?>" class="joburlclass" onclick="return !window.open(this.href)">Job Url</a></div>
										<label class="col-md-2"> Google Maps: </label>
										<div class="col-md-4"><?php if($jobs[0]['googlemaps']!='') { ?><a href="<?php echo $jobs[0]['googlemaps']; ?>" class="jobgmclass" onclick="return !window.open(this.href)">Google Maps</a><?php } ?></div>
									</div>
									<div class="form-group" style="clear:both;">
										<label class="col-md-2"> Compensation: </label>
										<div class="col-md-4"><?php echo $jobs[0]['compensation']; ?></div>
										<label class="col-md-2"> Employment Type: </label>
										<div class="col-md-4"><?php echo $jobs[0]['employment_type']; ?></div>
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
										<a href="<?php echo site_url('sales/jobs') ?>" class="btn btn-default">Cancel</a>
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
								<button type="butto" class="btn btn-success">Save</button>
								<button type="button" class="btn primary" data-dismiss="modal">Close</button>
							</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
			<div id="CalledModel" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color:#3458A4;"><strong>Comment</strong></h4>
							<div class="alert alert-danger" id="call_failed" style="display: none;"></div>
							<div class="alert alert-success" id="call_success" style="display: none;"></div>
						</div>
						
							<div class="modal-body">
								<input type="text" name="job_id" id="job_id" value="<?php echo $jobs[0]['prospect_id'];?>">
								<div class="form-group">
									<label class="col-md-4"> Select Status <span class="mandatory">*</span></label>
									<div class="col-md-8">
										<select id="call_status">
											<option value="not_picked">Not Picked Up</option>
											<option value="not_picked">Picked Up</option>
											<option value="not_picked">Picked Up and Interested</option>
											<option value="not_interested">Not Interested</option>
										</select>
										<label id="stage_of_prospect-error" class="error" for="call_status"></label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4"> Comment <span class="mandatory">*</span></label>
									<div class="col-md-8">
										<textarea name="call_comment" id="call_comment" class="form-control"></textarea>
										<label id="comment-error" class="error" for="comment"></label>
									</div>
								</div>
							</div>
							<div class="modal-footer" style="clear:both;">
								<button type="button" class="btn btn-success" id="btn_call">Save</button>
								<button type="button" class="btn primary" data-dismiss="modal">Close</button>
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
			<div id="SendMessagModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" style="color:#3458A4;"><strong>Send Message</strong></h4>
						</div>						
						<div class="modal-body">
							<input type="hidden" name="ph_no" id="ph_no" value="">
							<div class="form-group">
								<label class="col-md-4"> Select Template <span class="mandatory">*</span></label>
								<div class="col-md-8">
									<select id="template_id">
										<option value="">Select Template</option>
										<?php foreach($template as $t){?>
										<option value="<?php echo $t->message_temaplte_id;?>"><?php echo $t->template_title;?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4"> Text <span class="mandatory">*</span></label>
								<div class="col-md-8">
									<textarea name="template_body" id="template_body" rows="5" cols="40"></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer" style="clear:both;">
							<button type="submit" class="btn btn-success" id="btn_send">Send</button>
							<button type="button" class="btn primary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<?php if(isset($jobs[0]['client_id']) && $jobs[0]['client_id'] <= 0){ ?>
				<div id="AddClientModal" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title" style="color:#3458A4;"><strong>Add Client</strong></h4>
							</div>
							<?php echo form_open_multipart('sales/jobs/jobs_client_save_data', array('id' =>'jobsClient_form','name'=>'jobsClient_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
								<div class="modal-body">
									<div class="form-group">
										<label class="col-md-4"> Name</label>
										<div class="col-md-8">
											<input type="text" name="contact_name" id="contact_name" class="form-control" value="" />
											<label id="contact_name-error" class="error" for="contact_name"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4"> Phone <span class="mandatory">*</span></label>
										<div class="col-md-8">
											<input type="text" name="phonenumber" id="phonenumber" class="form-control" value="" />
											<label id="phonenumber-error" class="error" for="phonenumber"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4"> E-mail <span class="mandatory">*</span></label>
										<div class="col-md-8">
											<input type="text" name="emailid" id="emailid" class="form-control" value="" />
											<label id="emailid-error" class="error" for="emailid"></label>
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
			<?php } ?>
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
				$("form[name='jobsClient_form']").validate({
					rules: {
						phonenumber: {
							required: function (el) {
								return $(el).closest('form').find('#emailid').val()=='';
							},
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						emailid: {
							required: function (el) {
								return $(el).closest('form').find('#phonenumber').val()=='';
							},
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						},
						contact_name: {
							required: false,
							regex:/^[a-zA-Z ]*$/,
						},
					},
					messages: {
						phonenumber: {
							required: "Please enter a phone number.",
							number: "Please enter a valid phone number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						emailid: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						},
						contact_name: {
							required: "Please enter job title",
							regex: "Special characters and Numbers are not allowed"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('emailid', $('#emailid').val());
						formData.append('contact_name', $('#contact_name').val());
						formData.append('phonenumber', $('#phonenumber').val());
						formData.append('user_id', $('#user_id').val());
						formData.append('prospect_id', $('#prospect_id').val());
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
									$('#prospect_email_1').text($('#emailid').val());
									$('#prospect_phone_1').text($('#phonenumber').val());
									$('.modal-backdrop').removeClass('in');
									$('#AddClientModal').modal('hide');
									$('.btn_client').remove();
								}
							}
						});
					}
				});
			});
		</script>
		<script type="text/javascript">
			$('#sendMsg').click(function(){
				if(!confirm('Are you sure you want send email to client?')){
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
			});
			$('#recMsg').click(function(){
				if(!confirm('Are you sure you got confirmation from client?')){
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
			});
			$(".btn_sms").click(function(){
				var ph_no=$(this).attr("data-val");
				$("#ph_no").val(ph_no);
			});
			$("#btn_send").click(function(data){
				
					var template_id="1";//$("#template_id").val();
					var template_body=$("#template_body").val();
					var ph_no=$("#ph_no").val();
					var valid=1;

					if(valid==1){
					$.ajax({
							type:"POST",
							url:"http://52.77.182.246/plivo/sms.php",
							data:{"template_id":"1","template_body":template_body,"phone_number":ph_no,'user_id': <?php echo $this->session->userdata('sales_user_id');?>},
							dataType:"json",
							success:function(data){
								
							}
						});
					}
			});

			$("#template_id").change(function(data){
				var template_id=$(this).val();
				$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>/sales/jobs/get_template_content",
					data:{"message_temaplte_id":template_id},
					dataType:"json",
					success:function(data){
						$("#template_body").val(data.content);
					}
				});
			});

			$("#btn_call").click(function(data){
				var call_comment=$("#call_comment").val();
				var call_status=$("#call_status").val();
				var valid=1;
				if(call_status=='' && valid==1){
					$("#call_failed").show();
					$("#call_failed").text("Please select call status");
					valid=0;
				}

				if(valid==1){
					$.ajax({
						type:"POST",
						url:"<?php echo base_url();?>/sales/jobs/call_status",
						data:{"call_status":call_status,'call_comment':call_comment},
						dataType:"json",
						success:function(data){
							if(data.result==1){
								$("#call_success").show();
								$("#call_success").text("Call saved successfully");
							}
						}
					});
				}
			});

			$("#btn_validate").click(function(data){
				var job_id=$(this).data('val');
				var email=$(this).data('mail');
				$.ajax({
					type:"POST",
					url:"<?php echo base_url();?>sales/jobs/email_list_create",
					data:{"job_id":job_id,"email":email},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							$(this).hide();
							$("#btn_verified").show();
							$("#btn_validate").hide();
						}	
					}
				});
			});

			$(document).on('click','.jobgmclass', function(){
				var href=$(this).attr('href');
				var user_id="<?php echo $_SESSION['sales_user_id']; ?>";
				$.ajax({
					type:"POST",
					url:"<?php echo base_url('sales/jobs/jobgoogleurl');?>",
					data:{"user_id":user_id,'href':href},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							$("#call_success").show();
							$("#call_success").text("Call saved successfully");
						}
					}
				});
			});
			$(document).on('click','.joburlclass', function(){
				var href=$(this).attr('href');
				var user_id="<?php echo $_SESSION['sales_user_id']; ?>";
				$.ajax({
					type:"POST",
					url:"<?php echo base_url('sales/jobs/joburl');?>",
					data:{"user_id":user_id,'href':href},
					dataType:"json",
					success:function(data){
						if(data.result==1){
							$("#call_success").show();
							$("#call_success").text("Call saved successfully");
						}
					}
				});
			});
		</script>