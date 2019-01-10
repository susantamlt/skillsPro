
		<section class="content">
			<input type="hidden" name="page" id="page" value="emailmessage" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Edit Template</h2>
							</div>
							<div class="body">
								<div id="message"></div>
								<?php echo form_open_multipart('sales/emailmessage/emailmessage_save', array('id' =>'emailmessage_form','name'=>'emailmessage_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2"> Template Type</label>
										<div class="col-md-4">
											<?php $template_type=array(''=>'--Select One--','SMS'=>'SMS','EMAIL'=>'EMAIL','NOTIFICATION'=>'NOTIFICATION') ?>
											<?php echo form_dropdown('template_type',$template_type,$results[0]['template_type'],'class="form-control" id="template_type"') ?>
											<label id="template_type-error" class="error" for="template_type"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Template Title </label>
										<div class="col-md-10">
											<input type="text"  name="template_title" id="template_title" class="form-control" value="<?php echo $results[0]['template_title']; ?>" placeholder="Template Title"/>
											<label id="template_title-error" class="error" for="template_title"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Template Content </label>
										<div class="col-md-10">
											<input type="text" type="text" name="template_content" id="template_content" class="form-control" value="<?php echo $results[0]['template_content']; ?>" placeholder="Template Content"/>
											<label id="template_content-error" class="error" for="template_content"></label>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
											<input type="hidden" name="message_temaplte_id" id="message_temaplte_id" value="<?php echo $results[0]['message_temaplte_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('sales/emailmessage/') ?>" class="btn btn-default">Cancel</a>
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
				$("form[name='emailmessage_form']").validate({
					rules: {
						template_type: {
							required: true,
						},
						template_title: {
							required:true,
						},
						template_content: {
							required: true,
						},
					},
					messages: {
						template_type: {
							required: "Please enter Template Type",
						},
						template_title: {
							regex: "Please enter Template Title"
						},
						template_content: {
							required: "Please enter Template Content",
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
						event.preventDefault();// using this page stop being refreshing
						
						var formData = new FormData();
						formData.append('template_type', $('#template_type').val());
						formData.append('template_title', $('#template_title').val());
						formData.append('template_content', $('#template_content').val());
						formData.append('message_temaplte_id', $('#message_temaplte_id').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Value Update Successfully.</div>';
									$('#message').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('sales/emailmessage') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This value already exists in the list.</div>';
									$('#message').html(html);
								}
							}
						});
					}
				});
			});
		</script>