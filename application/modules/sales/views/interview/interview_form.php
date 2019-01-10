    <section class="content">
      <input type="hidden" name="page" id="page" value="interview" />
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>Assign for interview</h2>
                </div>
                <div id="massage"></div>
                <div class="body">
                  <?php echo form_open_multipart('sales/interview/schedule_save', array('id'=>'interview_form','name'=>'interview_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                    <div class="form-group">
                      <label class="col-md-2">client Name:<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                          <?php echo form_dropdown('client_id',$user,'','class="form-control" id="client_id"') ?>
                          <label id="client_id-error" class="error" for="client_id"></label>
                      </div>
                      <label class="col-md-2"> Prospect title<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                         <?php echo form_dropdown('requirement_id',$pdata,'','class="form-control" id="requirement_id"') ?>
                          <label id="requirement_id-error" class="error" for="requirement_id"></label>
                      </div>
                    </div>
                    <div class=" form-group demo-masked-input">
                      <label class="col-md-2"> Date <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="interview_date" id="interview_date" class="date form-control" value="" placeholder="mm/dd/yyyy" />
                        <label id="interview_date-error" class="error" for="interview_date"></label>
                      </div>
                      <label class="col-md-2">  Time <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="interview_time" id="interview_time" class="time12 form-control" value="" placeholder="hh:mm am/pm" />
                        <label id="interview_time-error" class="error" for="interview_time"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Interview Status</label>
                      <div class="col-md-4">
                      <?php $array=array(''=>'--Select One--','0'=>'Shortlisted','1'=>'On-Hold','2'=>'Interview Schedule','3'=>'Rejected');?>
                       <?php echo form_dropdown('pc_status',$array,'','class="form-control" id="pc_status"') ?>
                    </div>
                    <label class="col-md-2">Interviewer</label>
                    <div class="col-md-4">
                       <input type="text" name="interviewer_name" id="interviewer_name" class=" form-control" value="" placeholder="interviewer_name" />
                        <label id=" interviewer_name-error" class="error" for=" interviewer_name"></label>
                    </div>
                    </div>
                      <div class="form-group">
                      <label class="col-md-2">Location</label>
                      <div class="col-md-4">
                       <input type="text" name="location" id="location" class="form-control" value="" placeholder="location" />
                        <label id="location-error" class="error" for="location"></label>
                    </div>
                    <label class="col-md-2">Candidate Name</label>
                      <div class="col-md-4">
                       <input type="text" name="candidate_name" id="candidate_name" class="form-control" value="" placeholder="Candidate Name" />
                        <label id="candidate_name-error" class="error" for="candidate_name"></label>
                    </div>
                  </div>
                  <div class="form-group">
                         <label class="col-md-2"> Interview Name </label>
                         <div class="col-md-4">
                         <?php $array = array(''=>'--Select One--','1'=> 'Internal Interview','2'=>'General Interview','4'=>'Online Interview','3'=>'Phone Interview','5'=>'Level 1 Interview','6'=>'Level 1 Interview','7'=>'Level 3 Interview','8'=>'Level 4 Interview'); ?>
                      <?php echo form_dropdown('interview_type',$array,'','class="form-control" id="interview_type"') ?>
                      <label id="interview_type-error" class="error" for="interview_type"></label>
                    </div>
                  </div>
                  <div class="form-group">
                  <label class="col-md-2">Schedule Comments</label>
                       <div class="col-md-4">
                          <textarea name="comment" id="comment" class="form-control"></textarea>
                         <label id="comment-error" class="error" for="comment"></label>
                       </div>
                         <label class="col-md-2"> File Upload </label>
                            <div class="col-md-4">
                            <input type="file" name="resume_upload" id="resume_upload" class="form-control" value="" placeholder="Upload Resume" />
                          <label id="resume_upload_error" class="error" for="resume_upload"></label>
                    </div>
                      </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
                        <input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $ljp_data[0]['contractor_id']; ?>">
                        <input type="hidden" name="pc_id" id="pc_id" value="<?php echo $ljp_data[0]['pc_id']; ?>">
                        <button type="submit" class="btn btn-success"> Schedule </button>
                        <a href="<?php echo base_url('sales/interview') ?>" type="button" class="btn btn-danger"style="border-radius:5px"> Back</a> 
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
       $("form[name='interview_form']").validate({
          rules: {
            client_id: {
              required: true,
            },
            requirement_id: {
              required: true,
            },
            interview_date: {
              required: true,
            },
            interview_time: {
              required:true,
            },
            pc_status: {
              required:true,
            },
            interview_type :{
              required:true,
            },
            comment: {
               required:true,
            },
          },
          messages: {
            client_id: {
              required: "Please enter assign client"
            },
            requirement_id:{
              required: "Please enter requirements"
            },
            interview_date: {
              required: "Please enter Date"
            },
            interview_time: {
              required: "Please enter time"
            },
            pc_status: {
              required:"Please enter Status"
            },
            interview_type: {
              required:"Please Select Interview Name"
            },
            comment : {
                required:"Please enter comment"
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();
            // using this page stop being refreshing
            var formData = new FormData();
            if($('#resume_upload')[0].files[0]!==''){
              formData.append('file_name', $('#resume_upload')[0].files[0]);
            }
            formData.append('interview_date', $('#interview_date').val());
            formData.append('interview_time', $('#interview_time').val());
            formData.append('org_id', $('#org_id').val());
            formData.append('user_id', $('#user_id').val());
            formData.append('comment', $('#comment').val());           
            formData.append('requirement_id', $('#requirement_id').val());           
            formData.append('interviewer_name', $('#interviewer_name').val());           
            formData.append('interview_type', $('#interview_type').val());           
            formData.append('pc_status', $('#pc_status').val());           
            formData.append('location', $('#location').val());           
            formData.append('candidate_name', $('#candidate_name').val()); 
            formData.append('contractor_id', $('#contractor_id').val());                    
            formData.append('pc_id', $('#pc_id').val());                    
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
                  var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong></strong>Interview has been scheduled sucessfully.</div>';
                  $('#massage').html(html);
                  window.setTimeout(function () {
                    location.href = "<?php echo site_url('sales/interview') ?>";
                  }, 2000);
                } else {
                var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> '+resD.msg+' </div>';
                  $('#massage').html(html);
                }
              }
            });
          }
        });
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
     
