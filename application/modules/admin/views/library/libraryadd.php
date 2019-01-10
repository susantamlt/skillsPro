		<section class="content">
			<input type="hidden" name="page" id="page" value="library" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Library</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/library/library_save', array('id' =>'library_form','name'=>'library_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
								   <div class="form-group">
										<label class="col-md-2"> Topic Name <span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<?php echo form_dropdown('topic_id',$pdata,'','class="form-control" id="topic_id"') ?>
											<label id="topic_id-error" class="error" for="topic_id"></label>
										</div>
										  <label class="col-md-2">Course Name</label>
                                        <div class="col-md-4">
                                           <?php echo form_dropdown('course_id',$cdata,'','class="form-control" id="course_id"') ?>
                                            <label id="course_id-error" class="error" for="course_id"></label>
									    </div>
									</div>
									<div class="form-group">
										<label class="col-md-2"> Chapter Name <span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="chapter_name" id="chapter_name" class="form-control" value="" placeholder="Chapter Name" />
											<label id="chapter_name-error" class="error" for="chapter_name"></label>
										</div>
										  <label class="col-md-2">Object Name </label>
                                        <div class="col-md-4">
                                            <input type="text" name="object_name" id="object_name" class="form-control" value="" placeholder="Object Name" />
                                            <label id="object_name-error" class="error" for="object_name"></label>
									    </div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Object Title<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="object_title" id="object_title" class="form-control" value="" placeholder="Object Title" />
											<label id="object_title-error" class="error" for="object_title"></label>
										</div>
										  <label class="col-md-2"> Upload Library File  </label>
                                        <div class="col-md-4">
                                          <input type="file" name="file_upload" id="file_upload" class="form-control" value="" placeholder="Upload File" />
                                           <label id="file_upload-error" class="error" for="file_upload"></label>
									    </div>
									</div>
									<div class="form-group">
										<label class="col-md-2">Object URL<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-10">
											<input type="text" name="url" id="url" class="form-control" value="" placeholder="Link" />
											<label id="url-error" class="error" for="url"></label>
										</div>
									</div>	
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/library/') ?>" class="btn btn-danger">Cancel</a>
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
			$(function(){
				$.validator.addMethod("regex",function(value, element, regexp) {
					if (regexp.constructor != RegExp)
						regexp = new RegExp(regexp);
					else if (regexp.global)
						regexp.lastIndex = 0;
					return this.optional(element) || regexp.test(value);
				},"Please check your input.");
				$("form[name='library_form']").validate({
					rules: {
						topic_id: {
							required: true,
						},
						course_id: {
							required: true,
						},
						chapter_name: {
							required: true,
						},
						object_name: {
							required: true,
						},
					},
					messages: {
						topic_id: {
							required: "Please enter name",
						},
						course_id: {
							required: "Please enter course name"
						},
						chapter_name: {
							required: "Please enter chapter name"
						},
						object_name: {
                              required:"Please enter object name"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
                     event.preventDefault();
            // using this page stop being refreshing
                     var formData = new FormData();
                     if($('#file_upload')[0].files[0]!==''){
                        formData.append('file_name', $('#file_upload')[0].files[0]);
                          }
						formData.append('topic_id', $('#topic_id').val());
						formData.append('course_id', $('#course_id').val());
						formData.append('chapter_name', $('#chapter_name').val());
						formData.append('object_name', $('#object_name').val());
						formData.append('object_title', $('#object_title').val());
						formData.append('url', $('#url').val());
						formData.append('user_id', $('#user_id').val());
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
										location.href = "<?php echo site_url('admin/library') ?>";
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
