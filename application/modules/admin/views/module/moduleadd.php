		<section class="content">
			<input type="hidden" name="page" id="page" value="module" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add module</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/module/module_save', array('id' =>'module_form','name'=>'module_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                                     <div class="form-group">
                                        <label class="col-md-2">Course Name<span class="mandatory" style="color: red">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo form_dropdown('course_id',$ljp_course,'','class="form-control" id="course_id"') ?>
                                         <label id="course_id-error" class="error" for="course_id"></label>
                                        </div>
                                        <label class="col-md-2">Section Name<span class="mandatory" style="color: red">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo form_dropdown('section_id',$ljp_section,'','class="form-control" id="section_id"') ?>
                                         <label id="section_id-error" class="error" for="section_id"></label>
                                        </div>
                                     </div>
									<div class="form-group">
										<label class="col-md-2"> Module Name<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<input type="text" name="module_name" id="module_name" class="form-control" value="" placeholder="Module Name" />
											<label id="module_name-error" class="error" for="module_name"></label>
										</div>
										<label class="col-md-2"> Active<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<?php $ljp_active=array(''=>'--Select One--','Y'=>'Active','N'=>'In Active'); ?>
											<?php echo form_dropdown('is_active',$ljp_active,'','class="form-control" id="is_active"') ?>
											<label id="is_active-error" class="error" for="is_active"></label>
								    </div>
								</div>
								    <div class="form-group">
								    	<label class="col-md-2"> Contain Type<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<?php $ljp_type=array(''=>'--Select One--','V'=>'Video','A'=>'Audio','T'=>'Text','P'=>'PDF','E'=>'Excel','C'=>'CSV','W'=>'Website/Blog Link','S'=>'Twitter/Facebook Content'); ?>
											<?php echo form_dropdown('contect_type',$ljp_type,'','class="form-control" id="contect_type"') ?>
											<label id="contect_type-error" class="error" for="contect_type"></label>
										</div>
								    </div>
								    
								    <div class="form-group" id="Dynamic_link_upload">
								    	<label class="col-md-2" name="link_name_label" id = "link_name_label"></label>
								    	<div class="col-md-4" id="labeldiv">
								    		<input type="text" name="link_input_value" id="link_input_value" class="form-control" value="" placeholder="Link"/>
								    		<label id="link_input_value_error" class="error" for="link_input_value"></label>
								    	</div>
								    	<label class="col-md-2" name ="file_upload_label" id="file_upload_label"></label>
								    	<div class="col-md-4" id="filediv">
								    		<input type="file" name="file_upload_value" id="file_upload_value" class="form-control" value="" placeholder="Link"/>
								    		<label id="file_upload_value_error" class="error" for="file_upload_value"></label>
								    	</div>
								    </div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/module/') ?>" class="btn btn-danger"> Cancel </a>
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
				$("form[name='module_form']").validate({
					rules: {
						section_name: {
							required: true,
							regex: /^[a-zA-Z ]*$/,
						},
						course_id:{
							required:true,
						},
						section_id :{
							required:true,
						},
						contect_type:{
							required:true,
						},
						is_active:{
                          required:true,

						},
						link_input_value: {
							required:function() {
								if (($("#contect_type").val()=='V' || $("#contect_type").val()=='A')  && $("#file_upload_value").val()=='' ) {
									return true;
								} else if($("#contect_type").val()=='W' || $("#contect_type").val()=='S'){
									return true;
								} else {
									return false;
								}
							},
						},
						file_upload_value: {
							required:function() {
								if (($("#contect_type").val()=='V' || $("#contect_type").val()=='A'|| $("#contect_type").val()=='T')  && $("#link_input_value").val()=='' ) {
									return true;
								} else if($("#contect_type").val()=='W' || $("#contect_type").val()=='S'){
									return false;
								} else {
									return false;
								}
							},
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
						section_id: {
							required: "Please select Section name"
						},
						contect_type: {
							required:"Please select content type"
						},
						is_active :{
							required:"Select status"
						},
						link_input_value: {
							required: "Link is required if file is not upload"
						},
						file_upload_value: {
							required:"File Upload is required if Link not given"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
                     	event.preventDefault();
            			// using this page stop being refreshing
                     	var formData = new FormData();
                     	if($('#file_upload_value')[0].files[0]!=='') {
                         	formData.append('content', $('#file_upload_value')[0].files[0]);
                         }
						formData.append('module_name', $('#module_name').val());
						formData.append('content_link', $('#link_input_value').val());
						formData.append('section_id', $('#section_id').val());
						formData.append('is_active', $('#is_active').val());
						formData.append('content_type', $('#contect_type').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Module successfully Save</div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/module/modulelist') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> Module already exists in the list.</div>';
									$('#massage').html(html);
								}
							}
						});
					}
				});
			});
		</script>
    <script type="text/javascript">
     $(document).on('change','#course_id',function(){
        var course_id = $(this).val();
        var formData = new FormData();
        formData.append('course_id', course_id);
        if(course_id!=''){
          $.ajax({
            url: "<?php echo base_url('admin/module/get_section'); ?>",
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
                $.each(resD.sectionData, function(k, v) {
                  if(k!=''){
                    htmlSelect += '<option value="'+ k +'">'+ v +'</option>';
                  }
                });
              }
              $("#section_id").html(htmlSelect);
            }
          });
        }
      });
     $(document).ready(function(){
    	$("#Dynamic_link_upload").css("display","none");
     	  $("select[id='contect_type']").on('change',function(e){
     		selected_value = $(this).val();
     		if(selected_value === ""){
     			$("#Dynamic_link_upload").css("display","none");
     		}else{
     			$("#Dynamic_link_upload").css("display","block");
     			if(selected_value === "V"){
     				$("#labeldiv").css("display","inline");
     				$("#link_name_label").css("display","inline");
     				$("#link_name_label").text("Video Link");
     				$("#file_upload_label").css("display","inline");
     				$("#filediv").css("display","inline");
     				$("#file_upload_label").text("Video File Upload");
     			}else if(selected_value === "A"){
     				$("#labeldiv").css("display","inline");
     				$("#link_name_label").css("display","inline");
     				$("#link_name_label").text("Audio Link");
     				$("#file_upload_label").css("display","inline");
     				$("#filediv").css("display","inline");
     				$("#file_upload_label").text("Audio File Upload");
     			}else if(selected_value === "T"){
     				$("#labeldiv").css("display","none");
     				$("#filediv").css("display","inline");
     				$("#file_upload_label").text("Text File Upload");
     				$("#file_upload_label").css("display","inline");
     				$("#link_name_label").css("display","none");
     			}else if(selected_value === "E"){
     				$("#labeldiv").css("display","none");
     				$("#filediv").css("display","inline");
     				$("#file_upload_label").text("Excel File Upload");
     				$("#file_upload_label").css("display","inline");
     				$("#link_name_label").css("display","none");
     			}else if(selected_value === "C"){
     				$("#labeldiv").css("display","none");
     				$("#filediv").css("display","inline");
     				$("#file_upload_label").text("CSV File Upload");
     				$("#file_upload_label").css("display","inline");
     				$("#link_name_label").css("display","none");
     			}else if(selected_value === "P"){
     				$("#labeldiv").css("display","none");
     				$("#filediv").css("display","inline");
     				$("#file_upload_label").text("PDF File Upload");
     				$("#file_upload_label").css("display","inline");
     				$("#link_name_label").css("display","none");
     			}else if(selected_value === "W"){
     				$("#labeldiv").css("display","inline");
     				$("#link_name_label").css("display","inline");
     				$("#link_name_label").text("Website Link");
     				$("#file_upload_label").css("display","none");
     				$("#filediv").css("display","none");
     			}else if(selected_value === "S"){
     				$("#labeldiv").css("display","inline");
     				$("#link_name_label").css("display","inline");
     				$("#link_name_label").text("Social Link");
     				$("#file_upload_label").css("display","none");
     				$("#filediv").css("display","none");
     			}
     		}
     		
    	 });
     });
   
    </script>