
		<section class="content">
			<input type="hidden" name="page" id="page" value="contractors" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Contractors</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('recruiter/contractors/contractor_save', array('id' =>'contractors_form','name'=>'contractors_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST'));?>
									<div class="form-group">
										<label class="col-md-2"> Contractor Name<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="contractor_name" id="contractor_name" class="form-control" value="" placeholder="Contractor Name" />
											<label id="contractor_name_error" class="error" for="contractor_name"></label>
										</div>
										<label class="col-md-2"> Skill Set<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="skill_set" id="skill_set" class="form-control" value="" placeholder="Skill Set" />
											<label id="skill_set_error" class="error" for="skill_set"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Mobile No<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="mobile_no" id="mobile_no" class="form-control" value="" placeholder="Mobile No" />
											<label id="mobile_no_error" class="error" for="mobile_no"></label>
										</div>
										 <label class="col-md-2">Email ID<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="email_id" id="email_id" class="form-control" value="" placeholder="Email ID" />
										<label id="email_id_error" class="error" for="email_id"></label>
										</div> 
									</div>
									<div class="form-group">
										<label class="col-md-2"> Address<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<textarea name="address" id="address" class="form-control" placeholder="street no, city, state, country"></textarea>
											<label id="address_error" class="error" for="address"></label>
										</div>
										 <label class="col-md-2">Designation of Contractors<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="designation_of_cntractors" id="designation_of_cntractors" class="form-control" value="" placeholder="Contractors Designation" />
										<label id="designation_of_cntractors_error" class="error" for="designation_of_cntractors"></label>
										</div> 
									</div>
									<div class="form-group">
										 <label class="col-md-2">Zip/Post Code<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="zip_code" id="zip_code" class="form-control" value="" placeholder="Zip/Post Code" />
										<label id="zip_code_error" class="error" for="zip_code"></label>
										</div>
										 <label class="col-md-2">Worked With Us</label>
										<div class="col-md-4">
											<select class="form-control" id="worked_with_us">
												<option value=" ">--Select One--</option>
												<option value="Yes">Yes</option>
												<option value="PF">No</option>
											</select>
									    </div>
									</div>
									<div class="form-group">
										 <label class="col-md-2">Experience</label>
										<div class="col-md-4">
											<?php $array = array(''=>'--Select One--','0-2'=> '0-2','2-4'=>'2-4','4-6'=>'4-6','6-8'=>'6-8','8-10'=>'8-10','10+'=>'Above 10 years'); ?>
											<?php echo form_dropdown('experience',$array,'','class="form-control" id="experience"') ?>
											<label id="experience_error" class="error" for="experience"></label>
										</div>
										 <label class="col-md-2">Current Status</label>
										<div class="col-md-4">
											<?php $status = array('' =>'--Select One--','Available'=>'Available','Close'=>'Close','InProgress'=>'InProgress','Interview'=>'Interview','Waiting'=>'Waiting' ); ?>
											<?php echo form_dropdown('current_status',$status,'','class="form-control" id="current_status"') ?>
											<label id="current_status_error" class="error" for="current_status"></label>
										</div> 
									</div>
									<div class="form-group">
										<label class="col-md-2"> Future Rating: </label>
										<div class="col-md-4">
											<div class='starrr' id='star1'></div>
											<input type="hidden" name="future_rating" id="future_rating" class="form-control" value="" placeholder="Future Rating" />
											<label id="future_rating_error" class="error" for="future_rating"></label>
										</div>
										<label class="col-md-2">Resume Upload</label>
										<div class="col-md-4">
											<input type="file" name="resume_upload" id="resume_upload" class="form-control" value="" placeholder="Upload Resume" />
										<label id="resume_upload_error" class="error" for="resume_upload"></label>
										</div> 
									</div>
									<div class="form-group">
										<label class="col-md-2"> Pay Rate Rating: </label>
										<div class="col-md-4">
											<div class='starrr' id='star2'></div>
											<input type="hidden" name="pay_rate_rating" id="pay_rate_rating" class="form-control" value="" placeholder="" />
											<label id="pay_rate_rating_error" class="error" for="pay_rate_rating"></label>
										</div>
										<label class="col-md-2"> Pay Rate Range </label>
										<div class="col-md-4">
											<?php $array= array('5' => 5,'4'=>4,'3'=>3,'2'=>2,'1'=>1 );  ?>
											<?php echo form_dropdown('pay_rate_range',$array,'','class="form-control" id="pay_rate_range"') ?>
											<label id="pay_rate_range_error" class="error" for="pay_rate_range"></label>
										</div>
									</div>
									<div class="form-group demo-masked-input">
										<label class="col-md-2"> Experence Rating: </label>
										<div class="col-md-6">
											<div class='starrr' id='star3'></div>
											<input type="hidden" name="experience_rating" id="experience_rating" class="form-control" value="" placeholder="Experience Rating" />
											<label id="experience_rating_error" class="error" for="experience_rating"></label>
										</div>
									</div>
									<div id="message"></div>
									<div class="form-group">
										<div class="col-md-12">
										    <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('recruiter/contractors/') ?>" class="btn btn-default">Cancel</a>
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
				$("form[name='contractors_form']").validate({
					rules: {
						  contractor_name: {
							required: true,
							regex:/^[a-zA-Z ]*$/,
						},
						designation_of_cntractors: {
							regex:/^[a-zA-Z ]*$/,
							required:true,
						},
						skill_set: {
							regex:/^[a-zA-Z ]*$/,
							required:true,
						},
						experience:{
							required:true,
							number:false,
						},
						address: {
							required:true,
						},
						email_id: {
							required: true,
							email: true,
							regex: /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
						},
						mobile_no: {
							required:true,
							number: true,
							minlength: 7,
							maxlength: 10,
						},
						resume_upload: {
							required: false,
							extension: "pdf|doc|docx",
						},
						zip_code : {
							required:true,
							number:true,
							minlength:4,
						},

					},
					messages: {
						   contractor_name: {
							required: "Please enter name",
							regex: "Special character and Number not allowed"
						},
						designation_of_cntractors: {
							required:"Please Enter your Designation",
							regex: "Special character and Number not allowed"

						}, 
						skill_set:{
							required:"Please enter your skill",
							regex:"Number and Special Contractor not allowed"
						},
						experience: {
							required:"Please enter year of experience",
							number:"only number is allowed here"
						},
						address: {
                           required:"Please Enter Address"
						},
						zip_code: {
							required:"Please enter Zip/Post Code",
							number:"Alphabet and Special character not allowed",
							minlength:"It contained Atleast 4 digits"
						},
						email_id: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"

						},
						mobile_no: {
							required:"Please enter your mobile no",
							number: "Please enter a valid mobile number.",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						resume_upload: {
							required: "Please Upload Resume",
							extension: " Only Those file are allowed. Ex: docx,doc,pdf"
						},

					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var catIdNew = '';
						$("input.catCheckbox[type=checkbox]:checked").each(function() {
							if(catIdNew!=''){
								catIdNew = catIdNew+','+$(this).val();
							} else {
								catIdNew = $(this).val();
							}
						});
						var formData = new FormData();
						if($('#resume_upload')[0].files[0]!==''){
							formData.append('file_name', $('#resume_upload')[0].files[0]);
						}
						formData.append('contractor_name', $('#contractor_name').val());
						formData.append('designation', $('#designation_of_cntractors').val());
						formData.append('skillset', $('#skill_set').val());
						formData.append('experience', $('#experience').val());
						formData.append('address', $('#address').val());
						formData.append('zip_code', $('#zip_code').val());
						formData.append('worked_with_us', $('#worked_with_us').val());
						formData.append('pay_rate_range', $('#pay_rate_range').val());
						formData.append('current_status', $('#current_status').val());
						formData.append('future_rating', $('#future_rating').val());
						formData.append('pay_rate_rating', $('#pay_rate_rating').val());
						formData.append('experience_rating', $('#experience_rating').val());
						formData.append('email_id', $('#email_id').val());
						formData.append('mobile', $('#mobile_no').val());
						//formData.append('cons_date', $('#date').val());
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
										location.href = "<?php echo site_url('recruiter/contractors') ?>";
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
            $demoMaskedInput.find('.date').inputmask('yyyy/mm/dd', { placeholder: '____/__/__' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo config_item('assets_dir');?>css/starrr.css" />
		<script src="<?php echo config_item('assets_dir');?>js/starrr.js"></script>
		<script type="text/javascript">
			$('#star1').starrr({
				change: function(e, value){
					if (value) {
						$('#future_rating').val(value);
					} else {
						$('#future_rating').val('');
					}
				}
			});
			$('#star2').starrr({
				change: function(e, value){
					if (value) {
						$('#pay_rate_rating').val(value);
					} else {
						$('#pay_rate_rating').val('');
					}
				}
			});
			$('#star3').starrr({
				change: function(e, value){
					if (value) {
						$('#experience_rating').val(value);
					} else {
						$('#experience_rating').val('');
					}
				}
			});
		</script>
