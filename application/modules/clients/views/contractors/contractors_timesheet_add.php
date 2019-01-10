
		<section class="content">
			<input type="hidden" name="page" id="page" value="clients" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Contractor Timesheet</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('clients/contractors/contractors_timesheet_save', array('id' =>'timesheet_form','name'=>'timesheet_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Date Opened <span class="mandatory" style="color: red">*</span></label>
											<div class="col-md-4">
												<input type="text" name="date" id="date" class="form-control datepicker" value="" placeholder="dd/mm/yyyy" />
												<label id="date-error" class="error" for="date"></label>
											</div>
										<label class="col-md-2"> Time :</label>
										<div class="col-md-4">
											<input type="text" name="time" id="time" class="form-control" value="" placeholder="time" />
											<label id="time-error" class="error" for="time"></label>
										</div>
									</div>									
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['clients_org_id']; ?>">
											<input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $_SESSION['requirement_id']; ?>">
											<input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $_SESSION['contractor_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('clients/contractors/contractors_view') ?>/<?php echo $_SESSION['contractor_id']; ?>" class="btn btn-default">Cancel</a>
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
				$("form[name='timesheet_form']").validate({
					rules: {
						date :{
							required:true,
						},
						time_name :{
							required:true,
						},						
					},
					messages: {
						date :{
							required:"Please Enter your date",
						},
						time_name :{
							required:"Please Enter your time",
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('date', $('#date').val());
						formData.append('hours', $('#time').val());
						formData.append('requirement_id', $('#requirement_id').val());
						formData.append('contractor_id', $('#contractor_id').val());
						formData.append('org_id', $('#org_id').val());
						formData.append('cts_id','');
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
										location.href = "<?php echo site_url('clients/contractors/contractors_view') ?>/<?php echo $_SESSION['contractor_id']; ?>";
									}, 5000);
								} else {
								var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This value already exists in the list.</div>';
									$('#massage').html(html); 
								}
							}
						});
					}
				});
			});
		</script>