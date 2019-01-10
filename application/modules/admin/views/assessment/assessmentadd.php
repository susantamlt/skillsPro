		<section class="content">
			<input type="hidden" name="page" id="page" value="assessment" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Assessment</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/test/assessment_save', array('id' =>'test_form','name'=>'test_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
									<label class="col-md-2">Asseeement Name<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
										   <input type="text" name="assessment_name" id="assessment_name" placeholder="Assessment Name" class="form-control"/>
											<label id="assessment_name-error" class="error" for="assessment_name"></label>
										</div>
										<label class="col-md-2">Category</label>
								        <div class="col-md-4">
								         <?php $question_type = array('' =>'--select one--','E'=>'Easy','M'=>'Medium','H'=>'Hard'); ?>
								         <?php echo form_dropdown('question_type',$question_type,'','class="form-control" id="question_type"') ?>
								        <label id="question_type-error" class="error" for="question_type"></label>
								        </div>
								    </div>
								    <div class="form-group">
								    	<label class="col-md-2">Description<span class="mandatory" style="color:red">*</span></label>
								    	<div class="col-md-10">
								    		<input type="text" name="description" id="description" class="form-control" value="" placeholder="Description"/>
								    		<label id="description-error" class="error" for="description"></label>
								    	</div>
								    </div>
								    <div class="form-group">
								        <label class="col-md-2">Question Type</label>
								        <div class="col-md-4">
								           <?php $question = array('' =>'--select one--','MCQ'=>'Radio','DESC'=>'Paragraph','MCQ2'=>'Multi Select','Text'=>'Single Line','DrDw'=>'Drop Down','Or'=>'Yes/No','Video'=>'Video Questions','Image'=>'Image Questions','Matrix'=>'Matrix Choice'); ?>
								            <?php echo form_dropdown('question_type',$question,'','class="form-control" id="question_type"') ?>
								        </div>
								        <label class="col-md-2">Status</label>
								        <div class="col-md-4">
								        	<?php $status=array(''=>'--Select One--','Y'=>'Active','N'=>'In Active') ?>
								        	<?php echo form_dropdown('status',$status,'','class="form-control" id="status"'); ?>
								        	<label id="status-error" class="error" for="status"></label>
								        </div>
								     </div>
								     <div class="form-group">
								     	<label class="col-md-2">Questions</label>
								     	<div class="col-md-4">
								     	 <?php echo form_dropdown('question_for_exam',$ljp_question,'','class="form-control" id="question_for_exam"') ?>
                                         <label id="question_for_exam-error" class="error" for="question_for_exam"></label>
                                        </div>
								     </div>
								       
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/assessment/') ?>" class="btn btn-danger"> Cancel </a>
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
				$("form[name='test_form']").validate({
					rules: {
						question_type:{
							required:true,
						},
						online_test_name:{
							required:true,
						},
						course_id:{
							required:true,
						},
						status:{
							required:true,
						},
						hour:{
							required:true,
						},
						start_date:{
							required:true,
						},
						end_date:{
							required:true,
						},
					},
					messages: {
						course_id: {
							required: "Please enter Course Name"
						},
						question_type: {
							required: "Please select type"
						},
						online_test_name:{
							required:"Please Enter Test Name"
						},
						status:{
							required:"Please Select Status"
						},
						hour:{
                             required:"Please Enter Hour"
						},
						start_date:{
							required:"Please enter start date"
						},
						end_date: {
							required:"Please enter End Date"
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
						formData.append('online_test_type', $('#question_type').val());
						formData.append('online_test_name', $('#online_test_name').val());
						formData.append('status', $('#status').val());
						formData.append('start_date', $('#start_date').val());
						formData.append('end_date', $('#end_date').val());
						formData.append('time_duration_hours', $('#time').val());
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
									var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!Test Added Successfully</strong></div>';
									$('#massage').html(html);
									window.setTimeout(function () {
										location.href = "<?php echo site_url('admin/test/testlist') ?>";
									}, 5000);
								} else { 
									var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong>This Test is already exist</div>';
									$('#massage').html(html);
								}
							}
						});
					}
				});
			});
		 </script>
		 <script type="text/javascript">
     $(document).on('change','#question_type',function(){
        var question_type = $(this).val();
        var formData = new FormData();
        formData.append('question_type',question_type);
        if(question_type!=''){
          $.ajax({
            url: "<?php echo base_url('admin/assessment/get_question'); ?>",
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
              $("#question_for_exam").html(htmlSelect);
            }
          });
        }
      });
  </script>
 <!--  <script type="text/javascript">
  $(document).ready(function() {
    $('.question_for_exam').multiselect({
      maxHeight: 400
    });
  });
</script> -->
  <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>