    <section class="content">
      <input type="hidden" name="page" id="page" value="contractors" />
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>Assign for interview</h2>
                </div>
                <div id="massage"></div>
                <div class="body">
                  <?php echo form_open_multipart('recruiter/contractors/contractors_save', array('id'=>'contractors_form','name'=>'contractors_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                    <div class="form-group">
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
                      <div class="col-md-12">
                        <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['recruiter_user_id']; ?>">
                        <input type="hidden" name="contractor_id" id="contractor_id" value="<?php echo $id;?>">
                        <button type="submit" class="btn btn-success"> Schedule </button>
                        <a href="<?php echo base_url('recruiter/contractors') ?>" type="button" class="btn btn-danger"style="border-radius:5px"> Back</a> 
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
       $("form[name='contractors_form']").validate({
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
                  var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong></strong>Interview has been scheduled sucessfully.</div>';
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
    <script type="text/javascript">
     $(document).on('change','#client_id',function(){
        var client_id = $(this).val();
        var formData = new FormData();
        formData.append('client_id', client_id);
        if(client_id!=''){
          $.ajax({
            url: "<?php echo base_url('recruiter/contractors/get_prospect'); ?>",
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
     
