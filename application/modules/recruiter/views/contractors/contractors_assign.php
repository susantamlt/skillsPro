    <section class="content">
      <input type="hidden" name="page" id="page" value="contractors" />
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                <div class="header" style="border-bottom:none;">
                  <h2>Assign</h2>
                </div>
                <div id="massage"></div>
                <div class="body">
                  <?php echo form_open_multipart('recruiter/contractors/source_save/', array('id'=>'source_form','name'=>'source_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                    <div class="form-group">
                      <label class="col-md-2"> Assign Source:<span class="mandatory" style="color: red">*</span></label>
                      <div class="col-md-10">
                        <?php if(!empty($sdata)){ ?>
                          <?php echo form_dropdown('source_id',$user,$sdata[0]['source_id'],'class="form-control" id="source_id"') ?>
                        <?php } else { ?>
                          <?php echo form_dropdown('source_id',$user,'','class="form-control" id="source_id"') ?>
                        <?php } ?>
                        <label id="source_id-error" class="error" for="source_id"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <?php if(!empty($sdata)){ ?>
                          <input type="hidden" name="ps_id" id="ps_id" value="<?php echo $sdata[0]['ps_id']; ?>" />
                        <?php } else { ?>
                          <input type="hidden" name="ps_id" id="ps_id" value="" />
                        <?php } ?>
                        <input type="hidden" name="org_id" id="org_id" value="<?php echo $_SESSION['recruiter_org_id']; ?>">
                        <input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $id;?>">
                        <button type="submit" class="btn btn-success"> Assign </button>
                        <a href="<?php echo site_url('recruiter/contractors/') ?>" class="btn btn-default">Back</a>
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
        $("form[name='source_form']").validate({
          rules: {
            source_id: {
              required: true,
            },
            org_id: {
              required: true,
            },
            requirement_id: {
              required: true,
            },
          },
          messages: {
            source_id: {
              required: "Please enter assign  source",
            },
            org_id:{
              required: "Please enter No of requirements",
            },
            requirement_id: {
              required: "Please enter no of requirements fullfilled.",
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();// using this page stop being refreshing
            var formData = new FormData();
            formData.append('requirement_id', $('#requirement_id').val());
            formData.append('org_id', $('#org_id').val());
            formData.append('source_id', $('#source_id').val());
            formData.append('ps_id', $('#ps_id').val());
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