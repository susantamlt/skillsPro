		<section class="content">
            <input type="hidden" name="page" id="page" value="contractors" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">                            
                            <div class="header" style="border-bottom:none;">
                              <h2 class="col-md-6" style="padding:0px;">Contractors List</h2>
                              <div class="col-md-6" style="padding:0px; text-align:right;">
                                <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                 <a href="<?php echo site_url('sales/contractors/contractors_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
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
                                      <th title="Name">Contractor Name </th>
                                      <th title="Name">Designation </th>
                                      <th title="Name">Address </th>
                                      <th title="Name"> Organization Name </th>
                                      <th title="IDate"> Interview Date </th>
                                      <th title="Status"> Status </th>
                                      <th title="Date"> Created Date </th>
                                      <th title="Action"> Action </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" class="text-center">
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
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#dataManual').DataTable({
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('sales/contractors/contractors_list'); ?>",
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
          "sName": "desingnation",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
              return oObj;
          }
        },
         {
          "sName": "address",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
              return oObj;
          }
        },
        {
          "sName": "orgname",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
            return oObj;
          }
        },
        {
          "sName": "IDate",
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
          "sName": "date",
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
      ],
        "responsive": true,
      "dom": 'lfBrtip',
      "buttons": [
        { extend: 'copy', className: 'copyButton', titleAttr: 'Export to Copy' },
        { extend: 'csv', className: 'csvButton', titleAttr: 'Export to CSV' },
        { extend: 'excel', className: 'excelButton', titleAttr: 'Export to Excel' },
        { extend: 'pdf', className: 'pdfButton', titleAttr: 'Export to PDF' },
        { extend: 'print', className: 'printButton', titleAttr: 'Export to Print' }
      ],
      "iDisplayLength": 25,
      "aLengthMenu": [[10,25, 50, 100, 500, -1], [10,25, 50, 100, 500, "All"]],
      'aaSorting':[[8,'desc']]
    });
  });
</script>
<style type="text/css">
  #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
  #dataAuto > thead > tr > th {vertical-align:middle;padding:0px 10px;}
</style>