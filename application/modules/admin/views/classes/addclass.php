    <section class="content">
      <input type="hidden" name="page" id="page" value="classes" />
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>Add Class</h2>
                </div>
                <div id="massage"></div>
                <div class="body">
                  <?php echo form_open_multipart('admin/classes/class_save', array('id'=>'class_form','name'=>'class_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
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
                      <label class="col-md-2">Class Name<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                          <input type="text" name="class_name" id="class_name" value="" placeholder="Class Name" class="form-control"/>
                          <label id="class_name-error" class="error" for="class_name"></label>
                      </div>
                    </div>
                    <div class=" form-group demo-masked-input">
                      <label class="col-md-2">Start Date <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="start_date" id="start_date" class="date form-control" value="" placeholder="mm/dd/yyyy" />
                        <label id="start_date-error" class="error" for="start_date"></label>
                      </div>
                      <label class="col-md-2"> End Date<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="end_date" id="end_date" class="date form-control" value="" placeholder="mm/dd/yyyy" />
                        <label id="end_date-error" class="error" for="end_date"></label>
                      </div>
                    </div>
                    <div class=" form-group demo-masked-input">
                      <label class="col-md-2">Start Time <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="start_time" id="start_time" class="time12 form-control" value="" placeholder="hh:mm am/pm" />
                        <label id="start_time-error" class="error" for="start_time"></label>
                      </div>
                      <label class="col-md-2">End Time <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="end_time" id="end_time" class="time12 form-control" value="" placeholder="hh:mm am/pm" />
                        <label id="end_time-error" class="error" for="end_time"></label>
                      </div>
                      </div>
                     <!--  <div class="form-group">
                        <label class="col-md-2"> Repeted Class </label>
                        <div class="checkbox">
                          <label><input type="checkbox" value="">Option 1</label>
                          <label><input type="checkbox" value="">Option 2</label>
                        </div>
                      </div> -->
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
                        <button type="submit" class="btn btn-success"> Save </button>
                        <a href="<?php echo base_url('admin/classes') ?>" type="button" class="btn btn-danger"> Back</a> 
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
       $("form[name='class_form']").validate({
          rules: {
            class_name: {
              required: true,
            },
            course_id: {
              required: true,
            },
            start_date: {
              required: true,
            },
            end_date: {
              required:true,
            },
            start_time: {
              required:true,
            },
            end_time :{
              required:true,
            },
          },
          messages: {
            class_name: {
              required: "Please enter class name"
            },
            course_id:{
              required: "Please enter course name"
            },
            start_date: {
              required: "Please enter start date"
            },
            end_date: {
              required: "Please enter end date"
            },
            start_time: {
              required:"Please enter start time"
            },
            end_time: {
              required:"Please enter end time"
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();
            // using this page stop being refreshing
            var formData = new FormData();
            formData.append('class_name', $('#class_name').val());
            formData.append('course_id', $('#course_id').val());
            formData.append('start_date', $('#start_date').val());
            formData.append('end_date', $('#end_date').val());
            formData.append('start_time', $('#start_time').val());
            formData.append('end_time', $('#end_time').val());
            formData.append('org_id', $('#org_id').val());
            formData.append('user_id', $('#user_id').val());
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
                  var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong></strong>Class Added Sucessfully.</div>';
                  $('#massage').html(html);
                  window.setTimeout(function () {
                    location.href = "<?php echo site_url('admin/classes') ?>";
                  }, 2000);
                } else {
                var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> CLass in the list </div>';
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
            url: "<?php echo base_url('admin/classes/get_course'); ?>",
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
                $.each(resD.classes, function(k, v) {
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
       <!-- Input Mask Plugin Js -->
        <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script type="text/javascript">
            var $demoMaskedInput = $('.demo-masked-input');
            //Date
            $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
            //Time
            $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:_ m', alias: 'time12', hourFormat: '12' });
        </script>
     
