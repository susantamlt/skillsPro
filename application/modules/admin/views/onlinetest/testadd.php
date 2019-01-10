		<section class="content">
			<input type="hidden" name="page" id="page" value="test" />
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>Add Test</h2>
							</div>
							<div id="massage"></div>
							<div class="body">
								<?php echo form_open_multipart('admin/test/test_save', array('id' =>'test_form','name'=>'test_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
									<div class="form-group">
									<label class="col-md-2">Course Name<span class="mandatory" style="color:red">*</span></label>
										<div class="col-md-4">
										    <?php echo form_dropdown('course_id',$ljp_course,'','class="form-control" id="course_id"') ?>
											<label id="course_id-error" class="error" for="course_id"></label>
										</div>
										<label class="col-md-2">Test Type</label>
								        <div class="col-md-4">
								         <?php $question_type = array('' =>'--select one--','E'=>'Easy','M'=>'Medium','H'=>'Hard'); ?>
								        <?php echo form_dropdown('question_type',$question_type,'','class="form-control" id="question_type"') ?>
								        <label id="question_type-error" class="error" for="question_type"></label>
								        </div>
								    </div>
								    <div class="form-group">
								    	<label class="col-md-2">Test Name<span class="mandatory" style="color:red">*</span></label>
								    	<div class="col-md-4">
								    		<input type="text" name="online_test_name" id="online_test_name" class="form-control" value="" placeholder="Test Name"/>
								    		<label id="online_test_name-error" class="error" for="online_test_name"></label>
								    	</div>
								    	<label class="col-md-2">Status</label>
								        <div class="col-md-4">
								        	<?php $status=array(''=>'--Select One--','Y'=>'Active','N'=>'In Active') ?>
								        	<?php echo form_dropdown('status',$status,'','class="form-control" id="status"'); ?>
								        	<label id="status-error" class="error" for="status"></label>
								        </div>
								     </div>
								       <div class="form-group">
								     	<label class="col-md-2">Test Duration</label>
								     	<div class="col-md-4">
								     		<input type="time" id="time" name="time" class="form-control" placeholder="hh:ss" />
								     	</div>
								     </div>
								    <div class="form-group demo-masked-input">
								       <label class="col-md-2"> Start Date </label>
                                        <div class="col-md-4">
                                        	<input type="text" id="start_date" name="start_date" class="date form-control" placeholder="mm/dd/yyyy" />
                                        	<label id="start_date-error" class="error" for="start_date"></label>
                                        </div>
								  	      <label class="col-md-2">End Date</label>
								  	     <div class="col-md-4">
								  	        <input type="text" name="end_date" id="end_date" class="date form-control" value="" placeholder="mm/dd/yyyy"/>
								  	        <label id="end_date-error" class="error" for="end_date"></label>
								        </div>
								    </div>
									<div class="form-group">
										<div class="col-md-12">
											<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
											<input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
											<button type="submit" class="btn btn-success"> Save </button>
											<a href="<?php echo site_url('admin/test/') ?>" class="btn btn-danger"> Cancel </a>
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
  <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>