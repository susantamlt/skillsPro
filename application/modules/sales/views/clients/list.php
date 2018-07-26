		<section class="content">
            <input type="hidden" name="page" id="page" value="clients" />
            <div class="container-fluid">
            	<div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">                            
                            <div class="header" style="border-bottom:none;">
                              <h2 class="col-md-6" style="padding:0px;">Clients List</h2>
                              <div class="col-md-6" style="padding:0px; text-align:right;">
                                <a href="javascript:void(0)" onclick="location.reload();" data-toggle="tooltip" class="btn btn-primary btn-background" title="Reload Page"><i class="glyphicon glyphicon-refresh"></i></a>
                                <a href="<?php echo site_url('sales/clients/clients_add') ?>" data-toggle="tooltip" title="Add New Record" class="btn btn-success btn-background"><i class="glyphicon glyphicon-plus"></i></a>
                              </div>
                            </div>
                            <div class="body">
                                <table id="dataManual" class="table table-bordered table-striped" style="width:100%;">
                                  <thead>
                                    <tr>
                                      <th style="width:18px" class="sorting-disabled">
                                        <input type="checkbox" id="checkbox-1-0" class="regular-checkbox" />
                                        <label for="checkbox-1-0"></label>
                                      </th>
                                      <th title="Clients Name"> Clients Name </th>
                                      <th title="Decision Maker Name"> Decision Maker Name </th>
                                      <th title="Phone One"> Phone One </th>
                                      <th title="E-mail One"> E-mail One </th>
                                      <th title="Phone Two"> Phone Two </th>
                                      <th title="E-mail Two"> E-mail Two </th>
                                      <th title="Date"> Created Date </th>
                                      <th title="Action"> Action </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="8" class="text-center">
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
        </section>

        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
        <script src="<?php echo config_item('assets_dir'); ?>plugins/jquery-datatable/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script type="text/javascript">
  $(function () {
    $('#dataManual').DataTable({
      "bServerSide": true,
      "sAjaxSource": "<?php echo site_url('sales/clients/clients_list'); ?>",
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
          "sName": "Date",
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
      "aaSorting":[[7,'desc']]
    });
  });
</script>
<style type="text/css">
  #dataManual > thead > tr > th {vertical-align:middle;padding:0px 10px;}
  #dataAuto > thead > tr > th {vertical-align:middle;padding:0px 10px;}
</style>