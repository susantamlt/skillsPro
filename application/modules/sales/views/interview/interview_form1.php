    <section class="content">
      <input type="hidden" name="page" id="page" value="interview" />
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>Create interview</h2>
                </div>
                <div id="massage"></div>
                <div class="body">
                  <div class="container-fluid">
                    <h4>Interview Information</h4>
                  <?php echo form_open_multipart('sales/interview/', array('id'=>'contractors_form','name'=>'interview_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                   <!--  <div class="form-group">
                      <label class="col-md-2"> Interview Schedule by client:<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                          <?php echo form_dropdown('client_id',$user,'','class="form-control" id="client_id"') ?>
                          <label id="client_id-error" class="error" for="client_id"></label>
                      </div>
                      <label class="col-md-2"> Prospect title<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                         <?php echo form_dropdown('requirement_id',$pdata,'','class="form-control" id="requirement_id"') ?>
                          <label id="requirement_id-error" class="error" for="requirement_id"></label>
                      </div>
                    </div> -->
                    <div class="form-group">
                         <label class="col-md-2"> Interview Name </label>
                         <div class="col-md-4">
                         <?php $array = array(''=>'--Select One--','Internal Interview'=> 'Internal Interview','General Interview'=>'General Interview','Online Interview'=>'Online Interview','Phone Interview'=>'Phone Interview','Level 1 Interview'=>'Level 1 Interview','Level 2 Interview'=>'Level 1 Interview','Level 3 Interview'=>'Level 3 Interview','Level 4 Interview'=>'Level 4 Interview'); ?>
                      <?php echo form_dropdown('interview_name',$array,'','class="form-control" id="interview_name"') ?>
                      <label id="interview_name-error" class="error" for="interview_name"></label>
                    </div>
                    <label class="col-md-2">Client Name</label>
                    <div class="col-md-4">
                       <?php echo form_dropdown('client_name',$user,'','class="form-control" id="client_name"') ?>
                          <label id="client_name-error" class="error" for="client_name"></label>
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">Interview Status</label>
                      <?php $array=array(''=>'--Select One--','');?>
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
                  </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['sales_org_id']; ?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['sales_user_id']; ?>">
                       <!--  <input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $id;?>"> -->
                        <button type="submit" class="btn btn-success"> Schedule </button>
                        <a href="<?php echo site_url('sales/interview/') ?>" class="btn btn-default">Back</a>
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
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();
            // using this page stop being refreshing
            var formData = new FormData();
            formData.append('requirement_id', $('#requirement_id').val());
            formData.append('interview_date', $('#interview_date').val());
            formData.append('interview_time', $('#interview_time').val());
            formData.append('org_id', $('#org_id').val());
            formData.append('user_id', $('#user_id').val());
            formData.append('contractor_id', $('#contractor_id').val());           
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
                  var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong>'+resD.msg+'</div>';
                  $('#massage').html(html);
                  window.setTimeout(function () {
                    location.href = "<?php echo site_url('recruiter/contractors') ?>";
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
       <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>
     
