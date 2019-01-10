    <section class="content">
      <input type="hidden" name="page" id="page" value="contractors" />
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header" style="height:65px;">
                <h2 class="col-md-6" style="padding:0px;line-height: 60px;">Contractors Timesheet List</h2>
                <div class="col-md-6" style="padding:0px; text-align:right;">
                  <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a></a>
                </div>
              </div>
              <div class="header" style="padding-top:15px;padding-bottom:0px; ">
                <?php echo form_open_multipart('clients/contractors/contractors_alllists', array('id' =>'timesheet_form','name'=>'timesheet_form','class'=>'form-horizontal','method'=>'POST')); ?>
                  <div class="form-group demo-masked-input">
                    <label class="col-md-4">Chose Your Date</label>
                    <div class="col-md-4">
                      <div class="input-group">
                        <div class="form-line">
                          <input type="text"  name="date" id="date" class="form-control date" placeholder="Ex: 07/30/2016">
                        </div>
                      </div>
                      <label id="date-error" class="error" for="date"></label>
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="btn btn-success"> Find </button>
                    </div>
                  </div>
                <?php echo form_close(); ?>
              </div>
              <div class="body">
                <div class="table-responsive">
                  <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                        <th title="Contractor Id"> Id </th>
                        <th title="Contractor Name"> C.Name </th>
                        <th title="Requirments Name"> R.Name </th>
                        <th title="Monday"> Mon </th>
                        <th title="Tuesday"> Tue </th>
                        <th title="Wednesday"> Wed </th>
                        <th title="Wednesday"> Thu </th>
                        <th title="Friday"> Fri </th>
                        <th title="Saturday"> Sat </th>
                        <th title="Sunday"> Sun </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(date('D', strtotime(date('Y-m-d')))=='Mon'){
                        $from = date('Y-m-d', strtotime("This Monday"));
                      } else {
                        $from = date('Y-m-d', strtotime("Last Monday"));
                      } ?>
                              
                      <?php if(!empty($timesheets)){ ?>
                        <?php foreach ($timesheets as $k => $_timesheet) { ?>
                          <tr>
                            <td><?php echo $_timesheet['requirement_id'] ?></td>
                            <td><?php echo $_timesheet['contractor_name'] ?></td>
                            <td><?php echo $_timesheet['prospect_title'] ?></td>
                            <?php if(!empty($_timesheet['timesheet'])) { ?>
                              <?php $newData = array(); ?>
                              <?php foreach ($_timesheet['timesheet'] as $tk => $tv) {
                                $dayNew = date('l',strtotime($tv['date']));
                                $newData[$dayNew] = $tv;
                              } ?>
                              <td>
                                <?php if (isset($newData['Monday']) && !empty($newData['Monday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_monday" id="monday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Monday']['cts_id']; ?>" data-date="<?php echo $newData['Monday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Monday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Monday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_monday" id="monday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime($from)); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+1 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                              <td>
                                <?php if (isset($newData['Tuesday']) && !empty($newData['Tuesday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_tuesday" id="tuesday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Tuesday']['cts_id']; ?>" data-date="<?php echo $newData['Tuesday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Tuesday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Tuesday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_tuesday" id="tuesday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+1 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+1 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                              <td>
                                <?php if (isset($newData['Wednesday']) && !empty($newData['Wednesday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_wedday" id="wedday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Wednesday']['cts_id']; ?>" data-date="<?php echo $newData['Wednesday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Wednesday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Wednesday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_wedday" id="wedday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+2 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+2 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                              <td>
                                <?php if (isset($newData['Thursday']) && !empty($newData['Thursday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_thirsday" id="thirsday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Thursday']['cts_id']; ?>" data-date="<?php echo $newData['Thursday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Thursday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Thursday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_thirsday" id="thirsday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+3 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+3 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                              <td>
                                <?php if (isset($newData['Friday']) && !empty($newData['Friday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_friday" id="friday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Friday']['cts_id']; ?>" data-date="<?php echo $newData['Friday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Friday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Friday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_friday" id="friday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+4 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+4 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                              <td>
                                <?php if (isset($newData['Saturday']) && !empty($newData['Saturday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_satday" id="satday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Saturday']['cts_id']; ?>" data-date="<?php echo $newData['Saturday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Saturday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Saturday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_satday" id="satday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+5 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+5 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                              <td>
                                <?php if (isset($newData['Sunday']) && !empty($newData['Sunday'])){ ?>
                                  <input type="text" class="timesheetaddedit" name="hour_sunday" id="sunday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="<?php echo $newData['Sunday']['cts_id']; ?>" data-date="<?php echo $newData['Sunday']['date']; ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" value="<?php echo $newData['Sunday']['hours']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($newData['Sunday']['date']))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } else { ?>
                                  <input type="text" class="timesheetaddedit" name="hour_sunday" id="sunday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+6 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+6 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /> 
                                <?php } ?>
                              </td>
                            <?php } else { ?>
                              <td><input type="text" class="timesheetaddedit" name="hour_monday" id="monday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime($from)); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime($from))){ echo 'disabled="disabled"'; } ?> /></td>
                              <td><input type="text" class="timesheetaddedit" name="hour_tuesday" id="tuesday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+1 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+1 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
                              <td><input type="text" class="timesheetaddedit" name="hour_wedday" id="wedday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+2 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+2 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
                              <td><input type="text" class="timesheetaddedit" name="hour_thirsday" id="thirsday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+3 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+3 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
                              <td><input type="text" class="timesheetaddedit" name="hour_friday" id="friday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+4 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+4 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
                              <td><input type="text" class="timesheetaddedit" name="hour_satday" id="satday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+5 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+5 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
                              <td><input type="text" class="timesheetaddedit" name="hour_sunday" id="sunday_<?php echo $_timesheet['requirement_id'].'_'.$_timesheet['contractor_id']; ?>" data-rid="<?php echo $_timesheet['requirement_id']; ?>" data-cid="<?php echo $_timesheet['contractor_id']; ?>" data-ctsid="" data-date="<?php echo date('Y-m-d', strtotime('+6 day', strtotime($from))); ?>" data-orgid="<?php echo $_timesheet['org_id']; ?>" <?php if(date('Ymd') < date('Ymd',strtotime('+6 day', strtotime($from)))){ echo 'disabled="disabled"'; } ?> /></td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      <?php } else { ?>
                        <tr>
                          <td valign="top" colspan="10" class="dataTables_empty">No data available in table</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#dataManual').DataTable();
      $(document).on('focusout','.timesheetaddedit',function(){
        var id = $(this).attr('id');
        var requirement_id = $(this).attr('data-rid');
        var contractor_id = $(this).attr('data-cid');
        var cts_id = $(this).attr('data-ctsid');
        var date = $(this).attr('data-date');
        var org_id = $(this).attr('data-orgid');
        var hours = $(this).val();
        const regex = /^[0-9]\d{0,9}(\.\d{1,2})?%?$/;
        let m;
        if(hours==''){
          $('#'+id).css({'border':'2px solid #F44336'});
        } else if ((m = regex.exec(hours)) === null) {          
          $('#'+id).css({'border':'2px solid #F44336'});
        } else {
          $('#'+id).css({'border':''});
          $.ajax({
            url: "<?php echo site_url('clients/contractors/contractors_timesheets_save'); ?>",
            type: "POST",
            data: {requirement_id:requirement_id,contractor_id:contractor_id,cts_id:cts_id,date:date,org_id:org_id,hours:hours},
            success: function(res) {
              var resD = $.parseJSON(res);
              if(resD.status=='1'){
                $('#'+id).attr('data-ctsid',resD.ids);
              }
            }
          });
        }
      });
    </script>
    <style type="text/css">
      table#dataManual tbody tr td input.timesheetaddedit {width: 50px;}
    </style>
    <!-- Input Mask Plugin Js -->
    <script src="<?php echo config_item('assets_dir');?>plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript">
        var $demoMaskedInput = $('.demo-masked-input');
        //Date
        $demoMaskedInput.find('.date').inputmask('mm/dd/yyyy', { placeholder: '__/__/____' });
    </script>

    <script type="text/javascript">
      $(function() {
        $.validator.addMethod("regex",function(value, element, regexp) {
          if (regexp.constructor != RegExp)
            regexp = new RegExp(regexp);
          else if (regexp.global)
            regexp.lastIndex = 0;
          return this.optional(element) || regexp.test(value);
        },"Please check your input.");
        $("form[name='timesheet_form']").validate({
          rules: {
            date :{
              required:true,
            },           
          },
          messages: {
            date :{
              required:"Please Enter your date",
            },
          },
          onfocusout: function(element) {
            this.element(element);
          },
          submitHandler: function(form,event){
            event.preventDefault();// using this page stop being refreshing
            var formData = new FormData();
            formData.append('date', $('#date').val());
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
                  $('#dataManual').DataTable().destroy();
                  $('#dataManual > tbody').html(resD.html);
                  $('#dataManual').DataTable();
                } else {
                  $('#dataManual').DataTable().destroy();
                  $('#dataManual > tbody').html(resD.html)
                  $('#dataManual').DataTable();
                }
              }
            });
          }
        });
      });
    </script>