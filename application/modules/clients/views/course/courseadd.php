    <section class="content">
      <input type="hidden" name="page" id="page" value="course" />
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header">
                  <h2>Add Course</h2>
                </div>
                <div id="massage"></div>
                <div class="body">
                     <?php echo form_open_multipart('clients/course/course_save', array('id'=>'course_form','name'=>'course_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                    <div class="form-group">
                      <label class="col-md-2"> Course Name<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                          <input type="text" name="course_name" id="course_name" class="form-control" value="" placeholder="Course name" />
                        <label id="course_name-error" class="error" for="course_name"></label>
                      </div>
                      <label class="col-md-2">Course Topic<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                         <input type="text" name="course_topic" id="course_topic" class=" form-control" value="" placeholder="Course topic" />
                        <label id=" course_topic-error" class="error" for=" course_topic"></label>
                      </div>
                    </div>
                     <div class="form-group">
                      <label class="col-md-2"> Chapter<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                          <input type="text" name="chapter" id="chapter" class="form-control" value="" placeholder="Chapter" />
                        <label id="chapter-error" class="error" for="chapter"></label>
                      </div>
                      <label class="col-md-2"> City<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                         <input type="text" name="city" id="city" class=" form-control" value="" placeholder="City" />
                        <label id=" city-error" class="error" for=" city"></label>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label class="col-md-2"> Center Name<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                          <input type="text" name="course_center" id="course_center" class="form-control" value="" placeholder="Center" />
                        <label id="course_center-error" class="error" for="course_center"></label>
                      </div>
                    </div> -->
                    <div class="form-group demo-masked-input">
                      <label class="col-md-2"> Start Date <span class="mandatory" style="color:red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="start_date" id="start_date" class="date form-control" value="" placeholder="mm/dd/yyyy" />
                        <label id="start_date-error" class="error" for="start_date"></label>
                      </div>
                      <label class="col-md-2"> End Date <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-4">
                        <input type="text" name="end_date" id="end_date" class="date form-control" value="" placeholder="mm/dd/yyyy" />
                        <label id="end_date-error" class="error" for="end_date"></label>
                      </div>
                    </div>
                      <div class="form-group">
                      <label class="col-md-2">Course Preview Video Link</label>
                      <div class="col-md-10">
                       <input type="text" name="video_link" id="video_link" class="form-control" value="" placeholder="Link"/>
                        <label id="video_link-error" class="error" for="video_link"></label>
                    </div>
                  </div>
                  <div class="form-group">
                        <label class="col-md-12"> Course Description <span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-12">
                        <textarea name="course_description" id="course_description" class="form-control"></textarea>
                        <label id="course_description-error" class="error" for="course_description"></label>
                      </div>
                  </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['clients_user_id']; ?>">
                        <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['clients_org_id']; ?>">
                        <button type="submit" class="btn btn-success"> Save </button>
                        <a href="<?php echo base_url('clients/course') ?>" type="button" class="btn btn-danger"> Back</a> 
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
       $("form[name='course_form']").validate({
          rules: {
            course_name: {
              required: true,
            },
            course_topic: {
              required: true,
            },
            chapter: {
              required: true,
            },
            city: {
              required:true,
            },
            start_date :{
              required:true,
            },
            end_date: {
               required:true,
            }, 
            video_link: {
               required:false,
            },
            course_description: {
              required:true,
            },
          },
          messages: {
            course_name: {
              required:"Please enter course name"
            },
            course_topic: {
              required:"Please enter course topic"
            },
            chapter: {
              required: "Please enter chapter"
            },
            city:{  
              required: "Please enter city"
            },
            start_date: {
              required: "Please enter start date"
            },
            end_date: {
              required:"Please enter end date"
            },
            video_link: {
              required:"Please enter link"
            },
            course_description : {
                required:"Please enter description"
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();
            // using this page stop being refreshing
            var formData = new FormData();
            var course_description = CKEDITOR.instances.course_description.getData();
            formData.append('course_name', $('#course_name').val());
            formData.append('course_topic', $('#course_topic').val());
            formData.append('course_chapter', $('#chapter').val());           
            formData.append('course_city', $('#city').val());           
            formData.append('start_date', $('#start_date').val());           
            formData.append('end_date', $('#end_date').val());           
            formData.append('video_link', $('#video_link').val());           
            formData.append('course_description', course_description); 
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
                  var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!Course successfuly Added </strong></div>';
                  $('#massage').html(html);
                  window.setTimeout(function () {
                    location.href = "<?php echo site_url('clients/course') ?>";
                  }, 2000);
                } else {
                var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning! Course is in the list</strong></div>';
                  $('#massage').html(html);
                }
              }
            });
          }
        });
      });
    </script>
    <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'course_description' );
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
     
