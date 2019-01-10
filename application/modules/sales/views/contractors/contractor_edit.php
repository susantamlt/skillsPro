
		<section class="content">
			<input type="hidden" name="page" id="page" value="contractors" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit Contractor</h2>
							</div>
							<div class="body">
								<div id="massage"></div>
								<?php echo form_open_multipart('sales/contractors/contractors_save', array('id'=>'contractors_form','name'=>'contractors_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Contractor Name <span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="contractor_name" id="contractor_name" class="form-control" value="<?php echo $ljp_data[0]['contractor_name']; ?>" placeholder="Contractor Name" />
											<label id="contractor_name-error" class="error" for="contractor_name"></label>
										</div>
										 <label class="col-md-2"> Skill Set <span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="skillset" id="skill_set" class="form-control" value="<?php echo $ljp_data[0]['skillset']; ?>" placeholder="Skill Set" />
											<label id="skill_set_error" class="error" for="skill_set"></label>
										</div>
									</div>
									<div class="form-group">
                                        <label class="col-md-2"> Mobile No<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="tel" name="mobile" id="mobile_no" class="form-control" value="<?php echo $ljp_data[0]['mobile']; ?>" placeholder="Mobile No" />
											<label id="mobile_no_error" class="error" for="mobile_no"></label>
										</div>
										<label class="col-md-2"> Email ID<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="email_id" id="email_id" class="form-control" value="<?php echo $ljp_data[0]['email_id']; ?>" placeholder="Email ID" />
											<label id="email_id_error" class="error" for="email_id"></label>
										</div>
									</div>
									<div class="form-group">
										 <label class="col-md-2"> Address<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="address" id="address" class="form-control" value="<?php echo $ljp_data[0]['address']; ?>" placeholder="Address" />
											<label id="address_error" class="error" for="address"></label>
										</div>
										<label class="col-md-2"> Designation of Contractors</label>
										<div class="col-md-4">
											<input type="text" name="designation" id="designation_of_cntractors" class="form-control" value="<?php echo $ljp_data[0]['designation']; ?>" placeholder="Designation of contractors" />
											<label id="designation_of_cntractors_error" class="error" for="designation_of_cntractors"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Zip/Post Code<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="zip_code" id="zip_code" class="form-control" value="<?php echo $ljp_data[0]['zip_code']; ?>" placeholder="Zip/Post Code" />
											<label id="zip_code_error" class="error" for="zip_code"></label>
										</div>
										<label class="col-md-2"> Worked With Us  </label>
										<div class="col-md-4">
											<?php
											$array= array(''=>'--Select One--','Yes'=>'Yes','No'=>'No'); 
											?>
											<?php echo form_dropdown('worked_with_us',$array,$ljp_data[0]['worked_with_us'],'class="form-control" id="worked_with_us"') ?>
											<label id="worked_with_us_error" class="error" for="worked_with_us"></label>
										</div>
									</div>
										<div class="form-group">
										<label class="col-md-2"> Experience </label>
										<div class="col-md-4">
											<?php $array = array(''=>'--Select One--','0-2'=> '0-2','2-4'=>'2-4','4-6'=>'4-6','6-8'=>'6-8','8-10'=>'8-10','10+'=>'Above 10 years'); ?>
											<?php echo form_dropdown('experience',$array,$ljp_data[0]['experience'],'class="form-control" id="experience"') ?>
											<label id="experience_error" class="error" for="experience"></label>
										</div>
										<label class="col-md-2"> Current Status </label>
										<div class="col-md-4">
											<?php $status = array('' =>'--Select One--','Available'=>'Available','Close'=>'Close','InProgress'=>'InProgress','Interview'=>'Interview','Waiting'=>'Waiting','joined'=>'joined','Contract_ended'=>'Contract ended','Left'=>'Left','Terminated'=>'Terminated'); ?>
											<?php echo form_dropdown('current_status',$status,$ljp_data[0]['current_status'],'class="form-control" id="current_status"') ?>
											<label id="current_status_error" class="error" for="current_status"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Future Rating: </label>
										<div class="col-md-4">
											<div class='starrr' id='star1'></div>
											<input type="hidden" name="future_rating" id="future_rating" class="form-control" value="<?php echo $ljp_data[0]['future_rating']; ?>" placeholder="Future Rating" />
											<label id="future_rating_error" class="error" for="future_rating"></label>
										</div>
										<label class="col-md-2"> Upload Resume </label>
										<div class="col-md-4">
											<input type="file" name="resume_upload" id="resume_upload" class="form-control" value="" placeholder="Upload" />
											<label id="resume_upload_error" class="error" for="resume_upload"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Pay Rate Rating: </label>
										<div class="col-md-4">
											<div class='starrr' id='star2'></div>
											<input type="hidden" name="pay_rate_rating" id="pay_rate_rating" class="form-control" value="<?php echo $ljp_data[0]['pay_rate_rating'] ?>" placeholder="" />
											<label id="pay_rate_rating-error" class="error" for="pay_rate_rating"></label>
										</div>
										<label class="col-md-2"> Pay Rate Range </label>
										<div class="col-md-4">
											<?php $array= array('5' => 5,'4'=>4,'3'=>3,'2'=>2,'1'=>1 );  ?>
											<?php echo form_dropdown('pay_rate_range',$array,$ljp_data[0]['pay_rate_range'],'class="form-control" id="pay_rate_rating"') ?>
											<label id="pay_rate_range-error" class="error" for="pay_rate_range"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Experence Rating: </label>
										<div class="col-md-4">
											<div class='starrr' id='star3'></div>
											<input type="hidden" name="experience_rating" id="experience_rating" class="form-control" value="<?php echo $ljp_data[0]['experience_rating'] ?>" placeholder="Experience Rating" />
											<label id="experience_rating-error" class="error" for="experience_rating"></label>
										</div>
										<label class="col-md-2 palrating-div-c" style="display: none;">Client Par Rate:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4 demo-masked-input palrating-div-c"  style="display: none;">
											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">attach_money</i></span>
												<div class="form-line">
													<input type="text" name="client_par_rate" id="client_par_rate" class="form-control" placeholder="Ex: 99.99" value="<?php echo $ljp_data[0]['client_par_rate'] ?>">
												</div>
											</div>
											<label id="client_par_rate-error" class="error" for="client_par_rate"></label>
										</div>
									</div>
									<div class="form-group palrating-div-c" style="display: none;">
										<label class="col-md-2"> Contractor Rate:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4 demo-masked-input">
											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">attach_money</i></span>
												<div class="form-line">
													<input type="text" name="contractor_rate" id="contractor_rate" class="form-control" placeholder="Ex: 99.99" value="<?php echo $ljp_data[0]['contractor_rate'] ?>">
												</div>
											</div>
											<label id="contractor_rate-error" class="error" for="contractor_rate"></label>
										</div>
										<label class="col-md-2"> Margin Rate:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4 demo-masked-input">
											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">attach_money</i></span>
												<div class="form-line">
													<input type="text" name="margin_rate" id="margin_rate" class="form-control" placeholder="Ex: 99.99" value="<?php echo $ljp_data[0]['margin_rate'] ?>">
												</div>
											</div>
											<label id="margin_rate-error" class="error" for="margin_rate"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="palrating-div" style="display: none;">
											<label class="col-md-2"> Upload Documents:<span class="mandatory" style="color:red">*</span></label>
											<div class="col-md-4">
												<input type="file" name="uplode_document[]" id="uplode_document" class="form-control" multiple="true" />
												<label id="uplode_document-error" class="error" for="uplode_document"></label>
											</div>
										</div>
										<div class="palrating-div-c" style="display: none;">
											<label class="col-md-2"> Select Client name:<span class="mandatory" style="color:red">*</span></label>
											<div class="col-md-4">
												<?php echo form_dropdown('client_id',$user,'','class="form-control" id="client_id"') ?>
	                                             <label id="client_id-error" class="error" for="client_id"></label>
											</div>

										</div>
									</div>
									<div class="form-group palrating-div-c" style="display: none;">
										<label class="col-md-2"> Prospect title:<span class="mandatory" style="color: red">*</span></label>
										<div class="col-md-4">
											<?php echo form_dropdown('requirement_id',$pdata,'','class="form-control" id="requirement_id"') ?>
											<label id="requirement_id-error" class="error" for="requirement_id"></label>
										 </div>
									</div>
									<div class="form-group palrating1-div" style="display: none;">
										<label class="col-md-2"> Upload I9 document:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="file" name="uplode_inine" id="uplode_inine" class="form-control" />
											<label id="uplode_inine-error" class="error" for="uplode_inine"></label>
										</div>
										<label class="col-md-2"> Upload social security document:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="file" name="uplode_social" id="uplode_social" class="form-control" />
                                             <label id="uplode_social-error" class="error" for="uplode_social"></label>
										</div>
									</div>
									<div class="form-group palrating1-div demo-masked-input" style="display: none;">
										<label class="col-md-2"> Upload identity document:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="file" name="uplode_identity" id="uplode_identity" class="form-control" />
											<label id="uplode_identity-error" class="error" for="uplode_identity"></label>
										</div>
										<label class="col-md-2"> Date and time:<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
											<input type="text" name="date_time" id="date_time" class="form-control datetime" placeholder="Ex: 30/07/2016 23:59" value="">
											<label id="date_time-error" class="error" for="date_time"></label>
										</div>
									</div>
									<div class="form-group palrating1-div" style="display: none;">
										<label class="col-md-2"> E-verify:</label>
										<div class="col-md-4">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" style="text-align:left;">
													<input type="checkbox" name="E_verify" class="filled-in" id="E_verify" value="E_verify">
													<label for="E_verify"></label>
												</span>
											</div>
											<label id="E_verify-error" class="error" for="E_verify"></label>
										</div>
										<label class="col-md-2"> Authorization:</label>
										<div class="col-md-4">
											<div class="input-group input-group-lg">
												<span class="input-group-addon" style="text-align:left;">
													<input type="checkbox" name="authorization" class="filled-in" id="authorization" value="authorization">
													<label for="authorization"></label>
												</span>
											</div>
											<label id="authorization-error" class="error" for="authorization"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="palrating2-div" style="display: none;">
											<label class="col-md-2"> Upload E-verify document:<span class="mandatory" style="color:red">*</span></label>
											<div class="col-md-4">
												<input type="file" name="e_verify" id="e_verify" class="form-control" />
												<label id="uplode_inine-error" class="error" for="e_verify"></label>
											</div>
										</div>
										<div class="palrating3-div" style="display: none;">
											<label class="col-md-2"> Upload Authorization document:<span class="mandatory" style="color:red">*</span></label>
											<div class="col-md-4">
												<input type="file" name="uplode_social" id="uplode_social" class="form-control" />
	                                             <label id="uplode_social-error" class="error" for="uplode_social"></label>
											</div>
										</div>
									</div>
									<div class="form-group palrating4-div" style="display: none;">
									 <label class="col-md-2"> Termination:</label>
                                      <div class="col-md-4">
                                      	<div class="input-group input-group-lg">
                                      	<span class="input-group-addon" style="text-align:left;">
                                            <input type="radio" name="termination" class="ig_radio" id="termination" value="termination">
                                            <label for="termination">Client</label>
                                           </span>
                                           <span class="input-group-addon" style="text-align:left;">
                                            <input type="radio" name="termination" class="ig_radio" id="termination1" value="unauthorized">
                                            <label for="termination1">Unauthorized</label>
                                           </span>
                                           <span class="input-group-addon" style="text-align:left;">
                                            <input type="radio" name="termination" class="ig_radio" id="termination2" value="skillset">
                                            <label for="termination2">Skills set do not match</label>
                                           </span>
                                        </div>
                                        <label id="termination-error" class="error" for="termination"></label>
                                        </div>
                                    </div>
									<div class="form-group">
										  <div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $ljp_data[0]['contractor_id']; ?>">
											<button type="submit" class="btn btn-success"> Update </button>
											<a href="<?php echo site_url('sales/contractors/') ?>" class="btn btn-default">Back</a>
										</div>
									</div>
								<?php echo form_close(); ?>
								<span style="clear: both;"></span>
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
							required:false,
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
						},
						client_par_rate:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='Close';
                            },
                            regex: /^[0-9]\d{0,9}(\.\d{1,2})?%?$/,

						},
						contractor_rate:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='Close';
                            },
                            regex: /^[0-9]\d{0,9}(\.\d{1,2})?%?$/,

						},
						"uplode_document[]":{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='Close';
                            },
                           extension: "pdf|doc|docx",
                        },
						margin_rate:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='Close';
                            },
                            regex: /^[0-9]\d{0,9}(\.\d{1,2})?%?$/,

						},
						uplode_inine:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='joined';
                            },
                           extension: "pdf|doc|docx",
                        },
                        uplode_social:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='joined';
                            },
                           extension: "pdf|doc|docx",
                        },
                        uplode_identity:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='joined';
                            },
                           extension: "pdf|doc|docx",
                        },
                         date_time:{
							required: function (el) {
                                return $(el).closest('form').find('#current_status').val()=='joined';
                            },
                          
					},
					},
					messages: {
						   contractor_name: {
							required: "Please enter name",
							regex: "Special character and Number not allowed"
						},
						designation_of_cntractors: {
							required:"Please enter designation",
							regex: "Special character and Number not allowed"
						}, 
						zip_code: {
							required:"Please enter Zip/Post code",
							number:"Alphabet and Special character not allowed"
						},
						experience: {
							required:"Please enter experience",
							required:"only number is allowed here"
						},
						skill_set:{
							required:"Please enter your skills",
							regex:"Number and Special Contractor not allowed"
						},
						address: {
                           required:"Please Enter Address"
						},
						email_id: {
							required: "Please enter a email address.",
							email: "Please enter a valid email address.",
							regex: "Please enter a valid email without spacial chars, ie, Example@gmail.com"
						},
						mobile_no: {
							required:"Please enter mobile no",
							number: "Please enter a valid phone number",
							minlength: "Your phone must be at min 7 digits",
							maxlength: "Your phone must be at max 10 digits"
						},
						resume_upload: {
							required: "Please upload resume",
							extension: " Only Those file are allowed. Ex: docx,doc,pdf"
						},
						client_par_rate: {
							required: "Please enter client par rate",
							regex: "Only integer as well as tow decimal point allowed "
						},
						contractor_rate: {
							required: "Please enter contractors rate",
							regex: "Only integer as well as tow decimal point allowed "
						},
						margin_rate: {
							required: "Please enter margin rate",
							regex: "Only integer as well as tow decimal point allowed "
						},
						"uplode_document[]": {
							required: "Please upload document",
							extension: "Only Those file are allowed. Ex: docx,doc,pdf"
						},
						uplode_inine: {
							required: "Please upload document",
							extension: "Only Those file are allowed. Ex: docx,doc,pdf"
						},
						uplode_social: {
							required: "Please upload document",
							extension: "Only Those file are allowed. Ex: docx,doc,pdf"
						},
						uplode_identity: {
							required: "Please upload document",
							extension: "Only Those file are allowed. Ex: docx,doc,pdf"
						},
						date_time: {
							required: "Please enter date",
							},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						var uplode_documentinput = $('#uplode_document')[0];
						if( uplode_documentinput.files.length > 0 ){
							$.each(uplode_documentinput.files, function(k,file){
								formData.append('uplode_document[]', file);
							});
						}
						if($('#uplode_inine')[0].files[0]!==''){
							formData.append('uplode_inine', $('#uplode_inine')[0].files[0]);
						}
						if($('#uplode_social')[0].files[0]!==''){
							formData.append('uplode_social', $('#uplode_social')[0].files[0]);
						}
						if($('#uplode_identity')[0].files[0]!==''){
							formData.append('uplode_identity', $('#uplode_identity')[0].files[0]);
						}
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
						formData.append('org_id', $('#org_id').val());
						formData.append('contractor_id', $('#contractor_id').val());
						formData.append('client_par_rate', $('#client_par_rate').val());
						formData.append('contractor_rate', $('#contractor_rate').val());
						formData.append('margin_rate', $('#margin_rate').val());
						formData.append('user_id', $('#user_id').val());
						formData.append('date_time', $('#date_time').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'+resD.msg+'</div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('sales/contractors') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>'+resD.msg+'</div>';
									$('#massage').html(html);
									
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
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
            //Dollar Money
    		$demoMaskedInput.find('.money-dollar').inputmask('999.99', { placeholder: '___.__' });
    		 //Date Time
    		$demoMaskedInput.find('.datetime').inputmask('d/m/y h:s', { placeholder: '__/__/____ __:__', alias: "datetime", hourFormat: '24' });
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
			$(document).ready(function(){
				var futRat = $('#future_rating').val();
				var payRat = $('#pay_rate_rating').val();
				var expRat = $('#experience_rating').val();
				if(futRat > 0){for (var i = 1; i <= futRat; i++) {$('#star1 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
				if(payRat > 0){for (var i = 1; i <= payRat; i++) {$('#star2 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
				if(expRat > 0){for (var i = 1; i <= expRat; i++) {$('#star3 > .star-'+i).removeClass('fa-star-o fa').addClass('fa-star fa');}}
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				if ( $('#current_status').val() == 'Close') {
					$(".palrating-div").css({'display':'block'});
					$(".palrating-div-c").css({'display':'block'});
					$('.palrating1-div').css({'display':'none'});
				} else if($('#current_status').val() == 'joined'){
					$(".palrating1-div").css({'display':'block'});
					$(".palrating-div-c").css({'display':'block'});
					$('.palrating-div').css({'display':'none'});
				} else {
					$('.palrating-div').css({'display':'none'});
					$('.palrating1-div').css({'display':'none'});
					$('.palrating-div-c').css({'display':'none'});
				}
			});
			$(document).on('change','#current_status', function() {
				if ( $(this).val() == 'Close') {
					$(".palrating-div").css({'display':'block'});
					$(".palrating-div-c").css({'display':'block'});
					$('.palrating1-div').css({'display':'none'});
				} else if($(this).val() == 'joined'){
					$(".palrating1-div").css({'display':'block'});
					$(".palrating-div-c").css({'display':'block'});
					$('.palrating-div').css({'display':'none'});

				} else {
					$('.palrating-div').css({'display':'none'});
					$('.palrating1-div').css({'display':'none'});
					$('.palrating-div-c').css({'display':'none'});
				}
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				if ( $('#current_status').val() == 'Terminated') {
					$(".palrating4-div").css({'display':'block'});
				} else {
					$('.palrating4-div').css({'display':'none'});
					
					
				}
			});
			$(document).on('change','#current_status', function() {
				if ( $(this).val() == 'Terminated') {
					$(".palrating4-div").css({'display':'block'});
					} else {
					$('.palrating4-div').css({'display':'none'});
					}
			});
		</script>
		<script type="text/javascript">
		    $(document).on('change','#client_id',function(){
		        var client_id = $(this).val();
		        var formData = new FormData();
		        formData.append('client_id', client_id);
		        if(client_id!=''){
		          $.ajax({
		            url: "<?php echo base_url('sales/contractors/get_prospect'); ?>",
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
		                $.each(resD.prospect, function(k, v) {
		                  if(k!=''){
		                    htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
		                  }
		                });
		              }
		              $("#requirement_id").html(htmlSelect);
		            }
		          });
		        }
		    });
			$(document).on('click','#E_verify', function() {
				if($(this).is(':checked') == true){
					$(".palrating2-div").css({'display':'block'});
				} else {
					$('.palrating2-div').css({'display':'none'});
				}
			});
			$(document).on('click','#authorization', function() {
				if($(this).is(':checked') == true){
					$(".palrating3-div").css({'display':'block'});
				} else {
					$('.palrating3-div').css({'display':'none'});
				}
			});
	    </script>
		