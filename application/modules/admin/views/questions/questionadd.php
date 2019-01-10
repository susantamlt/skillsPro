		<section class="content">
			<input type="hidden" name="page" id="page" value="questions" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Questions</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/questions/questions_save', array('id' =>'questions_form','name'=>'questions_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
										<label class="col-md-2">Course Name<span class="mandatory" style="color:red">*</span> </label>
										<div class="col-md-4">
											<?php echo form_dropdown('course_id',$ljp_questions,'','class="form-control" id="course_id"') ?>
											<label id="course_id-error" class="error" for="course_id"></label>
										</div>
										<label class="col-md-2">Question Level</label>
								        <div class="col-md-4">
								         <?php $question_type = array('' =>'--select one--','E'=>'Easy','M'=>'Medium','H'=>'Hard'); ?>
								        <?php echo form_dropdown('question_level',$question_type,'','class="form-control" id="question_level"') ?>
								        <label id="question_level-error" class="error" for="question_level"></label>
								        </div>
								    </div>
								    <div class="form-group">
								    	<label class="col-md-2">Allocated Marks<span class="mandatory" style="color:red">*</span></label>
								    	<div class="col-md-4">
								    		<input type="text" name="allocated_marks" id="allocated_marks" class="form-control" value="" placeholder="Marks"/>
								    		<label id="allocated_marks-error" class="error" for="allocated_marks"></label>
								    	</div>
								    	<label class="col-md-2">Option Type</label>
								        <div class="col-md-4">
								         <?php $question = array('' =>'--select one--','MCQ'=>'Radio','DESC'=>'Paragraph','MCQ2'=>'Multi Select','Text'=>'Single Line','DrDw'=>'Drop Down','Or'=>'Yes/No','Video'=>'Video Questions','Image'=>'Image Questions','Matrix'=>'Matrix Choice'); ?>
								        <?php echo form_dropdown('question_type',$question,'','class="form-control" id="question_type"') ?>
								        <label id="question_type-error" class="error" for="question_type"></label>
								        </div>
								    </div>
								  <div class="form-group" id="for_all_div">
								       <label class="col-md-2"> Question </label>
                                        <div class="col-md-10">
                                        	<textarea id="question" name="question" class="form-control" placeholder="Question"></textarea>
                                        	<label id="question-error" class="error" for="question"></label>
                                        </div>
								  </div>
								  <div class="form-group" id="for_radio_div">
								  	<lebel class="col-md-2">Options</lebel>
								  	<div class="col-md-4" id="option_div">
                                        	<input type="text" name="option1" id="option1" class="form-control" value="" placeholder="Option1"/>
                                        	<label id="option1-error" class="error" for="option1"></label>
                                        	<input type="text" name="option2" id="option2" class="form-control" value="" placeholder="Option 2"/>
								    		<label id="option2-error" class="error" for="option2"></label>
								    		<input type="text" name="option3" id="option3" class="form-control" value="" placeholder="Option 3"/>
								    		<label id="option3-error" class="error" for="option3"></label>
								    		<input type="text" name="option4" id="option4" class="form-control" value="" placeholder="Option 4"/>
								    		<label id="option4-error" class="error" for="option4"></label>
                                    </div>
                                    <label class="col-md-2">Right Answer<span class="mandatory" style="color: red">*</span></label>
                                      <div class="col-md-4">
                                      	<input type="text" name="right_answer" id="right_answer" placeholder="Answer" />
                                        <label id="section_id-error" class="error" for="section_id"></label>
                                      </div>
								  </div>
								  <div class="form-group" id="for_multiple_select_div">
								  	<lebel class="col-md-2" name="option_name" id="option_name">Options</lebel>
								  	<div class="col-md-4" id="option_div">
                                        	<input type="text" name="option1" id="option1" class="form-control" value="" placeholder="Option1"/>
                                        	<label id="option1-error" class="error" for="option1"></label>
                                        	<input type="text" name="option2" id="option2" class="form-control" value="" placeholder="Option 2"/>
								    		<label id="option2-error" class="error" for="option2"></label>
								    		<input type="text" name="option3" id="option3" class="form-control" value="" placeholder="Option 3"/>
								    		<label id="option3-error" class="error" for="option3"></label>
								    		<input type="text" name="option4" id="option4" class="form-control" value="" placeholder="Option 4"/>
								    		<label id="option4-error" class="error" for="option4"></label>
								    		<input type="text" name="option5" id="option5" class="form-control" value="" placeholder="Option 5"/>
								    		<input type="text" name="option6" id="option6" class="form-control" value="" placeholder="Option 6"/>
								    		<label id="option6-error" class="error" for="option6"></label>
                                        </div>
                                        <label class="col-md-2">Right Answer<span class="mandatory" style="color: red">*</span></label>
                                      <div class="col-md-4">
                                      	<input type="text" name="right_answer" id="right_answer" placeholder="Answer" />
                                        <label id="section_id-error" class="error" for="section_id"></label>
                                      </div>
								  </div>
								  <div class="form-group">
								  	<label class="col-md-2">Video Url</label>
								  	<div class="col-md-10">
								  	<input type="text" name="video_url" id="video_url" class="form-control" value="" placeholder="Url"/>
								  	<label id="video_url-error" class="error" for="video_url"></label>
								  </div>
								  </div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/questions/') ?>" class="btn btn-danger"> Cancel </a>
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
				$("form[name='questions_form']").validate({
					rules: {
						course_id: {
							required: true,
						},
						question_level:{
							required:true,
						},
						allocated_marks:{
							required:true,
							number:true,
						},
						question:{
							required:true,
						},
						question_type:{
							required:true,
						},
						video_url:{
							required:true,
						},
					},
					messages: {
						course_id: {
							required: "Please enter Course Name"
						},
						question_level: {
							required: "Please select type"
						},
						allocated_marks:{
							required:"Please Enter Marks",
							number:"Only integer allowed"
						},
						question_type:{
							required:"Please Enter Question Type"
						},
						question:{
							required:"Please Enter Question"
						},
						video_url:{
                             required:"Please Enter Url"
						},
					},
					onfocusout: function(element) {
						this.element(element);
					},
					submitHandler: function(form,event){
                     event.preventDefault();
            // using this page stop being refreshing
                     var formData = new FormData();
  						formData.append('course_id', $('#course_id').val());
						formData.append('question_level', $('#question_level').val());
						formData.append('marks_allocated', $('#allocated_marks').val());
						formData.append('question', $('#question').val());
						formData.append('question_type', $('#question_type').val());
						formData.append('video_url', $('#video_url').val());
						formData.append('option1', $('#option1').val());
						formData.append('option2', $('#option2').val());
						formData.append('option3', $('#option3').val());
						formData.append('option4', $('#option4').val());
						formData.append('option5', $('#option5').val());
						formData.append('option6', $('#option6').val());
						formData.append('right_answer', $('#right_answer').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!Question Added Successfully</strong></div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/questions/') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong>This Questions is already exist</div>';
									$('#massage').html(html);
								}
							}
						});
					}
				});
			});
			$(document).ready(function(){
    	 $("#for_all_div").css("display","none");
    	 $("#for_radio_div").css("display","none");
    	$("#for_multiple_select_div").css("display","none");
     	  $("select[id='question_type']").on('change',function(e){
     		selected_value = $(this).val();
     		if(selected_value === ""){
     			$("#for_all_div").css("display","none");
     			$("#for_radio_div").css("display","none");
     			$("#for_multiple_select_div").css("display","none");
     		}else{
     			$("#for_all_div").css("display","block");
     			$("#for_radio_div").css("display","block");
     			$("#for_multiple_select_div").css("display","block");
     			if(selected_value === "MCQ"){
     				$("#for_all_div").css("display","inline");
    	            $("#for_radio_div").css("display","inline");
    	            $("#for_multiple_select_div").css("display","none");
     			}else if(selected_value === "MCQ2"){
     				$("#for_all_div").css("display","inline");
    	            $("#for_radio_div").css("display","none");
    	            $("#for_multiple_select_div").css("display","inline");
     			}else if(selected_value === "DrDw"){
     				$("#for_all_div").css("display","inline");
    	            $("#for_radio_div").css("display","inline");
    	            $("#for_multiple_select_div").css("display","none");
     			}else if(selected_value === "Or"||"Video"||"Image"||"Matrix"||"Text"||"DESC"){
     				$("#for_all_div").css("display","inline");
     				$("#for_radio_div").css("display","none");
     				$("#for_multiple_select_div").css("display","none");
     			}
     		}
     		
    	 });
     });
		</script>
