		    <section class="content">
            <input type="hidden" name="page" id="page" value="projects" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                    <li role="presentation" class="active"><a href="#manually" data-toggle="tab">MANUALLY</a></li>
                                    <li role="presentation"><a href="#auto" data-toggle="tab">AUTO</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="manually">
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                          <a href="<?php echo site_url('sales/projects/projects_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
                                          <a href="<?php echo site_url('sales/projects/projects_search') ?>" data-toggle="tooltip" title="Search Jobs" class="btn btn-success btn-background"><i class="glyphicon glyphicon-search"></i></a>
                                        </div>
                                        <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                  											<thead>
                  												<tr>
                  													<th style="width:18px" class="sorting-disabled">
                  														<input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                  														<label for="checkbox-1-0"></label>
                  													</th>
                                            <th title="Prospect Title"> Title </th>
                                            <th title="Prospect Type"> Type </th>
                                            <th title="Decision Maker Name"> Name </th>
                                            <th title="No of Prospect"> Number </th>
                                            <th title="Prospect Source"> Source </th>
                                            <th title="Prospect Address"> Address </th>
                                            <th title="Prospect State"> State </th>
                                            <th title="Date of Prospect"> Date </th>
                                            <th title="Action"> Action </th>
                  												</tr>
                  											</thead>
                  											<tbody>
                  												<tr>
                  													<td colspan="10" class="text-center">
                  														<img src="<?php echo config_item('root_dir');?>assets/images/small-loader.gif">
                  													</td>
                  												</tr>
                  											</tbody>
                  										</table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="auto">
                                        <div class="header" style="padding: 10px 0px;border-bottom:none;text-align:right;">
                                          <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                        </div>
                                        <table id="dataAuto" class="table table-bordered table-striped" style="width:100%;">
                    											<thead>
                    												<tr>
                    													<th style="width:18px" class="sorting-disabled">
                    														<input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                    														<label for="checkbox-1-0"></label>
                    													</th>
                    													<th title="Prospect Title"> Title </th>
                                              <th title="Prospect Type"> Type </th>
                                              <th title="Decision Maker Name"> Name </th>
                                              <th title="No of Prospect"> Number </th>
                                              <th title="Prospect Source"> Source </th>
                                              <th title="Prospect Address"> Address </th>
                                              <th title="Prospect State"> State </th>
                                              <th title="Date of Prospect"> Date </th>
                                              <th title="Action"> Action </th>
                    												</tr>
                    											</thead>
                    											<tbody>
                    												<tr>
                    													<td colspan="10" class="text-center">
                    														<img src="<?php echo config_item('root_dir');?>assets/images/small-loader.gif">
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
      "sAjaxSource": "<?php echo site_url('sales/projects/projects_list_m'); ?>",
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
          "sName": "Country",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
            return oObj;
          }
        },
        {
          "sName": "State",
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
  $(function (){  	
    $('#dataAuto').DataTable({
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('sales/projects/projects_list_a'); ?>",
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
          "sName": "Country",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
            return oObj;
          }
        },
        {
          "sName": "State",
          "sClass": "text-center",
          "bSearchable": false,
          "bSortable": true,
          "fnRender": function (oObj) {
            return oObj;
          }
        },
        {
          "sName": "Actions",
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