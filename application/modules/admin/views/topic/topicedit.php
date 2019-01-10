    <section class="content">
      <input type="hidden" name="page" id="page" value="topic" />
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>Edit Topic</h2>
              </div>
              <div id="massage"></div>
              <div class="body">
                <?php echo form_open_multipart('admin/topic/topic_save', array('id' =>'topic_form','name'=>'topic_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                  <div class="form-group">
                    <label class="col-md-2"> Topic Name<span class="mandatory" style="color:red">*</span> </label>
                    <div class="col-md-4">
                      <input type="text" name="topic_name" id="topic_name" class="form-control" value="<?php echo $ljp_data[0]['topic_name']; ?>" placeholder="Topic Name" />
                      <label id="topic_name-error" class="error" for="topic_name"></label>
                    </div>
                    <label class="col-md-2">  File Upload </label>
                    <div class="col-md-4">
                      <input type="file" name="resume_upload" id="resume_upload" class="form-control" value="<?php echo $ljp_data[0]['file_name']; ?>" placeholder="" />
                      <label id="resume_upload_error" class="error" for="resume_upload"></label>
                      </div>
                    </div>
                  <div class="form-group">
                    <div class="col-md-12">
                      <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['admin_user_id']; ?>">
                      <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['admin_org_id']; ?>">
                      <input type="hidden" name="topic_id" id="topic_id" value="<?php echo $ljp_data[0]['topic_id']; ?>">
                      <button type="submit" class="btn btn-success"> Update </button>
                      <a href="<?php echo site_url('admin/topic/topiclist/') ?>" class="btn btn-danger"> Cancel </a>
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
        $("form[name='topic_form']").validate({
          rules: {
            topic_name: {
              required: true,
              regex: /^[a-zA-Z ]*$/,
            },
            resume_upload:{
              required:true,

            },
          },
          messages: {
            topic_name: {
              required: "Please enter name",
              regex: "Special characters and Number not allowed"
            },
            resume_upload: {
              required: "Please Upload File"
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
                     event.preventDefault();
            // using this page stop being refreshing
            var formData = new FormData();
            if($('#resume_upload')[0].files[0]!=='') {
            formData.append('file_name', $('#resume_upload')[0].files[0]);
             }
            formData.append('topic_name', $('#topic_name').val());
            formData.append('user_id', $('#user_id').val());
            formData.append('org_id', $('#org_id').val());
            formData.append('topic_id', $('#topic_id').val());
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
                  var html = '<div class="alert alert-success fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Topic successfully Update</div>';
                  $('#massage').html(html);
                  window.setTimeout(function () {
                    location.href = "<?php echo site_url('admin/topic') ?>";
                  }, 5000);
                } else { 
                  var html = '<div class="alert alert-warning fade in alert-dismissible" style="margin-top:18px;"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Warning!</strong> This Topic already exists in the list.</div>';
                  $('#massage').html(html);
                }
              }
            });
          }
        });
      });
    </script>
