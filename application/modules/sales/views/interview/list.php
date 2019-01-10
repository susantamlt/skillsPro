    <section class="content">
            <input type="hidden" name="page" id="page" value="interview" />
            <div class="container-fluid">
              <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">  
                            <div class="header" style="border-bottom:none;">
                              <h2 class="col-md-6" style="padding:0px;">Interview List</h2>
                              <div class="col-md-6" style="padding:0px; text-align:right;">
                                <!-- <a href="<?php echo base_url('sales/interview/interview_form') ?>" type="button" class="btn btn-primary btn-lg" style="border-radius:6px;"> Schedule Interview</a> -->
                                <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                              </div>
                            </div>
                            <div class="body">
                              <div class="table-responsive">
                                <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                                  <thead>
                                    <tr>
                                      <th style="width:18px" class="sorting-disabled">
                                        <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                        <label for="checkbox-1-0"></label>
                                      </th>
                                      <th title="Contractors Name"> Contractors Name </th>
                                      <th title="Status"> Current Status </th>
                                      <th title="Interview Date"> Interview Date </th>
                                      <th title="Interview Time"> Interview Time </th>
                                      <th title="Action"> Action </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="11" class="text-center">
                                        <img src="<?php echo config_item('assets_dir');?>images/small-loader.gif">
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#dataManual').DataTable({
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('sales/interview/interview_list'); ?>",
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
          "sName": "Contractors Name",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
              return oObj;
          }
        },
        {
          "sName": "Status",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
            return oObj;
          }
        },
        {
          "sName": "Interview Date",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
            return oObj;
          }
        },
        {
          "sName": "Interview Time",
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
          "bSortable": true,
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
</style>