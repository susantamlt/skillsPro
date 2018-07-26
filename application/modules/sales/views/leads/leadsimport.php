
		<section class="content">
			<input type="hidden" name="page" id="page" value="leads" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Import Leads</h2>
							</div>
							<div class="body">
								<?php echo form_open_multipart('sales/leads/leadsimport_save', array('id' =>'leads_form','name'=>'leads_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-1"> File <span class="mandatory">*</span></label>
										<div class="col-md-4">
											<input type="file" name="documentfile" id="documentfile" value="" placeholder="File">
											<label id="documentfile-error" class="error" for="documentfile"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('sales/leads/leadsformat') ?>" class="btn btn-warning">Download Template</a>
											<a href="<?php echo site_url('sales/leads/') ?>" class="btn btn-default">Cancel</a>
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
				$("form[name='leads_form']").validate({
					rules: {
						documentfile: {
							required: true,
							extension: "csv",
						},
					},
					messages: {
						documentfile: {
							required: "Please upload CSV",
							extension: "Those file are allowed. Ex: csv"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						var formData = new FormData();
						formData.append('contact_id', $('#contact_id').val());
						//formData.append('prospect_type_id', $('#prospect_type_id').val());
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
									window.setTimeout(function () {
										location.href = "<?php echo site_url('sales/leads') ?>";
									}, 5000);
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