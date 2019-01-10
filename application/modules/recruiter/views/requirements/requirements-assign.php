    <section class="content">
      <input type="hidden" name="page" id="page" value="requirements" />
      <div class="container-fluid">
      	<div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>Sortlist Contractors</h2>
              </div>
              <div id="massage"></div>
              <div class="body">
                <fieldset>
                  <?php echo form_open_multipart('recruiter/requirements/requirements_contractors', array('id' =>'contractors_form','name'=>'contractors_form','class'=>'form-horizontal','enctype'=>'multipart/form-data','method'=>'POST')); ?>
                    <div class="form-group">
                      <label class="col-md-2">Type:<span class="mandatory">*</span> </label>
                      <div class="col-md-4">
                        <input type="text" name="prospect_type" id="prospect_type" class="form-control" value="<?php echo $requirement[0]['prospect_type'] ?>" readonly="readonly">
                        <label id="prospect_type-error" class="error" for="prospect_type"></label>
                      </div>
                      <label class="col-md-2">Country:<span class="mandatory">*</span> </label>
                      <div class="col-md-4">
                        <input type="text" name="country_name" id="country_name" class="form-control" value="<?php echo $requirement[0]['country_name'] ?>" readonly="readonly">
                        <label id="country_name-error" class="error" for="country_name"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-2">State:<span class="mandatory">*</span> </label>
                      <div class="col-md-4">
                        <input type="text" name="state" id="state" class="form-control" value="<?php echo $requirement[0]['state'] ?>" readonly="readonly">
                        <label id="state-error" class="error" for="state"></label>
                      </div>
                      <label class="col-md-2">City:<span class="mandatory">*</span> </label>
                      <div class="col-md-4">
                        <input type="text" name="city" id="city" class="form-control" value="<?php echo $requirement[0]['city'] ?>" readonly="readonly">
                        <label id="city-error" class="error" for="city"></label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['recruiter_user_id']; ?>" />
                        <input type="hidden" name="web_id" id="web_id" value="<?php echo $_SESSION['requirter_org_id']; ?>" />
                        <input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $requirement[0]['requirement_id']; ?>" />
                        <button type="submit" class="btn btn-success"> Save </button>
                        <a href="<?php echo site_url('recruiter/requirements/') ?>" class="btn btn-default">Cancel</a>
                      </div>
                    </div>
                  <?php echo form_close(); ?>
                </fieldset>
                <fieldset>
                  <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th style="width:14px" class="sorting-disabled">
                          <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                          <label for="checkbox-1-0"></label>
                        </th>
                        <th title="Name"> Name </th>
                        <th title="Location"> Location </th>
                        <th title="Education"> Education </th>
                        <th title="Education"> Education </th>
                        <th title="Summary"> Summary </th>
                        <th title="Date"> Date </th>
                        <th title="Action"> Action </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td colspan="10" class="text-center">
                          <img src="<?php echo config_item('assets_dir');?>images/small-loader.gif">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </fieldset>
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
        $("form[name='contractors_form']").validate({
          rules: {
            prospect_type: {
              required: true,
            },
            country_name: {
              required: true,
            },
            state: {
              required: true,
            },
            city: {
              required: true,
            },
          },
          messages: {
            prospect_type: {
              required: "Please enter type",
            },
            country_name: {
              required: "Please enter country",
            },
            state: {
              required: "Please enter state",
            },
            city: {
              required: "Please enter city",
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();// using this page stop being refreshing
            var formData = new FormData();
            formData.append('prospect_type', $('#prospect_type').val());
            formData.append('country_name', $('#country_name').val());
            formData.append('state', $('#state').val());
            formData.append('city', $('#city').val());
            formData.append('user_id', $('#user_id').val());
            formData.append('web_id', $('#web_id').val());
            formData.append('requirement_id', $('#requirement_id').val());
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
                $('#dataManual').dataTable({
                  destroy: true,
                  sEcho: resD.sEcho,
                  iTotalRecords: resD.iTotalRecords,
                  iTotalDisplayRecords: resD.iTotalDisplayRecords,
                  iDisplayLength: resD.iTotalDisplayRecords,
                  aaData: resD.aaData,
                  deferLoading:resD.sEcho
                });
              }
            });
          }
        });
      });
    </script>
    <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $('#dataManual').DataTable({
          "bServerSide": true,
          "sAjaxSource": "<?php echo site_url('recruiter/requirements/requirements_contractors'); ?>",
          "sServerMethod": "POST",
          "sPaginationType": "full_numbers",
          "iDisplayLength": 10,
          "aoColumns": [
            {
              "sName": "ID",
              "bSearchable": false,
              "bSortable": false,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "Name",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                  return oObj;
              }
            },
            {
              "sName": "E-mail",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "Moile",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "Image",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "Type",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "Gender",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": true,
              "fnRender": function (oObj) {
                return oObj;
              }
            },
            {
              "sName": "Action",
              "sClass": "text-center",
              "bSearchable": false,
              "bSortable": false,
              "fnRender": function (oObj) {
                return oObj;
              }
            }
          ]
        });
      });
    </script>
    <style type="text/css">
      #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
      #dataAuto > thead > tr > th {vertical-align:middle;padding:0px 10px;}
      .dataTables_filter,.dataTables_paginate{float:right;}
    </style>