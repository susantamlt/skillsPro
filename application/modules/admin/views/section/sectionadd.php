		<section class="content">
			<input type="hidden" name="page" id="page" value="section" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Section</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/section/section_save', array('id' =>'section_form','name'=>'section_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                                     <div class="form-group">
                                        <label class="col-md-2">Topic<span class="mandatory" style="color: red">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo form_dropdown('topic_id',$ljp_topic,'','class="form-control" id="topic_id"') ?>
                                           <label id="class_name-error" class="error" for="class_name"></label>
                                        </div>
                                        <label class="col-md-2">Course Name<span class="mandatory" style="color: red">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo form_dropdown('course_id',$ljp_course,'','class="form-control" id="course_id"') ?>
                                         <label id="course_id-error" class="error" for="course_id"></label>
                                        </div>
                                     </div>
									<div class="form-group">
										<label class="col-md-2"> Section Name<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="section_name" id="section_name" class="form-control" value="" placeholder="Section Name" />
											<label id="section_name-error" class="error" for="section_name"></label>
										</div>
								    </div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/section/') ?>" class="btn btn-danger"> Cancel </a>
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
				$("form[name='section_form']").validate({
					rules: {
						section_name: {
							required: true,
							regex: /^[a-zA-Z ]*$/,
						},
						course_id:{
							required:true,

						},
					},
					messages: {
						section_name: {
							required: "Please enter name",
							regex: "Special characters and Number not allowed"
						},
						course_id: {
							required: "Please select Course name"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
                     event.preventDefault();
            // using this page stop being refreshing
                     var formData = new FormData();
						formData.append('section_name', $('#section_name').val());
						formData.append('course_id', $('#course_id').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Section successfully Save</div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/section/sectionlist') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> Section already exists in the list.</div>';
									$('#massage').html(html);
								}
							}
						});
					}
				});
			});
		</script>
    <script type="text/javascript">
     $(document).on('change','#topic_id',function(){
        var topic_id = $(this).val();
        var formData = new FormData();
        formData.append('topic_id', topic_id);
        if(topic_id!=''){
          $.ajax({
            url: "<?php echo base_url('admin/section/get_course'); ?>",
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
                $.each(resD.section, function(k, v) {
                  if(k!=''){
                    htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                  }
                });
              }
              $("#course_id").html(htmlSelect);
            }
          });
        }
      });
    </script>